<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'member_id', 'batch', 'date', 'activity_name', 'is_present',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
