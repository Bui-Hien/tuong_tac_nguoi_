<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRuleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('logout', [CustomAuthController::class, 'logout']);

Route::middleware(['alreadyLoggedIn'])->group(function () {
    Route::post('register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
    Route::post('login-manager', [CustomAuthController::class, 'PostManagerLogin'])->name('login-manager');
    Route::post('login-employee', [CustomAuthController::class, 'PostEmployeeLogin'])->name('login-employee');
    Route::post('login-doctor', [CustomAuthController::class, 'PostDoctorLogin'])->name('login-doctor');
    Route::get('manager/login', [CustomAuthController::class, 'managerLogin']);
    Route::get('employee/login', [CustomAuthController::class, 'employeeLogin']);
    Route::get('doctor/login', [CustomAuthController::class, 'doctorLogin']);
    Route::get('registration', [CustomAuthController::class, 'registration']);
});

Route::middleware(['authManager'])->group(function () {
    Route::get('managers', [\App\Http\Controllers\UserController::class, 'manager']);
    Route::get('managers/create-employee', [\App\Http\Controllers\UserController::class, 'createEmployee']);
    Route::post('managers/create-employee', [\App\Http\Controllers\UserController::class, 'PostCreateEmployee'])->name('create-employee');
    Route::delete('managers/delete-employee/{id}', [\App\Http\Controllers\UserController::class, 'DeleteEmployee'])->name('delete-employee');
    Route::get('managers/accounts', [\App\Http\Controllers\UserController::class, 'ListEmployee']);

    Route::get('managers/update-employee/{id}', [\App\Http\Controllers\UserController::class, 'EditEmployee']);
    Route::put('managers/update-employee/{id}', [UserController::class, 'UpdateEmployee']);
    Route::get('managers/search', [\App\Http\Controllers\UserController::class, 'search']);


    Route::get('managers/customer', [\App\Http\Controllers\UserController::class, 'customer'])->name('managers.customer');
    Route::get('managers/export-customer', [\App\Http\Controllers\UserController::class, 'exportCustomer']);
    Route::post('managers/export-customer-word', [\App\Http\Controllers\UserController::class, 'exportWord'])->name('export.customer.word');


    Route::get('managers/pet', [\App\Http\Controllers\UserController::class, 'pet'])->name('managers.pet');
    Route::get('managers/export-pet', [\App\Http\Controllers\UserController::class, 'exportPet']);
    Route::post('managers/export-pet-word', [\App\Http\Controllers\UserController::class, 'exportPetWord'])->name('export.pet.word');


    Route::get('managers/medicine', [\App\Http\Controllers\UserController::class, 'medicine'])->name('managers.medicine');
    Route::get('managers/export-medicine', [\App\Http\Controllers\UserController::class, 'exportMedicine']);
    Route::post('managers/export-medicine-word', [UserController::class, 'exportMedicineWord'])->name('export.medicine.word');

    Route::get('managers/employee', [\App\Http\Controllers\UserController::class, 'employee'])->name('managers.employee');
    Route::get('managers/export-employee', [\App\Http\Controllers\UserController::class, 'exportEmployee']);
    Route::post('managers/export-employee-word', [UserController::class, 'exportEmployeeWord'])->name('export.employee.word');
});

Route::middleware(['authEmployee'])->group(function () {
    Route::get('employees/schedulenew', [UserController::class, 'schedulenew'])->name('employees.schedulenew');
    Route::get('employees/schedulecf', [\App\Http\Controllers\UserController::class, 'schedulecf'])->name('employees.schedulecf');
    Route::get('employees/schedulecancel', [\App\Http\Controllers\UserController::class, 'schedulecancel'])->name('employees.schedulecancel');


    Route::put('employees/customers/{id}/cf-build', [\App\Http\Controllers\ScheduleController::class, 'CfCfBuild'])->name('cf-update-build');
    Route::put('employees/customers/{id}/cancel-build', [\App\Http\Controllers\ScheduleController::class, 'CancelBuild'])->name('cancel-update-build');
    Route::resource('employees/medicines', MedicineController::class);

    Route::get('employees/export_imediccine', [UserController::class, 'export_imediccine'])->name('employees.export_imediccine');
});
Route::middleware(['authDoctor'])->group(function () {
    Route::resource('doctors/health_records', \App\Http\Controllers\HealthRecordController::class);
    Route::resource('doctors/schedules', \App\Http\Controllers\ScheduleController::class);
    Route::get('doctors/manager/health_records', [\App\Http\Controllers\HealthRecordController::class, 'managerRecordHealth']);
    Route::get('doctors/manager/health_records', [\App\Http\Controllers\HealthRecordController::class, 'managerRecordHealth']);
    Route::get('/doctors/health-record', [\App\Http\Controllers\HealthRecordController::class, 'index'])->name('doctors.health-record');


//    Route::get('/doctors/health-record', function () {
//        return view('managers.kien.Examination_schedule');
//    })->name('doctors.health-record');
    Route::get('/doctors/healthcares', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('doctors.healthcares');
    Route::post('/doctors/healthcares', [HealthRecordController::class, 'createHealthRecord'])->name('create.health.record');

});


Route::get('customer/booking', [\App\Http\Controllers\ScheduleController::class, 'CreateBuild'])->name('booking'
);
Route::post('customers', [\App\Http\Controllers\UserController::class, 'StoreBuild'])->name('customers-store-build');
