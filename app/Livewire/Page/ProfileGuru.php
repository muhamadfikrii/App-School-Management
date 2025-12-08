<?php

namespace App\Livewire\Page;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

use function view;

class ProfileGuru extends Component
{
    use WithPagination;

    public $showModal = false;
    public $selectedTeacher = null;

    // Search and filter properties
    public $search = '';
    public $statusFilter = '';
    public $departmentFilter = '';
    public $perPage = 9;

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'departmentFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingDepartmentFilter()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->statusFilter = '';
        $this->departmentFilter = '';
        $this->resetPage();
    }

    public function showTeacherDetail($teacherId)
    {
        $this->selectedTeacher = Teacher::with(['user', 'subjects'])->find($teacherId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedTeacher = null;
    }

    public function render()
    {
        $teachers = Teacher::with(['user', 'subjects'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('full_name', 'like', '%' . $this->search . '%')
                      ->orWhere('nip', 'like', '%' . $this->search . '%')
                      ->orWhereHas('subjects', function ($subjectQuery) {
                          $subjectQuery->where('name', 'like', '%' . $this->search . '%');
                      })
                      ->orWhereHas('user', function ($userQuery) {
                          $userQuery->where('email', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when($this->departmentFilter, function ($query) {
                // This would need to be implemented based on your department/subject grouping logic
                // For now, we'll filter by subject groups
                $query->whereHas('subjects', function ($subjectQuery) {
                    $subjectQuery->whereHas('groupSubject', function ($groupQuery) {
                        $groupQuery->where('id', $this->departmentFilter);
                    });
                });
            })
            ->paginate($this->perPage);

        return view('livewire.Page.ProfileGuru', compact('teachers'));
    }
}
