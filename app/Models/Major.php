<?php

namespace App\Models;

use Database\Factories\MajorFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;

    protected $table = "majors";

    protected $guarded = [];
    public function classRombels(): HasMany
    {
        return $this->hasMany(ClassRombel::class);
    }
}
