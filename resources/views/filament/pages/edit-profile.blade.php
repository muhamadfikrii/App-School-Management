<x-filament-panels::page>
    <form wire:submit.prevent="saveProfile" class="space-y-6">
        {{ $this->form }}
    </form>

    <div class="mt-10 border-t pt-6">
        <form wire:submit.prevent="changePassword" class="space-y-6">
            {{ $this->passwordForm }}
        </form>
    </div>
</x-filament-panels::page>
