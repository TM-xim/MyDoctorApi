<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    public function add()
    {
        return view('doctor.schedules.add');
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('doctor.schedule.add')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $doctor = $request->user();

            $schedule = new Schedule;
            $schedule->doctorId = $doctor->id;
            $schedule->start = date('Y-m-d H:i:s', strtotime("$request->date $request->start"));
            $schedule->end = date('Y-m-d H:i:s', strtotime("$request->date $request->end"));
            $schedule->save();
    
            return redirect()->route('doctor.list')
                ->with(['successful_message' => 'Schedule created successfully']);
        }
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule == null) {
            return redirect()->route('doctor.list');
        }

        return view('doctor.schedules.edit', ['schedule' => $schedule]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ]);

        if ($validator->fails()) {
            return redirect()->route('doctor.schedule.edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $schedule = Schedule::find($id);

            if ($schedule == null) {
                return redirect()->route('doctor.list');
            }

            $schedule->start = date('Y-m-d H:i:s', strtotime("$request->date $request->start"));
            $schedule->end = date('Y-m-d H:i:s', strtotime("$request->date $request->end"));
            $schedule->save();
    
            return redirect()->route('doctor.list')
                ->with(['successful_message' => 'Schedule updated successfully']);
        }
    }

    public function delete($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule == null) {
            return redirect()->route('doctor.list');
        }

        return view('doctor.schedules.delete', ['schedule' => $schedule]); 
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('doctor.list')
            ->with(['successful_message' => 'Schedule deleted successfully']);
    }
}