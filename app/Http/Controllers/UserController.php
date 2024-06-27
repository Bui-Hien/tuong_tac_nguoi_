<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Rule;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use App\Models\UserRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class UserController extends Controller
{
    public function export_imediccine()
    {
        return view('managers.export_imediccine');
    }

    public function PostCreateEmployee(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'rule' => 'in:1,2,3',
            'sex' => 'in:0,1',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ',
            'name.required' => 'Tên là bắt buộc',
            'rule.in' => 'Quy tắc phải là một trong các giá trị: 1, 2, 3',
            'sex.in' => 'Giới tính phải là một trong các giá trị: 0, 1',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->sex = $request->input('sex');
        $user->created_by = Session::get("loginId");
        $user->updated_by = Session::get("loginId");
        $user->password = Hash::make($request->input('password'));
        if ($user->save()) {
            // Handle user roles
            $roles = $request->only(['ruleEmployee', 'ruleDoctor', 'ruleManager']);
            foreach ($roles as $role => $value) {
                if ($value) {
                    UserRule::create([
                        'user_id' => $user->id,
                        'rule_id' => $value,
                    ]);
                    echo $value;
                }
            }

            return back()->with('success', 'Bạn đã đăng ký thành công.');
        } else {
            // Return failure response
            return back()->with('fail', 'Đã xảy ra lỗi, vui lòng thử lại.');
        }
    }

    public
    function DeleteEmployee($id)
    {
        // Find the user by ID and delete them
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back with a success message
        return back()->with('success', 'Người dùng đã được xóa thành công.');
    }

    public function ListEmployee()
    {
        $data = User::with('userRules.rule')
            ->whereHas('userRules.rule', function ($query) {
                $query->where('id', 1)
                    ->orWhere('id', 2)
                    ->orWhere('id', 3);
            })->get();

        $data->transform(function ($user) {
            // Format the created_at attribute
            $user->formatted_created_at = date('d/m/Y', strtotime($user->created_at));

            return $user;
        });
        // Pass the data to the view
        return $data;
    }


    public
    function EditEmployee($id)
    {
        // Find the user by ID and eager load the related userRules and rules
        $user = User::with('userRules.rule')->where('id', $id)->first();

        // Check if the user was found
        if (!$user) {
            return redirect()->back()->withErrors('User not found');
        }
        echo $user;
        return view('managers.edit-employee', compact('user'));
    }    public
    function ManagerEmployee(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $roleId = $request->input('role_id');
        $employeeName = $request->input('employee_name');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $sex = $request->input('sex');

        $results = User::with('userRules.rule')
            ->whereHas('userRules.rule', function ($query) {
                $query->whereIn('id', [1, 2, 3]);
            });

        if ($employeeId) {
            $results->where('id', $employeeId);
        }
        if ($roleId) {
            $results->whereHas('userRules.rule', function ($query) use ($roleId) {
                $query->where('id', $roleId);
            });
        }
        if ($employeeName) {
            $results->where('name', 'like', '%' . $employeeName . '%');
        }
        if ($date) {
            $results->whereDate('created_at', $date);
        }
        if ($phone) {
            $results->where('phone', 'like', '%' . $phone . '%');
        }
        if ($sex) {
            $results->where('sex', 'like', '%' . $sex . '%');
        }

        $results = $results->paginate(5);
        return view('managers.kien.manager_employee', compact('results'));
    }


    public
    function UpdateEmployee(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('managers.employees')->with('error', 'Employee not found.');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'sex' => 'required|in:0,1',
            'password' => 'nullable|string|min:6',
        ]);

        // Update the user's information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->sex = $request->input('sex');

        // Check if the password is being updated
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $roles = $request->only(['ruleEmployee', 'ruleDoctor', 'ruleManager']);

        foreach ($roles as $role => $value) {
            if ($value) {
                // Cập nhật hoặc tạo mới quy tắc
                UserRule::updateOrCreate(
                    ['user_id' => $user->id, 'rule_id' => $value],
                    ['user_id' => $user->id, 'rule_id' => $value]
                );
            }
        }
        UserRule::where('user_id', $user->id)->whereNotIn('rule_id', array_values($roles))->delete();
        $user->save();

        return redirect('managers/accounts')->with('success', 'Employee updated ' . $user->name . ' successfully.');
    }

    public function search(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $rule = $request->input('rule') == "null" ? null : $request->input('rule');

        // Thực hiện truy vấn với các điều kiện lọc và phân trang
        $data = User::with('userRules.rule')
            ->when($id, function ($query, $id) {
                return $query->orWhere('users.id', '=', $id);
            })
            ->when($name, function ($query, $name) {
                return $query->orWhere('users.name', 'LIKE', "%{$name}%");
            })
            ->when($rule, function ($query, $rule) {
                return $query->orWhereHas('userRules.rule', function ($query) use ($rule) {
                    $query->where('rules.id', 'LIKE', "%{$rule}%");
                });
            })
            ->paginate(2); // Adjust the number to the desired items per page

        $data->getCollection()->transform(function ($user) {
            // Format the created_at and birthday attributes
            $user->formatted_created_at = date('d/m/Y', strtotime($user->created_at));
            $user->formatted_birthday = date('d/m/Y', strtotime($user->birthday));

            return $user;
        });

        $rules = Rule::all();

        // Trả về view với dữ liệu
        return view('managers.search', compact('data', 'rules'));
    }


    public function StoreBuild(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'date' => 'required|date|after:today',
            'service' => 'required|numeric',
        ], [
            'name.required' => 'Không được bỏ trống.',
            'phone.required' => 'Không được bỏ trống.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'date.required' => 'Không được bỏ trống.',
            'date.date' => 'Ngày phải là một ngày hợp lệ.',
            'date.after' => 'Ngày phải ở trong tương lai.',
            'service.required' => 'Không được bỏ trống.',
            'service.numeric' => 'Dịch vụ phải là số.',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        if ($user->save()) {
            UserRule::create([
                'user_id' => $user->id,
                'rule_id' => 4,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
            Schedule::create([
                'date' => $request->input('date'),
                'service_id' => $request->input('service'),
                'doctor_id' => 4,
                'customer_id' => $user->id,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
            return back()->with('success', 'Bạn đã đăng ký thành công.');
        } else {
            return back()->with('fail', 'Đã xảy ra lỗi, vui lòng thử lại.');

        }
    }

    public function schedulenew()
    {
        $status = 0;
        // Fetch users with schedules having status 0
        $users = User::whereHas('schedulesAsCustomer', function ($query) {
            $query->where('status', '=', 0);
        })->with(['schedulesAsCustomer' => function ($query) {
            $query->where('status', '=', 0);
        }])->paginate(10);
        $statusCounts = Schedule::select('status', \DB::raw('COUNT(*) as status_count'))
            ->groupBy('status')
            ->get();
        return view('employees.booknew', compact('users', 'status', 'statusCounts'));
    }

    public function schedulecf()
    {
        $status = 1;
        // Fetcuh users with schedules having the specified status
        $users = User::whereHas('schedulesAsCustomer', function ($query) use ($status) {
            $query->where('status', '=', 1);
        })->with(['schedulesAsCustomer' => function ($query) use ($status) {
            $query->where('status', '=', 1);
        }])->paginate(10);
        $statusCounts = Schedule::select('status', \DB::raw('COUNT(*) as status_count'))
            ->groupBy('status')
            ->get();
        $service = Service::all();
        return view('employees.confirmedbook', compact('users', 'status', 'statusCounts', 'service'));
    }

    public function schedulecancel(Request $request)
    {
        $status = 2;

        // Fetcuh users with schedules having the specified status
        $users = User::whereHas('schedulesAsCustomer', function ($query) use ($status) {
            $query->where('status', '=', $status);
        })->with(['schedulesAsCustomer' => function ($query) use ($status) {
            $query->where('status', '=', $status);
        }])->get();

        $statusCounts = Schedule::select('status', \DB::raw('COUNT(*) as status_count'))
            ->groupBy('status')
            ->get();
        return view('employees.cancelbook', compact('users', 'status', 'statusCounts'));
    }

    public function customer(Request $request)
    {
        // Retrieve query parameters from the request
        $customerId = $request->input('customer_id');
        $serviceName = $request->input('service_name');
        $serviceId = $request->input('service_id');
        $serviceCost = $request->input('service_cost');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Build the query
        $query = DB::table('schedules')
            ->join('users', 'users.id', '=', 'schedules.customer_id')
            ->join('services', 'services.id', '=', 'schedules.service_id')
            ->select('users.id as customer_id', 'services.id as service_id', 'services.name', 'services.cost', 'schedules.date');

        // Apply conditions if provided
        if ($customerId) {
            $query->where('users.id', $customerId);
        }

        if ($serviceName) {
            $query->where('services.name', $serviceName);
        }
        if ($serviceId) {
            $query->where('services.name', $serviceId);
        }

        if ($serviceCost) {
            $query->where('services.cost', $serviceCost);
        }

        if ($startDate && $endDate) {
            $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d');
            $query->where(function ($dateQuery) use ($startDate, $endDate) {
                $dateQuery->where('schedules.date', '<=', $endDate)
                    ->where('schedules.date', '>=', $startDate);
            });
        }

        // Get the results
        $results = $query->paginate(5);;

        $services = Service::all();

        return view('managers.customer_statis', compact('results', 'services'));
    }

    public function exportCustomer(Request $request)
    {
        // Retrieve query parameters from the request
        $customerId = $request->input('customer_id');
        $serviceName = $request->input('service_name');
        $serviceId = $request->input('service_id');
        $serviceCost = $request->input('service_cost');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Build the query
        $query = DB::table('schedules')
            ->join('users', 'users.id', '=', 'schedules.customer_id')
            ->join('services', 'services.id', '=', 'schedules.service_id')
            ->select('users.id as customer_id', 'services.id as service_id', 'services.name', 'services.cost', 'schedules.date');

        // Apply conditions if provided
        if ($customerId) {
            $query->where('users.id', $customerId);
        }

        if ($serviceName) {
            $query->where('services.name', $serviceName);
        }
        if ($serviceId) {
            $query->where('services.name', $serviceId);
        }

        if ($serviceCost) {
            $query->where('services.cost', $serviceCost);
        }

        if ($startDate && $endDate) {
            $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d');
            $query->where(function ($dateQuery) use ($startDate, $endDate) {
                $dateQuery->where('schedules.date', '<=', $endDate)
                    ->where('schedules.date', '>=', $startDate);
            });
        }

        // Get the results
        $results = $query->get();

        return view('managers.export_customer', compact('results'));
    }

    public function exportWord(Request $request)
    {
        $results = json_decode($request->input('results'), true);

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Add title
        $section->addText(
            'Mẫu thống kê khách hàng',
            ['name' => 'Arial', 'size' => 16, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]
        );

        // Add table
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80]);

        // Add header row
        $table->addRow();
        $table->addCell(2000)->addText('Mã KH', ['bold' => true]);
        $table->addCell(2000)->addText('Mã dịch vụ', ['bold' => true]);
        $table->addCell(4000)->addText('Tên dịch vụ', ['bold' => true]);
        $table->addCell(2000)->addText('Giá dịch vụ', ['bold' => true]);
        $table->addCell(2000)->addText('Ngày khám', ['bold' => true]);

        // Add data rows
        foreach ($results as $result) {
            $table->addRow();
            $table->addCell(2000)->addText('KH' . $result['customer_id']);
            $table->addCell(2000)->addText('DV' . $result['service_id']);
            $table->addCell(4000)->addText($result['name']);
            $table->addCell(2000)->addText($result['cost'] . ' VND');
            $table->addCell(2000)->addText($result['date']);
        }

        // Save file
        $fileName = 'customer_statistics.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function pet(Request $request)
    {
        // Retrieve query parameters from the request
        $pet_id = $request->input('pet_id');
        $species = $request->input('species');
        $name = $request->input('name');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $sex = $request->input('sex');

        // Build the query
        $query = DB::table('users')
            ->join('schedules', 'users.id', '=', 'schedules.customer_id')
            ->join('pets', 'users.id', '=', 'pets.customer_id')
            ->select('pets.id as pet_id', 'pets.species', 'pets.name', 'pets.sex', 'schedules.date');
        // Apply conditions if provided
        if ($pet_id) {
            $query->where('pets.id', $pet_id);
        }

        if ($species) {
            $query->where('pets.species', $species);
        }
        if ($name) {
            $query->where('pets.name', $name);
        }
        if ($sex) {
            $query->where('pets.sex', $sex);
        }

        if ($startDate && $endDate) {
            $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d');
            $query->where(function ($dateQuery) use ($startDate, $endDate) {
                $dateQuery->where('schedules.date', '<=', $endDate)
                    ->where('schedules.date', '>=', $startDate);
            });
        }
        // Get the results
        $results = $query->paginate(5);

        return view('managers.pet_stats', compact('results'));
    }

    public function exportPet(Request $request)
    {
        // Retrieve query parameters from the request
        $pet_id = $request->input('pet_id');
        $species = $request->input('species');
        $name = $request->input('name');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $sex = $request->input('sex');

        // Build the query
        $query = DB::table('users')
            ->join('schedules', 'users.id', '=', 'schedules.customer_id')
            ->join('pets', 'users.id', '=', 'pets.customer_id')
            ->select('pets.id as pet_id', 'pets.species', 'pets.name', 'pets.sex', 'schedules.date');
        // Apply conditions if provided
        if ($pet_id) {
            $query->where('pets.id', $pet_id);
        }

        if ($species) {
            $query->where('pets.species', $species);
        }
        if ($name) {
            $query->where('pets.name', $name);
        }
        if ($sex) {
            $query->where('pets.sex', $sex);
        }

        if ($startDate && $endDate) {
            $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d');
            $query->where(function ($dateQuery) use ($startDate, $endDate) {
                $dateQuery->where('schedules.date', '<=', $endDate)
                    ->where('schedules.date', '>=', $startDate);
            });
        }

        // Get the results
        $results = $query->paginate(5);

        return view('managers.export_pet', compact('results'));
    }

    public function exportPetWord(Request $request)
    {
        // Lấy dữ liệu từ request và giải mã JSON thành mảng
        $results = json_decode($request->input('results'), true);
        // Tạo đối tượng PhpWord
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Thêm tiêu đề vào section
        $section->addText(
            'Mẫu thống kê thú cưng',
            ['name' => 'Arial', 'size' => 16, 'bold' => true, 'alignment' => 'center']
        );

        // Thêm bảng vào section
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '999999', 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('Mã', ['bold' => true]);
        $table->addCell(2000)->addText('Tên', ['bold' => true]);
        $table->addCell(2000)->addText('Giống loài', ['bold' => true]);
        $table->addCell(2000)->addText('Tình trạng', ['bold' => true]);
        $table->addCell(2000)->addText('Giới tính', ['bold' => true]);
        $table->addCell(2000)->addText('Ngày chữa bệnh', ['bold' => true]);

        // Thêm dữ liệu từ $results vào bảng
        foreach ($results as $result) {
            // Thêm một hàng mới vào bảng
            $table->addRow();

        }

        // Lưu file và trả về response cho người dùng tải về
        // Tên file để lưu
        $fileName = 'pet_statistics.docx';

        // Tạo tên tệp tạm thời và lưu tệp Word
        $tempFilePath = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFilePath, 'Word2007');

        // Trả về response để tải xuống và xóa file tạm thời sau khi gửi
        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }

    public function medicine(Request $request)
    {
        // Retrieve query parameters from the request
        $id = $request->input('id');
        $status = $request->input('status');
        $name = $request->input('name');
        $cost = $request->input('cost');
        $manufacture_date = $request->input('manufacture_date');
        $expiry_date = $request->input('expiry_date');
        $quantity = $request->input('quantity');
        $ngayNhap = $request->input('ngayNhap');

        // Build the query
        $query = DB::table('medicines')->select("id", "name", "quantity", "status", "cost", "manufacture_date", "expiry_date", "quantity", "created_at");
        // Apply conditions if provided
        if (!is_null($id)) {
            $query->where('medicines.id', $id);
        }
        if (!is_null($status)) {
            $query->where('medicines.status', $status);
        }
        if (!is_null($name)) {
            $query->where('medicines.name', 'like', '%' . $name . '%');
        }
        if (!is_null($cost)) {
            $query->where('medicines.cost', $cost);
        }
        if (!is_null($manufacture_date)) {
            $query->where('medicines.manufacture_date', $manufacture_date);
        }
        if (!is_null($expiry_date)) {
            $query->where('medicines.expiry_date', $expiry_date);
        }
        if (!is_null($quantity)) {
            $query->where('medicines.quantity', $quantity);
        }
        if (!is_null($ngayNhap)) {
            $query->where('medicines.created_by', $ngayNhap);
        }

        // Get the results with pagination
        $results = $query->paginate(5);

        // Return the view with results
        return view('managers.medicine_stats', compact('results'));
    }

    public function exportMedicine(Request $request)
    {
        // Retrieve query parameters from the request
        $id = $request->input('id');
        $status = $request->input('status');
        $name = $request->input('name');
        $cost = $request->input('cost');
        $manufacture_date = $request->input('manufacture_date');
        $expiry_date = $request->input('expiry_date');
        $quantity = $request->input('quantity');
        $ngayNhap = $request->input('ngayNhap');

        // Build the query
        $query = DB::table('medicines')->select("id", "name", "quantity", "status", "cost", "manufacture_date", "expiry_date", "quantity", "created_at");
        // Apply conditions if provided
        if (!is_null($id)) {
            $query->where('medicines.id', $id);
        }
        if (!is_null($status)) {
            $query->where('medicines.status', $status);
        }
        if (!is_null($name)) {
            $query->where('medicines.name', 'like', '%' . $name . '%');
        }
        if (!is_null($cost)) {
            $query->where('medicines.cost', $cost);
        }
        if (!is_null($manufacture_date)) {
            $query->where('medicines.manufacture_date', $manufacture_date);
        }
        if (!is_null($expiry_date)) {
            $query->where('medicines.expiry_date', $expiry_date);
        }
        if (!is_null($quantity)) {
            $query->where('medicines.quantity', $quantity);
        }
        if (!is_null($ngayNhap)) {
            $query->where('medicines.created_by', $ngayNhap);
        }

        // Get the results with pagination
        $results = $query->paginate(5);

        // Return the view with results
        return view('managers.export_medicine', compact('results'));
    }

    public function exportMedicineWord(Request $request, Medicine $results)
    {
        $results = json_decode($request->input('results'), true);

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $table = $section->addTable();
        $table->addRow();
        $table->addCell()->addText('Mã');
        $table->addCell()->addText('Tên');
        $table->addCell()->addText('SL');
        $table->addCell()->addText('T.Thái');
        $table->addCell()->addText('Giá');
        $table->addCell()->addText('Ngày sản xuất');
        $table->addCell()->addText('Hạn sử dụng');
        $table->addCell()->addText('Ngày nhập');

        foreach ($results['data'] as $result) {
            $table->addRow();
            $table->addCell()->addText($result['id']);
            $table->addCell()->addText($result['name']);
            $table->addCell()->addText($result['quantity']);
            $table->addCell()->addText($result['status'] == 0 ? 'Còn' : 'Hết');
            $table->addCell()->addText($result['cost']);
            $table->addCell()->addText($result['manufacture_date']);
            $table->addCell()->addText($result['expiry_date']);
            $table->addCell()->addText(date('d/m/Y', strtotime($result['created_at'])));
        }

        $fileName = 'medicine.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function employee(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $roleId = $request->input('role_id');
        $employeeName = $request->input('employee_name');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $sex = $request->input('sex');

        $results = User::with('userRules.rule')
            ->whereHas('userRules.rule', function ($query) {
                $query->whereIn('id', [1, 2, 3]);
            });

        if ($employeeId) {
            $results->where('id', $employeeId);
        }
        if ($roleId) {
            $results->whereHas('userRules.rule', function ($query) use ($roleId) {
                $query->where('id', $roleId);
            });
        }
        if ($employeeName) {
            $results->where('name', 'like', '%' . $employeeName . '%');
        }
        if ($date) {
            $results->whereDate('created_at', $date);
        }
        if ($phone) {
            $results->where('phone', 'like', '%' . $phone . '%');
        }
        if ($sex) {
            $results->where('sex', 'like', '%' . $sex . '%');
        }

        $results = $results->get();

        return view('managers.employee_stats', compact('results'));
    }


    public function exportEmployee(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $roleId = $request->input('role_id');
        $employeeName = $request->input('employee_name');
        $date = $request->input('date');
        $phone = $request->input('phone');
        $sex = $request->input('sex');

        $results = User::with('userRules.rule')
            ->whereHas('userRules.rule', function ($query) {
                $query->whereIn('id', [1, 2, 3]);
            });

        if ($employeeId) {
            $results->where('id', $employeeId);
        }
        if ($roleId) {
            $results->whereHas('userRules.rule', function ($query) use ($roleId) {
                $query->where('id', $roleId);
            });
        }
        if ($employeeName) {
            $results->where('name', 'like', '%' . $employeeName . '%');
        }
        if ($date) {
            $results->whereDate('created_at', $date);
        }
        if ($phone) {
            $results->where('phone', 'like', '%' . $phone . '%');
        }
        if ($sex) {
            $results->where('sex', 'like', '%' . $sex . '%');
        }

        $results = $results->get();

        return view('managers.export_infor', compact('results'));
    }

    public function exportEmployeeWord(Request $request)
    {
        $results = json_decode($request->input('results'));

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText(
            'Mẫu thông kê thông tin',
            ['name' => 'Arial', 'size' => 16, 'bold' => true],
            ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]
        );

        $table = $section->addTable();

        // Add table headers
        $table->addRow();
        $table->addCell()->addText('Mã');
        $table->addCell()->addText('Tên');
        $table->addCell()->addText('Giới tính');
        $table->addCell()->addText('Chức vụ');
        $table->addCell()->addText('Ngày sinh');
        $table->addCell()->addText('SĐT');
        $table->addCell()->addText('Email');

        // Add data rows
        foreach ($results as $result) {
            $table->addRow();
            $table->addCell()->addText($result->id);
            $table->addCell()->addText($result->name);
            $table->addCell()->addText($result->sex == 0 ? 'Nam' : 'Nữ');
            $table->addCell()->addText('Nhân viên');
            $table->addCell()->addText($result->birthday);
            $table->addCell()->addText($result->phone != null ? $result->phone : 'null');
            $table->addCell()->addText($result->email);
        }

        $fileName = 'employee_stats.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
