<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function classRombel(): BelongsTo
    {
        return $this->belongsTo(ClassRombel::class, 'class_rombel_id');
    }

    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function finalGrade(): HasMany
    {
        return $this->hasMany(FinalGrade::class);
    }

    public function scopeForTeacher($query, $teacherId)
    {
        return $query->whereHas('studentClass', function ($q) use ($teacherId): void {
            $q->where('teacher_id', $teacherId);
        });
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
