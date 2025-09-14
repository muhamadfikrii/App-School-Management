<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduleSubject extends Model
{
    use HasFactory;

    protected $table = 'schedule_subject';

    protected $fillable = [
        'schedule_id',
        'subject_id',
        'teacher_id',
        'time_start',
        'time_end',
    ];

    protected $casts = [
        'time_start' => 'datetime:H:i',
        'time_end'   => 'datetime:H:i',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTimeRangeAttribute(): string
    {
        if (! $this->time_start || ! $this->time_end) {
            return '-';
        }

        return $this->time_start->format('H:i') . ' - ' . $this->time_end->format('H:i');
    }

    public function getDisplayAttribute(): string
    {
        return ($this->time_range ?? '-') . ' ' .
            ($this->subject?->name ?? '-') .
            ' (' . ($this->teacher?->full_name ?? '-') . ')';
    }
}
