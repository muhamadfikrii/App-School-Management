<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $guarded = [];

    public function classRombel(): BelongsTo
    {
        return $this->belongsTo(ClassRombel::class);
    }

    public function scheduleSubjects(): HasMany
    {
        return $this->hasMany(ScheduleSubject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
