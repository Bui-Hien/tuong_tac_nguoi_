<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THỐNG KÊ NHAN VIEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
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
            text-transform: uppercase;z
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
                    <span> <i class="bi bi-person-circle"></i>BAC SI</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check"></i>
                            Thống kê nhân viên
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-calendar-plus"></i>
                            Thống kê thuốc thú Y
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check"></i>
                            Thống kê khách hàng
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check"></i>
                            Thống kê thú cưng
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 p-0 ">
            <div class="header d-flex justify-content-end ms-0 ps-0">
                <span class="fs-5">Nguyen The
                <img class="w-30 h-30" style="width: 40px" src="../../img/logo.jpg" alt=""></span>
            </div>
            <div class="p-4">
                <form class="mb-3">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="maNhanVien" class="form-label">Mã nhân viên</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="maNhanVien">
                        </div>
                        <div class="col-md-2">
                            <label for="chucVu" class="form-label">Chức vụ</label>
                        </div>
                        <div class="col-md-4">
                            <select id="chucVu" class="form-select">
                                <option selected>Chọn chức vụ...</option>
                                <option value="1">Bác sĩ</option>
                                <option value="2">Y tá</option>
                                <option value="3">Quản lý</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="tenNhanVien" class="form-label">Tên nhân viên</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="tenNhanVien">
                        </div>
                        <div class="col-md-2">
                            <label for="ngayCap" class="form-label">Ngày cấp</label>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" id="ngayCap">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-md-2">
                            <label for="soDienThoai" class="form-label">Số điện thoại</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="soDienThoai">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label">Giới tính</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gioiTinh" id="nam" value="Nam">
                                <label class="form-check-label" for="nam">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gioiTinh" id="nu" value="Nữ">
                                <label class="form-check-label" for="nu">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-auto">
                            <button type="button" class="btn btn-secondary custom-button">Tìm kiếm</button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-secondary custom-button">Xuất thông tin</button>
                        </div>
                    </div>
                </form>


                <table class="table table-bordered">
                    <thead class="table-light"  >
                    <tr >
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
                    <tr>
                        <td>BS01</td>
                        <td>Đẩu Thế</td>
                        <td>Nam</td>
                        <td>Bác sĩ</td>
                        <td>26/5/2024</td>
                        <td>09xxxxxxxx</td>
                        <td>bbb@gmail.com</td>
                    </tr>
                    <tr>
                        <td>NV01</td>
                        <td>Xuân Hiền</td>
                        <td>Nam</td>
                        <td>Bác sĩ</td>
                        <td>26/5/2024</td>
                        <td>09xxxxxxxx</td>
                        <td>ccc@gmail.com</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
