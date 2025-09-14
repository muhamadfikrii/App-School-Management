<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradesDetail extends Model
{
    protected $table = "report_cards_detail";

    protected $guarded = [];

    public function finalGrade(): BelongsTo
    {
        return $this->belongsTo(FinalGrade::class);
    }
}
