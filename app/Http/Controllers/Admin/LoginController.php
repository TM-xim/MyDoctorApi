<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = 'admin.home';

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $request->session()->regenerate();
            return redirect()->route('admin.admins'); 
        }
    }

    public function index()
    {
        return view('admin.login');
    }
}