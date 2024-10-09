<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sổ khám bệnh</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #9adafe;
            padding: 15px;
            height: 100vh;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h6, .sidebar p {
            text-align: center;
            font-size: 22px;
        }

        .sidebar .divider {
            border-top: 1px solid black;
            margin: 10px 0;
        }

        .sidebar .btn {
            width: 100%;
            height: 60px;
            color: black;
            border: none;
            margin-top: 20px;
            background-color: #DDDDDD;
        }

        .sidebar .btn:hover {
            background-color: #DDDDDD;
        }

        .topbar {
            background-color: #f8f9fa;
            padding: 22px 12px 12px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            right: 0;
            left: 200px;
            height: 65px;
            z-index: 1000;
        }

        .main-content {
            margin-left: 200px;
            padding: 80px 20px 20px 20px;
        }

        .form-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 30%;
        }

        .form-left, .form-right {
            width: 48%;
        }

        .form-left .form-group input, .form-left .form-group select,
        .form-right .form-group input, .form-right .form-group select {
            width: 70%;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .btn-group button {
            width: 100px;
            height: 50px;
            background-color: #D9D9D9;
            color: black;
            border: none;
            margin: 30px 100px 0 100px;
            padding: 2.5px 5px;
        }

        .btn-group button:hover {
            transition: background-color 0.3s;
            background-color: #9ADAFE;
            color: black;
        }

        .btn-group .xoa-btn:hover {
            background-color: red;
        }

        .section-divider {
            border-top: 1px solid black;
            margin: 40px 0;
        }

        .table th, .table td {
            text-align: center;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 5px;
        }

        .modal-content h5 {
            text-align: start;
            margin-bottom: 20px;
        }

        .modal-content p {
            text-align: left;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding-top: 20px;
        }

        .modal-footer .btn {
            width: 100px;
            margin-left: 10px;
        }

        .modal-footer .btn-secondary {
            background-color: #D9D9D9;
            border: 1px solid #dee2e6;
            color: black;
        }

        .modal-footer .btn-primary {
            background-color: #D9D9D9;
            border: none;
            color: black;
        }

        .modal-footer .btn:hover {
            background-color: #007bff;
            color: black;
        }

        /* Success modal styles */
        .success-modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 5px;
            text-align: center;
        }

        .success-modal-content h5 {
            margin-bottom: 20px;
        }

        .success-modal-content button {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .yellow-background {
            background-color: #D9D9D9;
        }
        /*.success-modal-content button:hover {*/
        /*    background-color: #D9D9D9;*/
        /*}*/
    </style>
</head>
<body>
<div class="sidebar">
    <div class="text-center mb-4">
        <h6><i class="fas fa-user-md"></i>QUẢN LÝ</h6>
    </div>
    <div class="divider"></div>
    <button class="btn"><i class="fas fa-book-medical"></i> Quản lý tài khoản</button>
</div>
<div class="topbar">
    <div class="user-info">
        <img src="https://via.placeholder.com/30" class="rounded-circle" alt="User">
        <span>Quốc Huy</span>
    </div>
</div>
<div class="main-content">
    <form class="form-section mt-3 d-flex flex-column">
        <div class="d-flex flex-row  justify-content-between gap-3">
            <div class="form-left">
                <div class="form-group">
                    <label for="doctorId">Tên nhân viên:</label>
                    <input type="text" class="form-control" id="doctorId" name="employee_name"
                           value="{{ request()->input('employee_name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ request()->input('email') }}">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="nam"
                               value="0" {{ request()->input('sex')==0 ? "checked":  "" }}>
                        <label class="form-check-label" for="male">Nam</label>
                    </div>
                    <div class="form-check form-check-inline p-2">
                        <input class="form-check-input" type="radio" name="sex" id="nu"
                               value="1" {{ request()->input('sex')==1 ? "checked":  "" }}> <label
                            class="form-check-label" for="female">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-right">
                <div class="form-group">
                    <label for="role">Chức vụ:</label>
                    <select id="chucVu" class="form-control" name="role_id">
                        <option value="" selected>Chọn chức vụ...</option>
                        <option value="1" {{ request()->input('role_id')==1? "checked":  "" }}>Bác sĩ</option>
                        <option value="2" {{ request()->input('role_id')==2? "checked":  "" }}>Nhân viên</option>
                        <option value="3" {{ request()->input('role_id')==3? "checked":  "" }}>Quản lý</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="issueDate">Ngày cấp:</label>
                    <input type="date" class="form-control" id="issueDate" name="date"
                           value="{{ request()->input('date') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="{{ request()->input('phone') }}">
                </div>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn tao-so-btn " onclick="showConfirmation('Tạo sổ')">Tạo sổ</button>
            <button type="button" class="btn xoa-btn" onclick="showConfirmation('Xóa')"> Xóa</button>
            <button type="button" class="btn cap-nhat-btn" onclick="showConfirmation('Cập nhật')"> Cập nhật</button>
            <button type="submit" class="btn"></i> Tìm kiếm</button>
        </div>
    </form>
    <div class="section-divider"></div>
    <table class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th scope="col" style="background-color: #9adafe ">Mã</th>
            <th scope="col " style="background-color: #9adafe ">Tên</th>
            <th scope="col" style="background-color: #9adafe ">Giới tính</th>
            <th scope="col" style="background-color: #9adafe ">Chức vụ</th>
            <th scope="col" style="background-color: #9adafe ">Ngày sinh</th>
            <th scope="col" style="background-color: #9adafe ">SĐT</th>
            <th scope="col" style="background-color: #9adafe ">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr class="clickable-row changeColor" data-id="{{ $result->id }}" onclick="changeColor(event)">
                <td>{{ $result->id }}</td>
                <td>{{ $result->name }}</td>
                <td>{{ $result->sex == 0 ? 'Nam' : 'Nữ' }}</td>
                <td>
                    @if($result->userRules->isNotEmpty())
                        {{$result->userRules[0]->rule->id ==1? "Nhân viên" : ""}}
                        {{$result->userRules[0]->rule->id ==2? "Bác sĩ" : ""}}
                        {{$result->userRules[0]->rule->id ==3? "Quản lý" : ""}}
                    @endif
                </td>
                <td>{{ $result->birthday }}</td>
                <td>{{ $result->phone != null ? $result->phone : 'null' }}</td>
                <td>{{ $result->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($results->lastPage() >1)
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- Nút Previous -->
                    @if ($results->previousPageUrl())
                        <li class="page-item"><a class="page-link" href="{{ $results->previousPageUrl() }}">Previous</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @endif

                    <!-- Danh sách các trang -->
                    @for ($i = 1; $i <= $results->lastPage(); $i++)
                        <li class="page-item {{ $results->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Nút Next -->
                    @if ($results->nextPageUrl())
                        <li class="page-item"><a class="page-link"
                                                 href="{{ $results->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h5 style="align-items: start">Xác nhận <span id="actionTypeText"></span> tài khoản</h5>
        <p>Bạn có muốn <span id="actionType"></span> tài khoản không?</p>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Hủy</button>
            <button type="button" class="btn btn-primary" onclick="confirmAction()">Xác nhận</button>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="modal">
    <div class="success-modal-content">
        <h5>Thông báo</h5>
        <p id="successMessage">Thao tác thành công!</p>
        <button onclick="closeSuccessModal()">Xong</button>
    </div>
</div>

<!-- JavaScript -->
<script>
    function changeColor(event) {
        // Get the current clicked row
        var row = event.currentTarget;

        // Remove the yellow background from all rows
        var rows = document.querySelectorAll('tr.changeColor');
        rows.forEach(function(row) {
            row.classList.remove('yellow-background');
        });

        // Add the yellow background to the clicked row
        row.classList.add('yellow-background');
    }
    let currentAction = '';

    function showConfirmation(action) {
        currentAction = action;
        const actionType = action.toLowerCase();
        document.getElementById('actionType').innerText = actionType;
        document.getElementById('actionTypeText').innerText = actionType;
        document.getElementById('confirmationModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    function confirmAction() {
        closeModal();
        // Display success message modal
        document.getElementById('successMessage').innerText = `${currentAction} tài khoản thành công!`;
        document.getElementById('successModal').style.display = 'block';
    }

    function closeSuccessModal() {
        document.getElementById('successModal').style.display = 'none';
    }
</script>
</body>
</html>
