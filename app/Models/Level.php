<?php

namespace App\Models;

use Database\Factories\LevelFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

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
