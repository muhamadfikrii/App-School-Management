<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassRombel extends Model
{
    protected $table = "class_rombel";

    protected $guarded = [];

    public function student(): HasMany 
    {
        return $this->hasMany(Student::class, 'classes_id');
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

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedules::class,'');
    }

}
