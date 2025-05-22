<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SispaMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ic', 'email', 'no_matrik', 'height', 'weight', 'bmi',
        'tempoh_pengajian', 'kelayakan', 'status'
    ];
}
