<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Invitation;
use Illuminate\Support\Carbon;
use App\Enums\InvitationStatus;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class FromRegister extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Teacher fields
    public ?string $nip = null;
    public ?string $phone = null;
    public string $gender = '';
    public ?string $date_of_birth = null; // YYYY-MM-DD
    public string $status = '';
    public bool $isTeacher = false;
    public ?string $address = null;
    public Invitation $invitation;

    public function mount(Invitation $invitation): void
    {
        $this->invitation = $invitation;

        $this->isTeacher = $invitation->is_teacher;

        $this->name = $invitation->name;

        $this->email = $invitation->email;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.from-register');
    }

    public function submit()
   {
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => ['required', 'confirmed', 'min:5'],
    ];

    if ($this->isTeacher) {
        $rules = array_merge($rules, [
            'nip' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'gender' => 'required|in:laki-laki,perempuan',
            'date_of_birth' => 'required|date',
            'status' => 'required|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);
    }
        $validated = $this->validate($rules);

        DB::transaction(function () use ($validated) {
            // Create user
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($validated['password']),
                'role_name' => $this->isTeacher ? $user->is_teacher : $user->is_admin,
            ]);

            if ($this->isTeacher) {
                Teacher::create([
                    'name' => $this->name,
                    'nip' => $validated['nip'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'gender' => $validated['gender'],
                    'date_of_birth' => isset($validated['date_of_birth']) ? Carbon::parse($validated['date_of_birth']) : null,
                    'status' => $validated['status'],
                    'address' => $validated['address'] ?? null,
                    'user_id' => $user->id,
                ]);
            }
        });

        session()->flash('success', 'Teacher and User created successfully!');
        $this->invitation->update(['status' => InvitationStatus::SUCCESS ]);

        return redirect()->to('/admin');
    }
}
