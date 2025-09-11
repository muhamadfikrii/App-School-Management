<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    protected $table = "majors";

    protected $guarded = [];
    public function classRombels(): HasMany     
    {
        return $this->hasMany(ClassRombel::class);
    }
}
