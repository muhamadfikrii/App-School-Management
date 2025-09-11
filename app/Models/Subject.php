<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $table = "subjects";

    protected $guarded = [];

    public function teachers(): BelongsToMany 
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedules::class,'');
    }

    public function grades()
    {
    return $this->hasMany(Grade::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
