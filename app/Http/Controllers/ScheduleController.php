<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = User::select(
            'health_records.id',
            'users.id AS user_id',
            'health_records.pet_id',
            'prescriptions.id as prescriptions_id',
            'users.phone',
            'health_records.created_at as date',

            'pets.species',
            'users.name'
        )
            ->join('health_records', 'users.id', '=', 'health_records.doctor_id')
            ->join('pets', 'pets.id', '=', 'health_records.pet_id')
            ->join('prescriptions', 'prescriptions.health_record_id', '=', 'health_records.id')
            ->whereNull('users.deleted_at')
            ->get();
        return view('managers.kien.healthcares', compact('schedules'));
    }
    public function LichKham()
    {
        $Lists = User::select('users.id', 'users.name as user_name', 'services.name as service_name', 'pets.name as pet_name', 'schedules.created_at')
            ->join('schedules', 'schedules.customer_id', '=', 'users.id')
            ->join('services', 'services.id', '=', 'schedules.service_id')
            ->join('pets', 'pets.customer_id', '=', 'users.id')
            ->get();

        return view('managers.kien.Examination_schedule', compact('Lists'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function CreateBuild()
    {
        $services = Service::all();
        return view('customer.booking', compact('services'));
    }

    public function CfCfBuild(string $id)
    {
        // Find the schedule by ID
        $schedule = Schedule::find($id);

        if ($schedule) {
            // Update the status to 1
            $schedule->status = 1;
            $schedule->save();

            // Optionally, add a success message or redirect
            return redirect()->back()->with('success', 'Schedule status updated successfully.');
        } else {
            // Handle the case where the schedule is not found
            return redirect()->back()->with('error', 'Schedule not found.');
        }
    }

    public function CancelBuild(Request $request, $id)
    {
        // Find the schedule by ID
        $schedule = Schedule::find($id);
        $request->validate([
            'message' => 'required',

        ], [
            'message.required' => 'Không được bỏ trống.',
        ]);
        if ($schedule) {
            // Update the status to 1
            $schedule->status = 2;
            $schedule->message = $request->input('message');
            $schedule->save();

            // Optionally, add a success message or redirect
            return redirect()->back()->with('success', 'Schedule status updated successfully.');
        } else {
            // Handle the case where the schedule is not found
            return redirect()->back()->with('error', 'Schedule not found.');
        }
    }

}
