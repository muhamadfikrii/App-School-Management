<?php

namespace App\Models;

use Database\Factories\SubjectFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";

    protected $guarded = [];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(
            Teacher::class,
            'subject_teacher',
            'subject_id',
            'teacher_id'
        );
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function grades(): HasMany
    {
    return $this->hasMany(Grade::class, 'subject_id', 'id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(GroupSubject::class, 'subject_categories_id');
    }

    public function calculate($studentId, $academicYearId, $semester)
    {
        $grades = $this->grades()
            ->where('student_id', $studentId)
            ->where('academic_year_id', $academicYearId)
            ->where('semester', $semester)
            ->with('gradeComponent')
            ->get()
            ->groupBy('grade_component_id');

        $finalScore = 0;

        foreach ($grades as $componentGrades) {
            $weight = ($componentGrades->first()->gradeComponent->weight ?? 0) / 100;
            $averageScore = $componentGrades->avg('score');
            $finalScore += $averageScore * $weight;
        }
        $finalScore = round($finalScore);
        $predicate = match (true) {
            $finalScore >= 90 => 'A',
            $finalScore >= 80 => 'B',
            $finalScore >= 70 => 'C',
            default => 'D',
        };

        return [
            'final_score' => round($finalScore, 2),
            'predicate'   => $predicate,
        ];
    }
}
