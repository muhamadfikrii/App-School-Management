<?php

namespace App\Livewire;

use App\Enums\InvitationStatus;
use App\Enums\UserRole;
use App\Models\Invitation;
use App\Models\Teacher;
use App\Models\User;

use function array_merge;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

use function redirect;
use function session;
use function view;

class FormRegister extends Component
{
    use WithFileUploads;
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $username = '';

    // Teacher fields
    public ?string $nip = null;

    public ?string $phone = null;

    public string $gender = '';

    public ?string $date_of_birth = null; // YYYY-MM-DD

    public string $status = '';

    public bool $isTeacher = false;

    public ?string $address = null;

    public $photo;

    public Invitation $invitation;

    public function mount(Invitation $invitation): void
    {
        $this->invitation = $invitation;

        $this->isTeacher = $invitation->is_teacher;

        $this->name = $invitation->name;

        $this->email = $invitation->email;

        $this->username = $this->generateUsername($this->name);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.form-register');
    }

    public function submit()
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', 'min:5'],
        ];

        if ($this->isTeacher) {
            $rules = array_merge($rules, [
                'nip'           => 'required|string|max:50',
                'phone'         => 'nullable|string|max:20',
                'gender'        => 'required|in:laki-laki,perempuan',
                'date_of_birth' => 'required|date',
                'status'        => 'required|string|max:50',
                'address'       => 'nullable|string|max:500',
            ]);
        }
        $validated = $this->validate($rules);

        DB::transaction(function () use ($validated): void {
            $user = User::create([
                'name'      => $this->name,
                'email'     => $this->email,
                'username'  => $this->username,
                'password'  => Hash::make($validated['password']),
                'role_name' => $this->isTeacher ? UserRole::TEACHER->value : UserRole::ADMINISTRATOR->value,
            ]);

            if ($this->isTeacher) {
                $photoPath = null;
                if ($this->photo) {
                    $photoPath = $this->photo->store('avatars', 'public');
                }

                Teacher::create([
                    'full_name'     => $this->name,
                    'nip'           => $validated['nip']   ?? null,
                    'phone'         => $validated['phone'] ?? null,
                    'gender'        => $validated['gender'],
                    'date_of_birth' => isset($validated['date_of_birth']) ? Carbon::parse($validated['date_of_birth']) : null,
                    'status'        => $validated['status'],
                    'address'       => $validated['address'] ?? null,
                    'avatar_url'    => $photoPath,
                    'user_id'       => $user->id,
                ]);
            }
        });

        session()->flash('success', 'Teacher and User created successfully!');
        $this->invitation->update(['status' => InvitationStatus::SUCCESS]);

        return redirect()->to('/admin');
    }

    private function generateUsername(string $name): string
    {
        $baseUsername = Str::slug($name, '.');
        $username     = $baseUsername;
        $counter      = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    public function updatedName(string $value): void
    {
        $this->username = $this->generateUsername($value);
    }
}
