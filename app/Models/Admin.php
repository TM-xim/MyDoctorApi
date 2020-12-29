<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public const TABLE = 'admin';
    
    public $timestamps = false;

    protected $hidden = 'password';

    protected $table = Admin::TABLE;

}
