<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
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

    public function gradeComponents()
    {
        return $this->belongsTo(GradeComponent::class);
    }

    public function getWeightedScore(): float
    {
    $weight = $this->gradeComponent?->weight ?? 1;
    return $this->score * $weight;
    }

    protected static function booted()
    {
    static::creating(function (Grade $grade) {
        $waliKelas = $grade->student->classRombel?->teacher;

        if ($waliKelas) {
            $grade->teacher_id = $waliKelas->id; // bukan guru input
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
