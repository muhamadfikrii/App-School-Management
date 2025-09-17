<?php

namespace App\Models;

use App\Enums\TeacherStatus;
use Database\Factories\TeacherFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $guarded = [];

    protected $casts = [
        'status' => TeacherStatus::class,
    ];

    public function classRombel(): HasOne
    {
        return $this->hasOne(ClassRombel::class, 'teacher_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academicYear() {
        return $this->belongsTo(AcademicYear::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(
            Subject::class,
            'subject_teacher',
            'teacher_id',
            'subject_id'
        );
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
