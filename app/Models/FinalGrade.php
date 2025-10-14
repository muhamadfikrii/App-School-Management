<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinalGrade extends Model
{
    use HasFactory;

    protected $table = 'final_grades';

    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function classRombel(): BelongsTo
    {
        return $this->belongsTo(ClassRombel::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function gradesDetail(): HasMany
    {
        return $this->hasMany(GradesDetail::class, 'final_grade_id');
    }

    public function groupSubject(): HasMany
    {
        return $this->hasMany(GroupSubject::class);
    }
}
