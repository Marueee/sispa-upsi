<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'description'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
