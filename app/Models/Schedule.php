<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public const TABLE = 'schedule';

    public $timestamps = false;

    protected $table = Schedule::TABLE;

    protected $dates = [
        'start',
        'end'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
}
