<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'member_id',
        'date',
        'activity_name',
        'batch',
        'is_present',
        'description'
    ];

    protected $casts = [
        'date' => 'date',
        'is_present' => 'boolean'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
