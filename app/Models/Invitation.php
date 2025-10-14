<?php

namespace App\Models;

use App\Enums\InvitationStatus;
use App\Mail\InvitationMail;
use App\Observers\InvitationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

#[ObservedBy([InvitationObserver::class])]
class Invitation extends Model
{
    protected $table = 'invitations';

    protected $guarded = [];

    protected $casts = [
        'status' => InvitationStatus::class,
        'is_teacher' => 'boolean',
    ];

    public function invite(): void
    {
        Mail::to($this->email)->send(new InvitationMail($this));
    }

    public function signedUrl(int $hours = 5): string
    {
        return URL::temporarySignedRoute('register', now()->addHours($hours), [
            'invitation' => $this,
        ]);
    }

    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by_id');
    }
}
