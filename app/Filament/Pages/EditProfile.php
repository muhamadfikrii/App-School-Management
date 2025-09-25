<?php

namespace App\Filament\Pages;

use App\Models\Invitation;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $title = 'Edit Profile';
    protected static bool $shouldRegisterNavigation = false;
    protected string $view = 'filament.pages.edit-profile';

    public ?array $data = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        $user = Auth::user();

        $this->form->fill([
            'name'  => $user->name,
            'email' => $user->email,
            'photo' => $user->profile_photo_path,
        ]);

        $this->passwordForm->fill([]);
    }

    // 🔹 Form utama (profil user)
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Data Profil')
                    ->description('Ubah data pribadi Anda.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->required(),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()   
                                ->required()
                                 ->rule(function ($record) {
                                    return function ($attribute, $value, \Closure $fail) use ($record): void {
                                        $query = Invitation::where('email', $value);

                                        // abaikan record saat update
                                        if ($record instanceof Invitation) {
                                            $query->where('id', '!=', $record->id);
                                        }

                                        if ($query->exists()) {
                                            $fail('Email ini sudah digunakan, silakan masukan email lain.');
                                        }
                                    };
                                })
                        ]),

                        FileUpload::make('photo')
                            ->label('Foto Profil')
                            ->image()
                            ->avatar()
                            ->disk('public')
                            ->directory('profile-photos')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->dehydrated(true)  // simpan ke DB
                            ->multiple(false),

                        Actions::make([
                            Action::make('saveProfile')
                                ->label('Simpan Perubahan')
                                ->submit('saveProfile'),
                        ])->alignLeft(),
                    ]),
            ])
            ->statePath('data');
    }

    // 🔹 Form ubah password
    public function passwordForm(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Ubah Password')
                    ->description('Pastikan password baru berbeda dengan yang lama.')
                    ->schema([
                        TextInput::make('current_password')
                            ->label('Password Lama')
                            ->password()
                            ->required(),

                        TextInput::make('new_password')
                            ->label('Password Baru')
                            ->password()
                            ->required()
                            ->minLength(6),

                        TextInput::make('new_password_confirmation')
                            ->label('Konfirmasi Password Baru')
                            ->password()
                            ->same('new_password')
                            ->required(),

                        Actions::make([
                            Action::make('changePassword')
                                ->label('Ubah Password')
                                ->color('danger')
                                ->submit('changePassword'),
                        ])->alignLeft(),
                    ]),
            ])
            ->statePath('passwordData');
    }

    public function saveProfile(): void
    {
        /** @var \App\Models\User $user */
        $data = $this->form->getState();
        $user = Auth::user();
        assert($user instanceof \App\Models\User);

        $user->name = $data['name'] ?? $user->name;
        $user->email = $data['email'] ?? $user->email;

        try {
            $path = $this->resolvePhotoPath($data['photo'] ?? null);

            if ($path) {
                // Hapus foto lama jika berbeda
                if ($user->profile_photo_path && $user->profile_photo_path !== $path) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }

                $user->profile_photo_path = $path;
            }

            $user->save();

            // Refresh form state
            $this->form->fill([
                'name'  => $user->name,
                'email' => $user->email,
                'photo' => $user->profile_photo_path,
            ]);

            Notification::make()
                ->title('Profil berhasil diperbarui!')
                ->success()
                ->send();
        } catch (\Throwable $e) {
            Log::error('EditProfile::saveProfile error: ' . $e->getMessage());
            Notification::make()
                ->title('Gagal menyimpan profil')
                ->danger()
                ->body('Terjadi kesalahan. Cek log server.')
                ->send();
        }
    }


    public function changePassword(): void
    {
        $data = $this->passwordForm->getState();
        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password)) {
            Notification::make()
                ->title('Password lama tidak sesuai!')
                ->danger()
                ->send();
            return;
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        Notification::make()
            ->title('Password berhasil diperbarui!')
            ->success()
            ->send();

        $this->passwordForm->fill([]);
    }
}
