<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public const TABLE = 'admin';
    
    public $timestamps = false;

    protected $hidden = 'password';

    protected $table = Admin::TABLE;

}
