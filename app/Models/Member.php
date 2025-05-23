<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'matric_no', 'batch'];

    public function attendances()
{
    return $this->hasMany(Attendance::class);
}

}
