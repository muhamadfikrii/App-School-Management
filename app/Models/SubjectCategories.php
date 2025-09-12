<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubjectCategories extends Model
{
    protected $table = "subject_categories";

    protected $guarded = [];

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
