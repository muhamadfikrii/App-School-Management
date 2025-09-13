<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradeComponent extends Model
{
    use HasFactory;

    protected $table = "grades_components";

    protected $guarded = [];

    public function setWeightAttributes($value)
    {
        $this->attributes['weight'] = $value / 100;
    }

    public function getWeightAttributes($value)
    {
        return $value * 100;
    }


    // Relasi
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
