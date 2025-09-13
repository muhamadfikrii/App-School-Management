<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinalGrade extends Model
{
    use HasFactory;

    protected $table = 'final_grades';

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classRombel()
    {
        return $this->belongsTo(ClassRombel::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function gradesDetail(): HasMany
    {
        return $this->hasMany(GradesDetail::class, 'final_grade_id');
    }
}
