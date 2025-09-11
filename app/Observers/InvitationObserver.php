<?php

namespace App\Observers;

use App\Models\Invitation;

class InvitationObserver
{
    /**
     * Handle the Invitation "created" event.
     */
    public function created(Invitation $invitation): void
    {
        $invitation->invite();
    }

    /**
     * Handle the Invitation "updated" event.
     */
    public function updated(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "deleted" event.
     */
    public function deleted(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "restored" event.
     */
    public function restored(Invitation $invitation): void
    {
        //
    }

    /**
     * Handle the Invitation "force deleted" event.
     */
    public function forceDeleted(Invitation $invitation): void
    {
        //
    }
}
