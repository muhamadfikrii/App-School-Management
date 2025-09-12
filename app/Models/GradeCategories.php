<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeCategories extends Model
{
    protected $table = "grades_categories";

    protected $guarded = [];

    public function component()
    {
        return $this->hasMany(GradeComponent::class);
    }
}
