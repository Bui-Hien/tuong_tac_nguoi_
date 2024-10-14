<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    // Hiển thị danh sách thuốc
    public function index()
    {
        $medicines = Medicine::all();
        return view('employees.medicines.index', compact('medicines'));
    }

    // Hiển thị form tạo mới thuốc
    public function create()
    {
        return view('employees.medicines.create');
    }

    // Lưu thuốc mới
    public function store(Request $request)
    {
        // Validate each field
        $this->validateName($request);
        $this->validatePrice($request);
        $this->validateType($request);
        $this->validateStatus($request);
        $this->validateManufactureDate($request);
        $this->validateExpiryDate($request);

        // Cung cấp giá trị mặc định cho quantity
        $data = $request->all();
        $data['quantity'] = $data['quantity'] ?? 0; // hoặc bất kỳ giá trị nào bạn muốn mặc định

        // Create a new medicine record
        Medicine::create($data);

        return redirect()->route('medicines.index')->with('success', 'Thêm thuốc thành công!');
    }

    // Hiển thị form chỉnh sửa thuốc
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('employees.medicines.edit', compact('medicine'));
    }

    // Cập nhật thuốc
    public function update(Request $request, $id)
    {
        // Validate each field
        $this->validateName($request);
        $this->validatePrice($request);
        $this->validateType($request);
        $this->validateStatus($request);
        $this->validateManufactureDate($request);
        $this->validateExpiryDate($request);

        // Cập nhật bản ghi thuốc
        $medicine = Medicine::findOrFail($id);
        $data = $request->all();
        $data['quantity'] = $data['quantity'] ?? 0;

        $medicine->update($data);

        return redirect()->route('employees.medicines.index')->with('success', 'Cập nhật thuốc thành công!');
    }

    // Xóa thuốc
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('employees.medicines.index')->with('success', 'Xóa thuốc thành công!');
    }

    // Các phương thức validate cho từng trường
    private function validateName(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) {
                    $this->checkSpecialCharacters($value, $fail, 'Tên thuốc không được chứa ký tự đặc biệt, vui lòng nhập lại.');
                },
            ],
        ], [
            'name.required' => 'Tên thuốc không được để trống.',
            'name.max' => 'Tên thuốc không được vượt quá 255 ký tự.',
        ]);
      
    }
//     private function validateName(Request $request) // 1
// {
//     $request->validate([ // 2
//         'name' => [
//             'required',  // 3: Kiểm tra 'name' bắt buộc
//             'max:255',   // 4: Kiểm tra độ dài tối đa là 255 ký tự
//             'regex:/^[a-zA-Z\s]+$/', // 5: Kiểm tra chỉ có chữ cái và khoảng trắng
//         ],
//     ], [
//         'name.required' => 'Tên thuốc không được để trống.', // 6
//         'name.max' => 'Tên thuốc không được vượt quá 255 ký tự.', // 7
//         'name.regex' => 'Trường này không được chứa ký tự đặc biệt, vui lòng nhập lại.', // 8
//     ]); 
// } // 9


    private function validatePrice(Request $request)
    {
        $request->validate([
            'cost' => 'required|numeric|min:1000|max:99999999',
        ], [
            'cost.required' => 'Giá tiền không được để trống.',
            'cost.numeric' => 'Giá phải là số.',
            'cost.min' => 'Giá phải lớn hơn hoặc bằng 1000.',
            'cost.max' => 'Giá không được vượt quá giới hạn.',
        ]);
        return true;
    }

    private function validateType(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ], [
            'type.required' => 'Loại thuốc không được để trống.',
        ]);
        return true;
    }

    private function validateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|integer|in:0,1', // Ensure the status is either 0 or 1
        ], [
            'status.required' => 'Trạng thái không được để trống.',
        ]);
        return true;
    }

    private function validateManufactureDate(Request $request)
    {
        $request->validate([
            'manufacture_date' => 'required|date',
        ], [
            'manufacture_date.required' => 'Ngày sản xuất không được để trống.',
            'manufacture_date.date' => 'Ngày sản xuất không đúng định dạng.',
        ]);
        return true;
    }

    private function validateExpiryDate(Request $request)
    {
        $request->validate([
            'expiry_date' => 'required|date|after:manufacture_date',
        ], [
            'expiry_date.required' => 'Hạn sử dụng không được để trống.',
            'expiry_date.date' => 'Hạn sử dụng không đúng định dạng.',
            'expiry_date.after' => 'Hạn sử dụng thuốc phải nhập sau ngày sản xuất.',
        ]);
        return true;
    }

    // Phương thức kiểm tra ký tự đặc biệt
    private function checkSpecialCharacters($string, $fail, $message = '')
    {
        if (preg_match('/[^a-zA-Z0-9\s]/', $string)) {
            $fail($message ?: 'Chuỗi không được chứa ký tự đặc biệt, vui lòng nhập lại.');
        }
    }
}
