<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedules extends Model
{
    protected $table = "schedules";

    protected $guarded = [];

    public function classRombel(): BelongsTo 
    {
        return $this->belongsTo(ClassRombel::class);
    }

    public function subject(): BelongsTo 
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher(): BelongsTo 
    {
        return $this->belongsTo(Teacher::class);
    }
}
