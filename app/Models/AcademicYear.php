<?php

namespace App\Models;

use Database\Factories\AcademicYearFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;

    protected $table = "academic_year";

    protected $guarded = [];


    public function classRombel() {
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
