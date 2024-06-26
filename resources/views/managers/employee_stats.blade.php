<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THỐNG KÊ NHAN VIEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #b8e5fe;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        .sidebar span {
            display: block;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .sidebar .bi {
            font-size: 25px;
            margin-right: 12px;
            vertical-align: middle;
        }

        .sidebar .nav-link {
            color: #000;
            font-size: 13px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease; /* Thêm hiệu ứng transition */
        }

        .sidebar .nav-link.active {
            background-color: #DDDDDD;
            color: #000;
        }

        .sidebar .nav-link:hover {
            background-color: #DDDDDD;
            color: #000;
        }

        .container-fluid {
            padding-left: 0;
        }

        .header {
            background-color: #f8f9fa;
            padding: 10px 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .username {
            font-weight: bold;
        }

        .p-4 {
            padding: 2rem !important;
        }

        .nav-tabs .nav-link {
            border: 1px solid #dee2e6;
            border-bottom-color: transparent;
        }

        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .table {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Ensure proper layout alignment */
        form .row {
            margin-left: 0;
            margin-right: 0;
        }

        form .form-check-inline {
            margin-left: 10px;
        }

        form .btn-secondary {
            margin-top: 10px;
        }

        form .text-center button {
            margin: 10px;
        }

        form .w-100 {
            width: 100%;
        }

        /* Custom button styling */
        .custom-button {
            width: 150px; /* Adjust button width as needed */
        }

        /* Add space between inline buttons */
        .row .col-auto:not(:last-child) {
            margin-right: 20px;
        }

        /* Button hover effect */
        .btn-secondary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar mt-0">
            <div class="d-flex flex-column p-3 pt-0">
                <div class="mt-0">
                    <span> <i class="bi bi-person-circle"></i>QUẢN LÝ</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="{{ route('managers.employee') }}">
                            <i class="p-1">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.64286 0.5C8.63058 0.5 9.42857 1.19824 9.42857 2.0625V3.625H16.5714V2.0625C16.5714 1.19824 17.3694 0.5 18.3571 0.5C19.3449 0.5 20.1429 1.19824 20.1429 2.0625V3.625H22.8214C24.3002 3.625 25.5 4.6748 25.5 5.96875V8.3125H0.5V5.96875C0.5 4.6748 1.69978 3.625 3.17857 3.625H5.85714V2.0625C5.85714 1.19824 6.65513 0.5 7.64286 0.5ZM0.5 9.875H25.5V23.1562C25.5 24.4502 24.3002 25.5 22.8214 25.5H3.17857C1.69978 25.5 0.5 24.4502 0.5 23.1562V9.875ZM4.07143 13.7812V15.3438C4.07143 15.7734 4.47321 16.125 4.96429 16.125H6.75C7.24107 16.125 7.64286 15.7734 7.64286 15.3438V13.7812C7.64286 13.3516 7.24107 13 6.75 13H4.96429C4.47321 13 4.07143 13.3516 4.07143 13.7812ZM11.2143 13.7812V15.3438C11.2143 15.7734 11.6161 16.125 12.1071 16.125H13.8929C14.3839 16.125 14.7857 15.7734 14.7857 15.3438V13.7812C14.7857 13.3516 14.3839 13 13.8929 13H12.1071C11.6161 13 11.2143 13.3516 11.2143 13.7812ZM19.25 13C18.7589 13 18.3571 13.3516 18.3571 13.7812V15.3438C18.3571 15.7734 18.7589 16.125 19.25 16.125H21.0357C21.5268 16.125 21.9286 15.7734 21.9286 15.3438V13.7812C21.9286 13.3516 21.5268 13 21.0357 13H19.25ZM4.07143 20.0312V21.5938C4.07143 22.0234 4.47321 22.375 4.96429 22.375H6.75C7.24107 22.375 7.64286 22.0234 7.64286 21.5938V20.0312C7.64286 19.6016 7.24107 19.25 6.75 19.25H4.96429C4.47321 19.25 4.07143 19.6016 4.07143 20.0312ZM12.1071 19.25C11.6161 19.25 11.2143 19.6016 11.2143 20.0312V21.5938C11.2143 22.0234 11.6161 22.375 12.1071 22.375H13.8929C14.3839 22.375 14.7857 22.0234 14.7857 21.5938V20.0312C14.7857 19.6016 14.3839 19.25 13.8929 19.25H12.1071ZM18.3571 20.0312V21.5938C18.3571 22.0234 18.7589 22.375 19.25 22.375H21.0357C21.5268 22.375 21.9286 22.0234 21.9286 21.5938V20.0312C21.9286 19.6016 21.5268 19.25 21.0357 19.25H19.25C18.7589 19.25 18.3571 19.6016 18.3571 20.0312Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Thống kê nhân viên
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="{{ route('managers.medicine') }}">
                            <i class="p-1">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.64286 0.5C8.63058 0.5 9.42857 1.19824 9.42857 2.0625V3.625H16.5714V2.0625C16.5714 1.19824 17.3694 0.5 18.3571 0.5C19.3449 0.5 20.1429 1.19824 20.1429 2.0625V3.625H22.8214C24.3002 3.625 25.5 4.6748 25.5 5.96875V8.3125H0.5V5.96875C0.5 4.6748 1.69978 3.625 3.17857 3.625H5.85714V2.0625C5.85714 1.19824 6.65513 0.5 7.64286 0.5ZM0.5 9.875H25.5V23.1562C25.5 24.4502 24.3002 25.5 22.8214 25.5H3.17857C1.69978 25.5 0.5 24.4502 0.5 23.1562V9.875ZM4.07143 13.7812V15.3438C4.07143 15.7734 4.47321 16.125 4.96429 16.125H6.75C7.24107 16.125 7.64286 15.7734 7.64286 15.3438V13.7812C7.64286 13.3516 7.24107 13 6.75 13H4.96429C4.47321 13 4.07143 13.3516 4.07143 13.7812ZM11.2143 13.7812V15.3438C11.2143 15.7734 11.6161 16.125 12.1071 16.125H13.8929C14.3839 16.125 14.7857 15.7734 14.7857 15.3438V13.7812C14.7857 13.3516 14.3839 13 13.8929 13H12.1071C11.6161 13 11.2143 13.3516 11.2143 13.7812ZM19.25 13C18.7589 13 18.3571 13.3516 18.3571 13.7812V15.3438C18.3571 15.7734 18.7589 16.125 19.25 16.125H21.0357C21.5268 16.125 21.9286 15.7734 21.9286 15.3438V13.7812C21.9286 13.3516 21.5268 13 21.0357 13H19.25ZM4.07143 20.0312V21.5938C4.07143 22.0234 4.47321 22.375 4.96429 22.375H6.75C7.24107 22.375 7.64286 22.0234 7.64286 21.5938V20.0312C7.64286 19.6016 7.24107 19.25 6.75 19.25H4.96429C4.47321 19.25 4.07143 19.6016 4.07143 20.0312ZM12.1071 19.25C11.6161 19.25 11.2143 19.6016 11.2143 20.0312V21.5938C11.2143 22.0234 11.6161 22.375 12.1071 22.375H13.8929C14.3839 22.375 14.7857 22.0234 14.7857 21.5938V20.0312C14.7857 19.6016 14.3839 19.25 13.8929 19.25H12.1071ZM18.3571 20.0312V21.5938C18.3571 22.0234 18.7589 22.375 19.25 22.375H21.0357C21.5268 22.375 21.9286 22.0234 21.9286 21.5938V20.0312C21.9286 19.6016 21.5268 19.25 21.0357 19.25H19.25C18.7589 19.25 18.3571 19.6016 18.3571 20.0312Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Thống kê thuốc thú Y
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="{{ route('managers.customer') }}">
                            <i class="p-1">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.64286 0.5C8.63058 0.5 9.42857 1.19824 9.42857 2.0625V3.625H16.5714V2.0625C16.5714 1.19824 17.3694 0.5 18.3571 0.5C19.3449 0.5 20.1429 1.19824 20.1429 2.0625V3.625H22.8214C24.3002 3.625 25.5 4.6748 25.5 5.96875V8.3125H0.5V5.96875C0.5 4.6748 1.69978 3.625 3.17857 3.625H5.85714V2.0625C5.85714 1.19824 6.65513 0.5 7.64286 0.5ZM0.5 9.875H25.5V23.1562C25.5 24.4502 24.3002 25.5 22.8214 25.5H3.17857C1.69978 25.5 0.5 24.4502 0.5 23.1562V9.875ZM4.07143 13.7812V15.3438C4.07143 15.7734 4.47321 16.125 4.96429 16.125H6.75C7.24107 16.125 7.64286 15.7734 7.64286 15.3438V13.7812C7.64286 13.3516 7.24107 13 6.75 13H4.96429C4.47321 13 4.07143 13.3516 4.07143 13.7812ZM11.2143 13.7812V15.3438C11.2143 15.7734 11.6161 16.125 12.1071 16.125H13.8929C14.3839 16.125 14.7857 15.7734 14.7857 15.3438V13.7812C14.7857 13.3516 14.3839 13 13.8929 13H12.1071C11.6161 13 11.2143 13.3516 11.2143 13.7812ZM19.25 13C18.7589 13 18.3571 13.3516 18.3571 13.7812V15.3438C18.3571 15.7734 18.7589 16.125 19.25 16.125H21.0357C21.5268 16.125 21.9286 15.7734 21.9286 15.3438V13.7812C21.9286 13.3516 21.5268 13 21.0357 13H19.25ZM4.07143 20.0312V21.5938C4.07143 22.0234 4.47321 22.375 4.96429 22.375H6.75C7.24107 22.375 7.64286 22.0234 7.64286 21.5938V20.0312C7.64286 19.6016 7.24107 19.25 6.75 19.25H4.96429C4.47321 19.25 4.07143 19.6016 4.07143 20.0312ZM12.1071 19.25C11.6161 19.25 11.2143 19.6016 11.2143 20.0312V21.5938C11.2143 22.0234 11.6161 22.375 12.1071 22.375H13.8929C14.3839 22.375 14.7857 22.0234 14.7857 21.5938V20.0312C14.7857 19.6016 14.3839 19.25 13.8929 19.25H12.1071ZM18.3571 20.0312V21.5938C18.3571 22.0234 18.7589 22.375 19.25 22.375H21.0357C21.5268 22.375 21.9286 22.0234 21.9286 21.5938V20.0312C21.9286 19.6016 21.5268 19.25 21.0357 19.25H19.25C18.7589 19.25 18.3571 19.6016 18.3571 20.0312Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Thống kê khách hàng
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="{{ route('managers.pet') }}">
                            <i class="p-1">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.64286 0.5C8.63058 0.5 9.42857 1.19824 9.42857 2.0625V3.625H16.5714V2.0625C16.5714 1.19824 17.3694 0.5 18.3571 0.5C19.3449 0.5 20.1429 1.19824 20.1429 2.0625V3.625H22.8214C24.3002 3.625 25.5 4.6748 25.5 5.96875V8.3125H0.5V5.96875C0.5 4.6748 1.69978 3.625 3.17857 3.625H5.85714V2.0625C5.85714 1.19824 6.65513 0.5 7.64286 0.5ZM0.5 9.875H25.5V23.1562C25.5 24.4502 24.3002 25.5 22.8214 25.5H3.17857C1.69978 25.5 0.5 24.4502 0.5 23.1562V9.875ZM4.07143 13.7812V15.3438C4.07143 15.7734 4.47321 16.125 4.96429 16.125H6.75C7.24107 16.125 7.64286 15.7734 7.64286 15.3438V13.7812C7.64286 13.3516 7.24107 13 6.75 13H4.96429C4.47321 13 4.07143 13.3516 4.07143 13.7812ZM11.2143 13.7812V15.3438C11.2143 15.7734 11.6161 16.125 12.1071 16.125H13.8929C14.3839 16.125 14.7857 15.7734 14.7857 15.3438V13.7812C14.7857 13.3516 14.3839 13 13.8929 13H12.1071C11.6161 13 11.2143 13.3516 11.2143 13.7812ZM19.25 13C18.7589 13 18.3571 13.3516 18.3571 13.7812V15.3438C18.3571 15.7734 18.7589 16.125 19.25 16.125H21.0357C21.5268 16.125 21.9286 15.7734 21.9286 15.3438V13.7812C21.9286 13.3516 21.5268 13 21.0357 13H19.25ZM4.07143 20.0312V21.5938C4.07143 22.0234 4.47321 22.375 4.96429 22.375H6.75C7.24107 22.375 7.64286 22.0234 7.64286 21.5938V20.0312C7.64286 19.6016 7.24107 19.25 6.75 19.25H4.96429C4.47321 19.25 4.07143 19.6016 4.07143 20.0312ZM12.1071 19.25C11.6161 19.25 11.2143 19.6016 11.2143 20.0312V21.5938C11.2143 22.0234 11.6161 22.375 12.1071 22.375H13.8929C14.3839 22.375 14.7857 22.0234 14.7857 21.5938V20.0312C14.7857 19.6016 14.3839 19.25 13.8929 19.25H12.1071ZM18.3571 20.0312V21.5938C18.3571 22.0234 18.7589 22.375 19.25 22.375H21.0357C21.5268 22.375 21.9286 22.0234 21.9286 21.5938V20.0312C21.9286 19.6016 21.5268 19.25 21.0357 19.25H19.25C18.7589 19.25 18.3571 19.6016 18.3571 20.0312Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Thống kê thú cưng
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-md-10 p-0 ">
            <div class="header d-flex justify-content-end ms-0 ps-0">
                 <span class="fs-4 text-uppercase">{{Session::get("name")}}
                <img class="w-30 h-30" style="width: 40px" src="../../img/logo.jpg" alt=""></span>
            </div>
            <div class="p-4">
                <form class="mb-3">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="maNhanVien" class="form-label">Mã nhân viên</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="maNhanVien" name="employee_id"
                                   value="{{ request()->input('employee_id') }}">

                        </div>
                        <div class="col-md-2">
                            <label for="chucVu" class="form-label">Chức vụ</label>
                        </div>
                        <div class="col-md-4">
                            <select id="chucVu" class="form-select" name="role_id">
                                <option value="" selected>Chọn chức vụ...</option>
                                <option value="1" {{ request()->input('role_id')==1? "checked":  "" }}>Bác sĩ</option>
                                <option value="2" {{ request()->input('role_id')==2? "checked":  "" }}>Y tá</option>
                                <option value="3" {{ request()->input('role_id')==3? "checked":  "" }}>Quản lý</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="tenNhanVien" class="form-label">Tên nhân viên</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="tenNhanVien" name="employee_name"
                                   value="{{ request()->input('employee_name') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="ngayCap" class="form-label">Ngày cấp</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" id="ngayCap" name="date"
                                   value="{{ request()->input('date') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ request()->input('email') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="soDienThoai" class="form-label">Số điện thoại</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="soDienThoai" name="phone"
                                   value="{{ request()->input('phone') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label">Giới tính</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="nam"
                                       value="0" {{ request()->input('sex')==0 ? "checked":  "" }}>
                                <label class="form-check-label" for="nam">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="nu"
                                       value="1" {{ request()->input('sex')==1 ? "checked":  "" }}>
                                <label class="form-check-label" for="nu">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-secondary custom-button">Tìm kiếm</button>
                        </div>
                        <div class="col-auto">
                            <a href="#" onclick="exportResults()" class="btn btn-secondary custom-button">Xuất thông
                                tin</a>
                        </div>
                    </div>
                </form>


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
                        <tr class="clickable-row" data-id="{{ $result->id }}">
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

            </div>
        </div>
    </div>
</div>
<script>
    function exportResults() {
        var employeeId = '{{ request()->input('employee_id') }}' || '';
        var roleId = '{{ request()->input('role_id') }}' || '';
        var employeeName = '{{ request()->input('employee_name') }}' || '';
        var date = '{{ request()->input('date') }}' || '';
        var phone = '{{ request()->input('phone') }}' || '';
        var sex = '{{ request()->input('phone') }}' || '';

        // Build the query string
        var queryString = `employee_id=${encodeURIComponent(employeeId)}&role_id=${encodeURIComponent(roleId)}&employee_name=${encodeURIComponent(employeeName)}&date=${encodeURIComponent(date)}&phone=${encodeURIComponent(phone)}&sex=${encodeURIComponent(sex)}`;

        // Redirect to the new URL with query string
        window.location.href = `/managers/export-employee?${queryString}`;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
