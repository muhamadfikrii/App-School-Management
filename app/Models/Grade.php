<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classRombel()
    {
        return $this->belongsTo(ClassRombel::class);
    }

    public function gradeComponent()
    {
        return $this->belongsTo(GradeComponent::class, 'grade_component_id');
    }

    public function groupSubject()
    {
        return $this->hasMany(GroupSubject::class);
    }
}
