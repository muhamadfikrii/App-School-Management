<?php

namespace App\Livewire\Partials;

use App\Models\Achievement;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class Statistics extends Component
{
    public $students;

    public $teachers;

    public $majors;

    public $achievements;

    public function mount()
    {
        $this->students = Student::count();
        $this->teachers = Teacher::count();
        $this->majors = Major::count();
        $this->achievements = Achievement::count();
    }

    public function render()
    {
        return view('livewire.partials.statistics');
    }
}
