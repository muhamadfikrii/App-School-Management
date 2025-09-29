<?php

namespace App\Filament\Pages;

use Exception;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Auth\MultiFactor\Contracts\MultiFactorAuthenticationProvider;
use Filament\Auth\Notifications\NoticeOfEmailChangeRequest;
use Filament\Auth\Notifications\VerifyEmailChange;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Pages\Concerns\CanUseDatabaseTransactions;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;
use Illuminate\Validation\Rules\Password;
use League\Uri\Components\Query;

/**
 * @property-read Schema $editProfileInformationForm
 * @property-read Schema $updatePasswordForm
 */
class EditProfile extends Page
{
    use CanUseDatabaseTransactions;

    /**
     * @var array<string, mixed> | null
     */
    public ?array $profileState = [];

    /**
     * @var array<string, mixed> | null
     */
    public ?array $passwordData = [];

    protected string $view = 'filament.pages.edit-profile';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string
    {
        return __('Account');
    }

    public function mount(): void
    {
        $this->fillForm();
    }

    protected function fillForm(): void
    {
        /** @var array<string, mixed> $data */
        $data = $this->getUser()->attributesToArray();

        $this->callHook('beforeFill');

        $data = $this->mutateFormDataBeforeFill($data);

        $this->editProfileInformationForm->fill($data);

        $this->updatePasswordForm->fill();

        $this->callHook('afterFill');
    }

    protected function callHook(string $hook): void
    {
        if (! method_exists($this, $hook)) {
            return;
        }

        $this->{$hook}();
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    public function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if (! $user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the account page to update it.');
        }

        return $user;
    }

