<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use App\Models\Prescription;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HealthRecordController extends Controller
{
    public function index()
    {
        $Lists = User::select('users.id', 'users.name as user_name', 'services.name as service_name', 'pets.name as pet_name', 'schedules.created_at')
            ->join('schedules', 'schedules.customer_id', '=', 'users.id')
            ->join('services', 'services.id', '=', 'schedules.service_id')
            ->join('pets', 'pets.customer_id', '=', 'users.id')
            ->paginate(7);

        return view('managers.kien.Examination_schedule', compact('Lists'));
    }

    public function create()
    {
        $pets = Pet::all();
        $idDoctor = Session::get('loginId');
        return view('doctors.healthrecords.create', compact('idDoctor', 'pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idbs' => 'required|exists:users,id',
            'idpet' => 'required|exists:pets,id',
            'sdt' => 'required|number',
            'idthuoc' => 'required',
            'date' => 'required|date',
        ]);

        HealthRecord::create($request->all());
    }

    public function createHealthRecord(Request $request)
    {
        $request->validate([
            'idbs' => 'required',
            'idpet' => 'required',
            'sdt' => 'required',
            'idthuoc' => 'required',
            'date' => 'required',
        ]);
        HealthRecord::create([
            'date' => $request->input('date'),
            'pet_id' =>  $request->input('idpet'),
            'doctor_id' => 4,
        ]);
        Prescription::created([
            'id' => $request->input('idthuoc'),
        ]);
        User::created([
            'id' => $request->input('idbs'),
            'phone' => $request->input('sdt'),
        ]);
        return back()->with('success', 'Health record created successfully');
    }

    public function show(HealthRecord $healthRecord)
    {
        return view('doctors.healthrecords.show', compact('healthRecord'));
    }

    public function edit(HealthRecord $healthRecord)
    {
        $doctors = User::all();
        $pets = Pet::all();
        $prescriptions = Prescription::all();
        return view('doctors.healthrecords.edit', compact('healthRecord', 'doctors', 'pets',
            'prescriptions'));
    }

    public function update(Request $request, HealthRecord $healthRecord)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'doctor_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'health_record_id' => 'required|exists:prescriptions,id',
        ]);

        // Update the health record with the validated data
        $healthRecord->update([
            'date' => $validatedData['date'],
            'doctor_id' => $validatedData['doctor_id'],
            'pet_id' => $validatedData['pet_id'],
        ]);

        // Update the health_record_id in the Prescription table
        Prescription::where('id', $validatedData['health_record_id'])
            ->update(['health_record_id' => $healthRecord->id]);

        // Redirect back with a success message
        return redirect()->route('health_records.index')->with('success', 'Health Record updated successfully.');
    }


    public function destroy(HealthRecord $healthRecord)
    {
        $healthRecord->delete();
        return redirect()->route('health_records.index')->with('success', 'Health Record deleted successfully.');
    }

    public function managerRecordHealth(Request $request)
    {
        $health_record_id = $request->input('health_record_id');
        $healthRecordInput = $this->healthRecordInput($health_record_id);
        $healthRecords = HealthRecord::join('prescriptions', 'prescriptions.health_record_id', '=', 'health_records.id')
            ->join('pets', 'pets.id', '=', 'health_records.pet_id')
            ->join('users', 'users.id', '=', 'pets.customer_id')
            ->select(
                'health_records.id as health_record_id',
                'health_records.doctor_id as doctor_id',
                'pets.id as pet_id',
                'users.phone as phone_customer',
                'health_records.date',
                'prescriptions.id as prescription_id',
                'users.name as name_customer',
                'pets.name as name_pet',
                'pets.species'
            )
            ->get();
        return view('manager.healthrecords.manager-health-record', compact('healthRecords', 'healthRecordInput'));
    }

    public function healthRecordInput($health_record_id)
    {
        return $healthRecordInput = HealthRecord::join('prescriptions', 'prescriptions.health_record_id', '=', 'health_records.id')
            ->join('pets', 'pets.id', '=', 'health_records.pet_id')
            ->join('users', 'users.id', '=', 'pets.customer_id')
            ->select(
                'health_records.id as health_record_id',
                'health_records.doctor_id as doctor_id',
                'pets.id as pet_id',
                'users.phone as phone_customer',
                'health_records.date',
                'prescriptions.id as prescription_id',
                'users.name as name_customer',
                'pets.name as name_pet',
                'pets.species'
            )
            ->where('health_records.id', $health_record_id)
            ->first();
    }
}
