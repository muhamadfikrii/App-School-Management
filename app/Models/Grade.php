<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\GradeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";

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
        return $this->belongsTo(GradeComponent::class,  'grade_component_id');
    }

    public function getWeightedScore(): float
    {
        $weight = $this->gradeComponent?->weight ?? 1;
        return $this->score * $weight;
    }

    protected static function booted()
    {
    static::creating(function (Grade $grade) {
        if (auth()->check() && auth()->user()->is_teacher && auth()->user()->teacher) {
            $grade->teacher_id = auth()->user()->teacher->id;
        }
    });
    }


    protected static function final()
    {
        static::created(function($grade) {
        $grade->student->updateFinalScores();
    });

    static::updated(function($grade) {
        $grade->student->updateFinalScores();
    });

    static::deleted(function($grade) {
        $grade->student->updateFinalScores();
    });
    }
}
