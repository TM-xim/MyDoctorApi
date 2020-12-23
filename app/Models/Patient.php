<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public const TABLE = 'patient';

    public $timestamps = false;

    protected $table = Patient::TABLE;

    protected $hidden = ['password'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'patientId', 'id');
    }
}
