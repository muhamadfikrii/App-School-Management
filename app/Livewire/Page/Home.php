<?php

namespace App\Livewire\Page;

use App\Models\Achievement;
use App\Models\Major;
use App\Models\Student;
use Livewire\Component;

use function view;

class Home extends Component
{
    public $achievements;

    public $majors;

    public $students;

    public function mount()
    {
        $this->students = Student::count();
        $this->majors   = Major::count();

        $this->achievements = Achievement::latest()->take(3)->get();
    }

    public function render()
    {
        return view('livewire.Page.home');
    }
}
