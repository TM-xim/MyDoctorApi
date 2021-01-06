<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class DoctorsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        $doctors = Doctor::get();
        return view('admin.doctors.list', ['doctors' => $doctors]); 
    }

    public function add()
    {
        return view('admin.doctors.add');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor == null) {
            return redirect()->route('admin.doctors');
        }

        return view('admin.doctors.edit', ['doctor' => $doctor]);
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor == null) {
            return redirect()->route('admin.doctors');
        }

        return view('admin.doctors.delete', ['doctor' => $doctor]); 
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'password' => 'required',
            'postalAddress' => 'required',
            'postCode' => 'required|integer',
            'latitude' => 'required|numeric|between:0,99.99',
            'longitude' => 'required|numeric|between:0,99.99',
            'description' => 'nullable',
            'picture' => 'required|image|mimes:jpeg,png,jpg',
            'price' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.addDoctor')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $doctor = new Doctor;
            $doctor->firstName = $request->firstName;
            $doctor->lastName = $request->lastName;
            $doctor->password = $request->password;
            $doctor->postalAddress = $request->postalAddress;
            $doctor->postCode = $request->postCode;
            $doctor->latitude = $request->latitude;
            $doctor->longitude = $request->longitude;
            $doctor->description = $request->description;
            $doctor->picture = $request->file('picture')->store('pictures');
            $doctor->price = $request->price;
            $doctor->email = $request->email;
            $doctor->password  = Hash::make($request->password);
            $doctor->save();

            return redirect()->route('admin.doctors')
                ->with(['successful_message' => 'Profile created successfully']);
        }
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'password' => 'required',
            'postalAddress' => 'required',
            'postCode' => 'required|integer',
            'latitude' => 'required|numeric|between:0,99.99',
            'longitude' => 'required|numeric|between:0,99.99',
            'description' => 'nullable',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg',
            'price' => 'required|integer',
            'email' => 'required|email',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.editDoctor', ['id' => $id])
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $doctor = Doctor::find($id);

            if ($doctor == null) {
                return redirect()->route('admin.doctors');
            }

            $doctor->firstName = $request->firstName;
            $doctor->lastName = $request->lastName;
            $doctor->postalAddress = $request->postalAddress;
            $doctor->postCode = $request->postCode;
            $doctor->latitude = $request->latitude;
            $doctor->longitude = $request->longitude;
            $doctor->description = $request->description;
            $doctor->price = $request->price;
            $doctor->email = $request->email;
            $doctor->save();

            if ($request->filled('password')) {
                $doctor->password  = Hash::make($request->password);
            }

            if ($request->hasFile('picture')) {
                Storage::delete($doctor->picture);
                $doctor->picture = $request->file('picture')->store('pictures');
            }

            $doctor->save();

            return redirect()->route('admin.doctors')
                ->with(['successful_message' => 'Profile updated successfully']);
        }
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('admin.doctors')
            ->with(['successful_message' => 'Profile deleted successfully']);
    }
}