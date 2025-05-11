<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
