<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    protected $table = 'levels';

    protected $guarded = [];

    public function classRombels(): HasMany 
    {
        return $this->hasMany(ClassRombel::class);
    }

    public function subject() 
    {
        return $this->belongsTo(Subject::class);
    }
}
