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
        return $this->belongsTo(GroupSubject::class, 'group_subject_id');
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

            // Deteksi otomatis format bobot (persen atau desimal)
            $weight = (float) $component->weight;
            if ($weight > 1) {
                $weight = $weight / 100.0; // kalau simpan dalam persen (mis: 30)
            }

            $avgScore = $componentGrades->avg('score'); // skor 0–100
            $score = $avgScore ?? 0; // kalau belum ada nilai dianggap 0

            $sumWeighted += $score * $weight;
        }

        $finalScore = round($sumWeighted, 2);

        // Predikat standar Indonesia
        $predicate = match (true) {
            $finalScore >= 90 => 'A',
            $finalScore >= 80 => 'B',
            $finalScore >= 70 => 'C',
            default => 'D',
        };

        // Ambil KKM dari subject, default 75
        $kkm = $this->kkm;
        $isPassed = $finalScore >= $kkm;

        return [
            'final_score' => $finalScore,
            'predicate'   => $predicate,
            'is_passed'   => $isPassed,
        ];
    }
}
