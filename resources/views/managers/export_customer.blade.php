<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetHaven Animal Hospital</title>
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
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .nav-link.active {
            background-color: #dddddd;
        }

        .sidebar .nav-link:hover {
            background-color: #dddddd;
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar mt-0">
            <div class="d-flex flex-column p-3 pt-0 ">
                <div class="mt-0">
                    <span> <i class="bi bi-person-circle"></i>QUẢN LÝ</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('managers.employee') }}">
                            <i class="bi bi-calendar-check"></i>
                            Thống kê nhân viên
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="{{ route('managers.medicine') }}">
                            <i class="bi bi-calendar-plus"></i>
                            Thống kê thuốc thú Y
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="{{ route('managers.customer') }}">
                            <i class="bi bi-calendar-check"></i>
                            Thống kê khách hàng
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="{{ route('managers.pet') }}">
                            <i class="bi bi-calendar-check"></i>
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
                <h3 class="text-center fw-2 p-4">Mẫu thống kê khách hàng</h3>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" style="background-color: #9adafe ">Mã KH</th>
                        <th scope="col " style="background-color: #9adafe ">Mã dịch vụ</th>
                        <th scope="col" style="background-color: #9adafe ">Tên dịch vụ</th>
                        <th scope="col" style="background-color: #9adafe ">Giá dịch vụ</th>
                        <th scope="col" style="background-color: #9adafe ">Ngày khám</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>KH{{$result->customer_id}}</td>
                            <td>DV{{$result->service_id}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->cost}} VND</td>
                            <td>{{$result->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <button class="btn btn-primary float-end mt-3" id="btnXuatThongTin"> Xuất thông tin</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal thông báo xuất thành công -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header justify-content-center position-relative">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="flex: 1;text-align: center;">
                    Thông báo</h5>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Xuất thông tin thành công.
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<form id="exportForm" action="{{ route('export.customer.word') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="results" id="resultsInput" value="{{ json_encode($results) }}">
</form>

<script>
    document.getElementById('btnXuatThongTin').addEventListener('click', function () {
        document.getElementById('exportForm').submit();
    });
</script>
<!--JS thông báo xuất thành công -->
<script>
    document.getElementById('btnXuatThongTin').addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
        });
        myModal.show();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
></script>
</body>
</html>
