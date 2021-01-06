<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('doctor')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $request->session()->regenerate();
            return redirect()->route('doctor.welcome'); 

            //dd('welcome doctor');
        }
    } 

    public function index()
    {
        return view('doctor.login');
    }
}