    public function editProfileInformationForm(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('Account Information'))
                ->description(__("Update your account's information and email."))
                ->aside()
                ->schema([
                    FileUpload::make('profile_photo_path')
                        ->label(__('Account Image'))
                        ->image()
                        ->avatar()
                        ->imageEditor()
                        ->circleCropper()
                        ->maxSize(10240)
                        ->disk('public')
                        ->directory('profile-photos')
                        ->visibility('public'),
                    TextInput::make('name')
                        ->label(__('filament-panels::auth/pages/edit-profile.form.name.label'))
                        ->required()
                        ->maxLength(255)
                        ->autofocus(),
                    TextInput::make('email')
                        ->label(__('filament-panels::auth/pages/edit-profile.form.email.label'))
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->live(debounce: 500),
                ]),
        ])
            ->model($this->getUser())
            ->statePath('profileState');
    }

    public function updatePasswordForm(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('Update Password'))
                ->description(__('Ensure your account is using a long, random password to stay secure'))
                ->aside()
                ->schema([
                    TextInput::make('password')
                        ->label(__('New Password'))
                        ->password()
                        ->autocomplete('new-password')
                        ->revealable(filament()->arePasswordsRevealable())
                        ->rule(Password::default())
                        ->dehydrated(fn ($state): bool => filled($state))
                        ->live(debounce: 500)
                        ->required(fn (Get $get): bool => filled($get('current_password'))),

                    TextInput::make('password_confirmation')
                        ->label(__('Confirmation Password'))
                        ->password()
                        ->autocomplete('new-password')
                        ->revealable(filament()->arePasswordsRevealable())
                        ->same('password')
                        ->dehydrated(false)
                        ->required(fn (Get $get): bool => filled($get('password'))),

                    TextInput::make('current_password')
                        ->label(__('Current Password'))
                        ->belowContent(__('For security, please confirm your password to continue.'))
                        ->password()
                        ->revealable(filament()->arePasswordsRevealable())
                        ->currentPassword(guard: Filament::getAuthGuard())
                        ->required(fn (Get $get): bool => filled($get('password')))
                        ->visible(fn (Get $get): bool => filled($get('password'))),
                ]),
        ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    /**
     * @return array<Action | ActionGroup>
     */
    public function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    public function getCancelFormAction(): Action
    {
        return $this->backAction();
    }

    public function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('save'))
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    /**
     * @deprecated Use `getCancelFormAction()` instead.
     */
    public function backAction(): Action
    {
        $url = filament()->getUrl();

        return Action::make('back')
            ->label(__('filament-panels::auth/pages/edit-profile.actions.cancel.label'))
            ->alpineClickHandler(
                FilamentView::hasSpaMode($url)
                    ? 'document.referrer ? window.history.back() : Livewire.navigate('.Js::from($url).')'
                    : 'document.referrer ? window.history.back() : (window.location.href = '.Js::from($url).')',
            )
            ->color('gray');
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components(fn (): array => [
            $this->getFormContentComponent(),
            ...Arr::wrap($this->getMultiFactorAuthenticationContentComponent()),
        ]);
    }

    protected function getFormContentComponent(): Component
    {
        return Form::make([
            EmbeddedSchema::make('editProfileInformationForm'),
            EmbeddedSchema::make('updatePasswordForm'),
        ])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions())
                    ->alignment($this->getFormActionsAlignment()),
            ]);
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }

    public function getFormActionsAlignment(): string|Alignment
    {
        return Alignment::End;
    }

    public function getMultiFactorAuthenticationContentComponent(): ?Component
    {
        if (! Filament::hasMultiFactorAuthentication()) {
            return null;
        }

        $user = $this->getUser();

        return Section::make()
            ->label(__('filament-panels::auth/pages/edit-profile.multi_factor_authentication.label'))
            ->compact()
            ->divided()
            ->secondary()
            ->schema(collect(Filament::getMultiFactorAuthenticationProviders())
                ->sort(fn (MultiFactorAuthenticationProvider $multiFactorAuthenticationProvider): int => $multiFactorAuthenticationProvider->isEnabled($user) ? 0 : 1)
                ->map(fn (MultiFactorAuthenticationProvider $multiFactorAuthenticationProvider): Component => Group::make($multiFactorAuthenticationProvider->getManagementSchemaComponents())
                    ->statePath($multiFactorAuthenticationProvider->getId()))
                ->all());
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (! empty($data['profile_photo_path'])) {
            $image = $data['profile_photo_path'];

            if ($image instanceof UploadedFile) {
                if (! empty($record->profile_photo_path) && is_string($record->profile_photo_path)) {
                    Storage::disk('public')->delete($record->profile_photo_path);
                }

                $data['profile_photo_path'] = $image->store('profile-photos', 'public');
            }
        }

        if (Filament::hasEmailChangeVerification() && array_key_exists('email', $data)) {

            $newEmail = $data['email'];
            if (is_string($newEmail) && ($newEmail !== '' && $newEmail !== '0')) {
                $this->sendEmailChangeVerification($record, $newEmail);
            }

            unset($data['email']);
        }

        $record->update($data);

        return $record;
    }

    protected function sendEmailChangeVerification(Model $record, string $newEmail): void
    {
        if ($record->getAttributeValue('email') === $newEmail) {
            return;
        }

        $notification = app(VerifyEmailChange::class);
        $notification->url = Filament::getVerifyEmailChangeUrl($record, $newEmail);

        $verificationSignature = Query::new($notification->url)->get('signature');

        if ($verificationSignature !== null) {
            cache()->put($verificationSignature, true, ttl: now()->addHour());

            $record->notify(app(NoticeOfEmailChangeRequest::class, [/** @phpstan-ignore-line */
                'blockVerificationUrl' => Filament::getBlockEmailChangeVerificationUrl($record, $newEmail, $verificationSignature),
                'newEmail' => $newEmail,
            ]));
        }

        Notification::route('mail', $newEmail)
            ->notify($notification);

        $this->getEmailChangeVerificationSentNotification($newEmail)?->send();

        $this->profileState['email'] = $record->getAttributeValue('email');
    }

    public function save(): void
    {
        try {
            $this->beginDatabaseTransaction();

            $this->callHook('beforeValidate');

            $profileData = $this->editProfileInformationForm->getState();
            $passwordData = $this->updatePasswordForm->getState();

            $this->callHook('afterValidate');

            $profileData = $this->mutateFormDataBeforeSave($profileData);

            $this->callHook('beforeSave');

            $this->handleRecordUpdate($this->getUser(), $profileData);

            if (! empty($passwordData['password'])) {
                $this->getUser()->update([
                    'password' => $passwordData['password'],
                ]);

                if (request()->hasSession()) {
                    request()->session()->put([
                        'password_hash_'.Filament::getAuthGuard() => $this->getUser()->getAuthPassword(),
                    ]);
                }
            }

            $this->callHook('afterSave');
        } catch (Halt $exception) {
            $exception->shouldRollbackDatabaseTransaction()
                ? $this->rollBackDatabaseTransaction()
                : $this->commitDatabaseTransaction();

            return;
        } catch (\Throwable $exception) {
            $this->rollBackDatabaseTransaction();
            throw $exception;
        }

        $this->commitDatabaseTransaction();

        $this->passwordData = [];

        $this->getSavedNotification()?->send();

        if (($redirectUrl = $this->getRedirectUrl()) !== null && ($redirectUrl = $this->getRedirectUrl()) !== '' && ($redirectUrl = $this->getRedirectUrl()) !== '0') {
            $this->redirect($redirectUrl, navigate: FilamentView::hasSpaMode($redirectUrl));
        }
    }

    protected function getRedirectUrl(): ?string
    {
        return null;
    }

    protected function getSavedNotification(): ?FilamentNotification
    {
        $title = $this->getSavedNotificationTitle();

        if (blank($title)) {
            return null;
        }

        return FilamentNotification::make()
            ->success()
            ->title($title);
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('filament-panels::auth/pages/edit-profile.notifications.saved.title');
    }

    protected function getEmailChangeVerificationSentNotification(string $newEmail): ?FilamentNotification
    {
        return FilamentNotification::make()
            ->success()
            ->title(__('filament-panels::auth/pages/edit-profile.notifications.email_change_verification_sent.title', ['email' => $newEmail]))
            ->body(__('filament-panels::auth/pages/edit-profile.notifications.email_change_verification_sent.body', ['email' => $newEmail]));
    }
}
