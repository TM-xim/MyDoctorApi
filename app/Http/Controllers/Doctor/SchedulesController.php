<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    public function add()
    {
        return view('doctor.schedules.add');
    }
}