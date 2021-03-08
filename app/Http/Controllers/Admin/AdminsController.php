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
        $this->middleware('auth');
    }
    
    public function index()
    {
        config(['global.active_tab' => 'admins']);
        $admins = Admin::get();
        return view('admin.admins.list', ['admins' => $admins]); 
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        if ($admin == null) {
            return redirect()->route('admin.admins');
        }

        return view('admin.admins.edit', ['admin' => $admin]);
    }

    public function add()
    {
        return view('admin.admins.add');
    }

    public function delete($id)
    {
        $admin = Admin::find($id);

        if ($admin == null) {
            return redirect()->route('admin.admins');
        }

        return view('admin.admins.delete', ['admin' => $admin]); 
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.editAdmin')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $admin = Admin::find($id);

            if ($admin == null) {
                return redirect()->route('admin.admins');
            }

            $admin->firstName = $request->firstName;
            $admin->lastName = $request->lastName;
            $admin->email = $request->email;

            if ($request->filled('password')) {
                $admin->password  = Hash::make($request->password);
            }

            $admin->save();

            return redirect()->route('admin.admins')
                ->with(['successful_message' => 'Profile updated successfully']);
        }
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

            return redirect()->route('admin.admins')
                ->with(['successful_message' => 'Profile created successfully']);
        }
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.admins')
            ->with(['successful_message' => 'Profile deleted successfully']);
    }
}