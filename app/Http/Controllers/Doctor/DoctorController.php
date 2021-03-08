<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctor;
use App\Models\Schedule;

class DoctorController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function edit()
    {
        config(['global.active_tab' => 'me']);
        return view('doctor.me');
    }

    public function list()
    {
        config(['global.active_tab' => 'agenda']);
        $schedules = Schedule::get();
        return view('doctor.list', ['schedules' => $schedules]);
    }

    public function update(Request $request)
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
            return redirect()->route('doctor.editDoctor')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $doctor = $request->user();

            $doctor->firstName = $request->firstName;
            $doctor->lastName = $request->lastName;
            $doctor->postalAddress = $request->postalAddress;
            $doctor->postCode = $request->postCode;
            $doctor->latitude = $request->latitude;
            $doctor->longitude = $request->longitude;
            $doctor->description = $request->description;
            $doctor->price = $request->price;
            $doctor->email = $request->email;

            if ($request->filled('password')) {
                $doctor->password  = Hash::make($request->password);
            }

            if ($request->hasFile('picture')) {
                Storage::delete($doctor->picture);
                $doctor->picture = $request->file('picture')->store('pictures');
            }

            $doctor->save();

            return redirect()->route('doctor.welcome')
                ->with(['successful_message' => 'Profile updated successfully']);
        }
    }


}