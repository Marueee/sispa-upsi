<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application'; // Important if your table is not 'applications'

    protected $fillable = [
        'name', 'ic', 'email', 'no_matrik',
        'height', 'weight', 'bmi',
        'tempoh_pengajian', 'kelayakan', 'status'
    ];
}
