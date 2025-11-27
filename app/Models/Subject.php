<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function round;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

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
        return $this->belongsTo(GroupSubject::class, 'group_subject_id');
    }

    public function scheduleSubject(): HasMany
    {
        return $this->hasMany(ScheduleSubject::class);
    }

    public function groupSubject()
    {
        return $this->belongsTo(GroupSubject::class);
    }

    /**
     * Hitung nilai akhir siswa (standar Indonesia).
     *
     * @param int $studentId
     * @param int $academicYearId
     * @param int $semester
     *
     * @return array ['final_score' => float, 'predicate' => string, 'is_passed' => bool]
     */
    public function calculate($studentId, $academicYearId, $semester)
    {
        $grades = $this->grades()
            ->where('student_id', $studentId)
            ->where('academic_year_id', $academicYearId)
            ->where('semester', $semester)
            ->with('gradeComponent')
            ->get()
            ->groupBy('grade_component_id');

        $sumWeighted = 0.0;

        foreach ($grades as $componentGrades) {
            $component = $componentGrades->first()->gradeComponent ?? null;
            if (!$component) {
                continue;
            }

            $weight = (float) $component->weight;
            if ($weight > 1) {
                $weight /= 100.0;
            }

            $avgScore = $componentGrades->avg('score');
            $score    = $avgScore ?? 0;

            $sumWeighted += $score * $weight;
        }

        $finalScore = round($sumWeighted, 2);

        $predicate = match (true) {
            $finalScore >= 90 => 'A',
            $finalScore >= 80 => 'B',
            $finalScore >= 70 => 'C',
            default           => 'D',
        };

        $kkm      = $this->kkm;
        $isPassed = $finalScore >= $kkm;

        return [
            'final_score' => $finalScore,
            'predicate'   => $predicate,
            'is_passed'   => $isPassed,
        ];
    }
}
