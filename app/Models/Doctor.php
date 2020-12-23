<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public const TABLE = 'doctor';

    public $timestamps = false;

    protected $table = Doctor::TABLE;
    
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'doctorId', 'id');
    }
}
