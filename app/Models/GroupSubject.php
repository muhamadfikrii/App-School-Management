<?php

namespace App\Models;

use Database\Factories\GroupSubjectFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupSubject extends Model
{
    use HasFactory;

    protected $table = "group_subject";

    protected $guarded = [];

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

    public function finalGrade()
    {
        return $this->belongsTo(FinalGrade::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

}
