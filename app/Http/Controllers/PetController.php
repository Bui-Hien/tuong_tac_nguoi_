<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view("employees/pets/index", compact('pets'));
    }

    public function create()
    {
        $usersWithPhoneNumbers = User::whereHas('userRules.rule', function ($query) {
            $query->where('id', '4');
        })->select('id', 'phone')
            ->get();

        $formattedUsers = $usersWithPhoneNumbers->map(function ($user) {
            return [
                'phone_number' => $user->phone,
                'id' => $user->id,
            ];
        });
        return view('employees/pets/create', compact('formattedUsers'));
    }

    public function store(Request $request)
    {
        $this->validateName($request);
        $this->validateSex($request);
        $this->validateSpecies($request);
        $this->validateAge($request);
        $this->validateCustomerId($request);

        $pet = new Pet();
        $pet->name = $request->input('name');
        $pet->sex = $request->input('sex');
        $pet->species = $request->input('species');
        $pet->age = $request->input('age');
        $pet->customer_id = $request->input('customer_id');
        $pet->save();
        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function validateName($request)//1
    {
        return $request->validate([
            'name' => [
                'required',//2
                'regex:/^[a-zA-Z\s]+$/',//3
                'max:50']//4
        ], [
            'name.required' => 'Tên thú cưng không được trống.',//5
            'name.regex' => 'Tên thú cưng không được số hoặc chứa ký tự đặc biệt.',//6
            'name.max' => 'Tên thú cưng không được vượt quá 50 ký tự.',//7
        ]);
    }

    public function validateSex($request)//1
    {
        return $request->validate([
            'sex' => [
                'required',//2
                'in:0,1'//3
            ]
        ], [
            'sex.required' => 'Giới tính không được trống.',//4
            'sex.in' => 'Giới tính phải là Đực hoặc Cái.',//5
        ]);
    }

    public function validateSpecies($request)//1
    {
        return $request->validate([
            'species' => [
                'required',//2
                'regex:/^[a-zA-Z\s]+$/',//3
                'max:50'//4
            ]
        ], [
            'species.required' => 'Chủng loại không được trống.',//5
            'species.regex' => 'Chủng loại không được chứa số hoặc ký tự đặc biệt.',//6
            'species.max' => 'Chủng loại không được vượt quá 50 ký tự.',//7
        ]);
    }


    public function validateAge($request)//1
    {
        return $request->validate([
            'age' => [
                'required',//2
                'integer',//3
                'min:1',//4
                'max:100']//5
        ], [
            'age.required' => 'Tuổi không được trống.',//6
            'age.integer' => 'Tuổi phải là số nguyên lớn hơn 0 nhỏ hơn 101.',//7
            'age.min' => 'Tuổi phải là số nguyên lớn hơn 0 nhỏ hơn 101.',//8
            'age.max' => 'Tuổi phải là số nguyên lớn hơn 0 nhỏ hơn 101.',//9
        ]);
    }

    public function validateCustomerId($request)//1
    {
        return $request->validate([
            'customer_id' => [
                'required', //2
                'exists:users,id']//3
        ], [
            'customer_id.required' => 'Khách hàng không được trống.',//4
            'customer_id.exists' => 'Khách hàng không khớp với lịch sử đặt dịch vụ.',//5
        ]);
    }

    public function show(Pet $pet)
    {
        return view('employees/pets/show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('employees/pets/edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'sex' => 'required|integer',
            'species' => 'required|string',
            'age' => 'required|integer',
            'customer_id' => 'required|exists:users,id'
        ]);

        $pet->update($validated);
        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
