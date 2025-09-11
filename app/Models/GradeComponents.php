<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeComponents extends Model
{
    protected $table = "grades_components";

    protected $guarded = [];

    public function setWeightAttributes($value)
    {
        $this->attributes["weight"] = $value / 100;
    }

    public function getWeightAttributes($value)
    {
        return $value * 100;
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
