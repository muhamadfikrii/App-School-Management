<?php

namespace App\Models;

use App\Enums\TeacherStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    protected $table = "teachers";

    protected $guarded = [];

    protected $casts = [
        'status' => TeacherStatus::class,
    ];

     public function classes() 
    {
        return $this->hasOne(ClassRombel::class,'teacher_id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function academicYear() {
        return $this->belongsTo(AcademicYear::class);
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class);
    }
    
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedules::class);
    }
}
