<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $table = "academic_year";

    protected $guarded = [];

    public function Student() {
        return $this->hasOne(Student::class);
    }

    public function Classes() {
        return $this->hasOne(ClassRombel::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function grades()
    {
    return $this->hasMany(Grade::class);
    }

}
