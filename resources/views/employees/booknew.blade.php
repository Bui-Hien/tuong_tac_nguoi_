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
            padding: 10px 20px;
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
        <div class="col-md-10">
            <div class="header d-flex justify-content-end">
                <span class="fs-4">Nguyen The
                <img class="w-30 h-30" style="width: 50px" src="../../img/logo.jpg" alt=""></span>
            </div>
            <div class="p-4">
                <h3 class="text-center mb-3">Sắp xếp lịch khám</h3>
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('employees.schedulenew') }}">Lịch
                            khám mới
                            ({{ $statusCounts->where('status', 0)->first()->status_count ?? 0 }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.schedulecf') }}">Đã xác nhận
                            ({{ $statusCounts->where('status', 1)->first()->status_count ?? 0 }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.schedulecancel') }}">Đã hủy
                            ({{ $statusCounts->where('status', 2)->first()->status_count ?? 0 }})</a>
                    </li>
                </ul>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Thời gian đặt</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{$user->schedulesAsCustomer[0]->date}}</td>
                            <td>
                                <form action="{{ route('cf-update-build', $user->schedulesAsCustomer[0]->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary btn-sm">Xác nhận</button>
                                </form>
                                <form id="cancelForm"
                                      action="{{ route('cancel-update-build', $user->schedulesAsCustomer[0]->id) }}"
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" id="cancelMessage" name="message" style="display: none"
                                           value="">
                                    <button class="btn btn-danger btn-sm">Hủy</button>
                                </form>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal xac nhan thanh cong -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Xác Nhận Đặt Lịch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có muốn xác nhận đặt lịch không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="confirmAppointmentButton">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal xác nhan huy -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Xác Nhận Từ Chối Lịch Hẹn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vui lòng chọn hoặc nhập lý do:
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="cancelReason" id="reason1" value="Lên lịch sai">
                    <label class="form-check-label" for="reason1">
                        Lên lịch sai
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancelReason" id="reason2" value="Không có thật">
                    <label class="form-check-label" for="reason2">
                        Không có thật
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancelReason" id="reason3"
                           value="Khách hàng hủy yêu cầu">
                    <label class="form-check-label" for="reason3">
                        Khách hàng hủy yêu cầu
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancelReason" id="reason4" value="Lý do khác">
                    <label class="form-check-label" for="reason4">
                        Lý do khác
                    </label>
                </div>
                <div id="otherReasonContainer" class="mt-2" style="display: none;">
                    <input type="text" class="form-control" id="otherReason" placeholder="Nhập lý do khác">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="confirmCancelButton">Xác nhận</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<!-- JS thanh cong -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tất cả các nút "Xác nhận"
        var confirmButtons = document.querySelectorAll('.btn-primary.btn-sm');

        // Thêm sự kiện click cho mỗi nút "Xác nhận"
        confirmButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {});
                confirmationModal.show();

                // Thêm sự kiện click cho nút "Xác nhận" trong modal
                var confirmAppointmentButton = document.getElementById('confirmAppointmentButton');
                confirmAppointmentButton.onclick = function () {
                    confirmationModal.hide();
                    // Thực hiện các hành động xác nhận khác tại đây, ví dụ như gửi yêu cầu đến server
                    console.log('Lịch khám đã được xác nhận!');
                }
            });
        });
    });
</script>
<!-- JS xac nhan huy -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tất cả các nút "Xác nhận"
        var confirmButtons = document.querySelectorAll('.btn-primary.btn-sm');

        // Thêm sự kiện click cho mỗi nút "Xác nhận"
        confirmButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {});
                confirmationModal.show();

                // Thêm sự kiện click cho nút "Xác nhận" trong modal
                var confirmAppointmentButton = document.getElementById('confirmAppointmentButton');
                confirmAppointmentButton.onclick = function () {
                    confirmationModal.hide();
                    // Thực hiện các hành động xác nhận khác tại đây, ví dụ như gửi yêu cầu đến server
                    console.log('Lịch khám đã được xác nhận!');
                }
            });
        });

        // Lấy tất cả các nút "Hủy"
        var cancelButtons = document.querySelectorAll('.btn-danger.btn-sm');

        // Thêm sự kiện click cho mỗi nút "Hủy"
        cancelButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'), {});
                cancelModal.show();

                // Hiển thị ô nhập lý do khác nếu chọn "Lý do khác"
                document.querySelectorAll('input[name="cancelReason"]').forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        if (document.getElementById('reason4').checked) {
                            document.getElementById('otherReasonContainer').style.display = 'block';
                        } else {
                            document.getElementById('otherReasonContainer').style.display = 'none';
                        }
                    });
                });

                // Thêm sự kiện click cho nút "Xác nhận" trong modal "Hủy"
                var confirmCancelButton = document.getElementById('confirmCancelButton');
                confirmCancelButton.onclick = function () {
                    var selectedReason = document.querySelector('input[name="cancelReason"]:checked').value;
                    if (selectedReason === 'Lý do khác') {
                        selectedReason = document.getElementById('otherReason').value;
                    }
                    cancelModal.hide();
                    // Thực hiện các hành động hủy lịch khác tại đây, ví dụ như gửi yêu cầu đến server
                    console.log('Lý do từ chối: ' + selectedReason);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tất cả các nút "Xác nhận"
        var confirmButtons = document.querySelectorAll('.btn-primary.btn-sm');

        // Thêm sự kiện click cho mỗi nút "Xác nhận"
        confirmButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {});
                confirmationModal.show();

                // Thêm sự kiện click cho nút "Xác nhận" trong modal
                var confirmAppointmentButton = document.getElementById('confirmAppointmentButton');
                confirmAppointmentButton.onclick = function () {
                    confirmationModal.hide();
                    // Thực hiện các hành động xác nhận khác tại đây, ví dụ như gửi yêu cầu đến server
                    console.log('Lịch khám đã được xác nhận!');
                }
            });
        });

        // Lấy tất cả các nút "Hủy"
        var cancelButtons = document.querySelectorAll('.btn-danger.btn-sm');

        // Thêm sự kiện click cho mỗi nút "Hủy"
        cancelButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var cancelModal = new bootstrap.Modal(document.getElementById('cancelModal'), {});
                cancelModal.show();

                // Hiển thị ô nhập lý do khác nếu chọn "Lý do khác"
                document.querySelectorAll('input[name="cancelReason"]').forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        if (document.getElementById('reason4').checked) {
                            document.getElementById('otherReasonContainer').style.display = 'block';
                        } else {
                            document.getElementById('otherReasonContainer').style.display = 'none';
                        }
                    });
                });

                // Thêm sự kiện click cho nút "Xác nhận" trong modal "Hủy"
                var confirmCancelButton = document.getElementById('confirmCancelButton');
                confirmCancelButton.onclick = function () {
                    var selectedReason = document.querySelector('input[name="cancelReason"]:checked').value;
                    if (selectedReason === 'Lý do khác') {
                        selectedReason = document.getElementById('otherReason').value;
                    }
                    cancelModal.hide();
                    // Thực hiện các hành động hủy lịch khác tại đây, ví dụ như gửi yêu cầu đến server
                    console.log('Lý do từ chối: ' + selectedReason);
                }
            });
        });
    });
</script>

</body>
</html>
