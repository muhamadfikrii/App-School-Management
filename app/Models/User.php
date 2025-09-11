<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Enums\UserRole;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role_name' => UserRole::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Teacher()
    {
        return $this->HasOne(Teacher::class);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->is_admin || $this->is_teacher,
            default => false,
        };
    }

    /**
     * @return Attribute<bool,never>
     */
    protected function isAdmin(): Attribute
    {
        $isAdmin = $this->role_name === UserRole::ADMINISTRATOR;

        return Attribute::get(fn (): bool => $isAdmin);
    }

    /**
     * @return Attribute<bool,never>
     */
    protected function isTeacher(): Attribute
    {
        $isTeacher = $this->role_name === UserRole::TEACHER;

        return Attribute::get(fn (): bool => $isTeacher);
    }

    /**
     * @return Attribute<string,never>
     */
    protected function role(): Attribute
    {
        /** @var UserRole $userRole */
        $userRole = $this->role_name;

        return Attribute::get(fn (): string => $userRole->getLabel());
    }
}
