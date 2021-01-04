<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        $admins = Admin::get();
        return view('admin.admins.list', ['admins' => $admins]); 
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        if ($admin == null) {
            return redirect()->route('admin.admins');
        }

        return view('admin.edit', ['admin' => $admin]);
    }

    public function add()
    {
        return view('admin.admins.add');
    }

    public function update($id, Request $request)
    {

    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.addAdmin')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $admin = new Admin;
            $admin->firstName = $request->firstName;
            $admin->lastName = $request->lastName;
            $admin->email = $request->email;
            $admin->password  = Hash::make($request->password);
            $admin->save();

            return redirect()->route('admin.admins');
        }
    }
}