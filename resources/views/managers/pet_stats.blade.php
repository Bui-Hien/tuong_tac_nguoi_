<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THỐNG KÊ THU CUNG</title>
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
                        <a class="nav-link" href="{{ route('managers.employee') }}">
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
                        <a class="nav-link" href="{{ route('managers.customer') }}">
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
                        <a class="nav-link active" href="{{ route('managers.pet') }}">
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
                <form class="row g-3 mb-3">
                    <div class="col-md-2">
                        <label for="maThuoc" class="form-label">Mã thú cưng</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="maThuoc" name="pet_id"
                               value="{{ request()->input('pet_id') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Tên</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="maThuoc" name="name"
                               value="{{ request()->input('name') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Giống loài</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="maThuoc" name="species"
                               value="{{ request()->input('species') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Tình trạng</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="maThuoc" name="tinh_trang"
                               value="Khỏe mạnh" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Từ ngày</label>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="start_date" id="tuNgay"
                               value="{{ request()->input('start_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Đến ngày</label>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="end_date" id="ngayDi"
                               value="{{ request()->input('end_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="Trangthai" class="form-label">Giới tính</label>
                    </div>
                    <div class="col-md-4">
                        <input class="form-check-input" type="radio" name="sex" value="0" id="flexRadioCheckedDisabled"
                            {{ request()->input('sex') ==0 ? "checked" : ""}}>
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            Đực
                        </label>
                        <input class="form-check-input" type="radio" value="1" name="sex" id="flexRadioCheckedDisabled"
                            {{ request()->input('sex') ==1 ? "checked" : ""}}>
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            Cái
                        </label>
                    </div>

                    <div class="row mb-3 justify-content-center ">
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
                        <th scope="col" style="background-color: #9adafe ">Tên</th>
                        <th scope="col" style="background-color: #9adafe ">Giống loài</th>
                        <th scope="col" style="background-color: #9adafe ">Tình trạng</th>
                        <th scope="col" style="background-color: #9adafe ">Giới tính</th>
                        <th scope="col" style="background-color: #9adafe ">Ngày chữa bệnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->pet_id}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->species}}</td>
                            <td>Khỏe mạnh</td>
                            <td>{{$result->sex ==0 ? "Đực":"Cái"}}</td>
                            <td>{{$result->date}}</td>
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
        </div>
    </div>
</div>
<script>
    function exportResults() {
        var pet_id = '{{ request()->input('pet_id') }}';
        var name = '{{ request()->input('name') }}';
        var species = '{{ request()->input('species') }}';
        var startDate = '{{ request()->input('start_date') }}';
        var endDate = '{{ request()->input('end_date') }}';

        var queryString = `pet_id=${encodeURIComponent(pet_id)}&name=${encodeURIComponent(name)}&species=${encodeURIComponent(species)}&start_date=${encodeURIComponent(startDate)}&end_date=${encodeURIComponent(endDate)}`;

        // Redirect to the new URL with query string
        window.location.href = `http://localhost:8000/managers/export-pet?${queryString}`;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
