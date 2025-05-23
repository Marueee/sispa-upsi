<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SispaMember extends Model
{
    use HasFactory;

    // Tell Laravel to use the new table name
    protected $table = 'application';

    protected $fillable = [
        'name', 'ic', 'email', 'no_matrik', 'height', 'weight', 'bmi',
        'tempoh_pengajian', 'kelayakan', 'status'
    ];
}
