<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ClassRombelFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRombel extends Model
{
    use HasFactory;

    protected $table = "class_rombel";

    protected $guarded = [];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'class_rombel_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class,'academic_year_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function scopeForTeacher(Builder $query, int $teacherId): Builder
    {
        return $query->where('teacher_id', $teacherId);
    }
}
