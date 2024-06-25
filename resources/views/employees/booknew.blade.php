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

        .table .action-column {
            width: 150px;
            white-space: nowrap;
        }

        .table .btn {
            width: 70px;
            margin: 2px;
            font-size: 12px;
            padding: 5px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar mt-0">
            <div class="d-flex flex-column p-3 pt-0">
                <div class="mt-0">
                    <span> <i class="bi bi-person-circle"></i>NHÂN VIÊN</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="#">
                            <i class="p-2">
                                <svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.14286 0.5C8.13058 0.5 8.92857 1.19824 8.92857 2.0625V3.625H16.0714V2.0625C16.0714 1.19824 16.8694 0.5 17.8571 0.5C18.8449 0.5 19.6429 1.19824 19.6429 2.0625V3.625H22.3214C23.8002 3.625 25 4.6748 25 5.96875V8.3125H0V5.96875C0 4.6748 1.19978 3.625 2.67857 3.625H5.35714V2.0625C5.35714 1.19824 6.15513 0.5 7.14286 0.5ZM0 9.875H25V23.1562C25 24.4502 23.8002 25.5 22.3214 25.5H2.67857C1.19978 25.5 0 24.4502 0 23.1562V9.875ZM3.57143 13.7812V15.3438C3.57143 15.7734 3.97321 16.125 4.46429 16.125H6.25C6.74107 16.125 7.14286 15.7734 7.14286 15.3438V13.7812C7.14286 13.3516 6.74107 13 6.25 13H4.46429C3.97321 13 3.57143 13.3516 3.57143 13.7812ZM10.7143 13.7812V15.3438C10.7143 15.7734 11.1161 16.125 11.6071 16.125H13.3929C13.8839 16.125 14.2857 15.7734 14.2857 15.3438V13.7812C14.2857 13.3516 13.8839 13 13.3929 13H11.6071C11.1161 13 10.7143 13.3516 10.7143 13.7812ZM18.75 13C18.2589 13 17.8571 13.3516 17.8571 13.7812V15.3438C17.8571 15.7734 18.2589 16.125 18.75 16.125H20.5357C21.0268 16.125 21.4286 15.7734 21.4286 15.3438V13.7812C21.4286 13.3516 21.0268 13 20.5357 13H18.75ZM3.57143 20.0312V21.5938C3.57143 22.0234 3.97321 22.375 4.46429 22.375H6.25C6.74107 22.375 7.14286 22.0234 7.14286 21.5938V20.0312C7.14286 19.6016 6.74107 19.25 6.25 19.25H4.46429C3.97321 19.25 3.57143 19.6016 3.57143 20.0312ZM11.6071 19.25C11.1161 19.25 10.7143 19.6016 10.7143 20.0312V21.5938C10.7143 22.0234 11.1161 22.375 11.6071 22.375H13.3929C13.8839 22.375 14.2857 22.0234 14.2857 21.5938V20.0312C14.2857 19.6016 13.8839 19.25 13.3929 19.25H11.6071ZM17.8571 20.0312V21.5938C17.8571 22.0234 18.2589 22.375 18.75 22.375H20.5357C21.0268 22.375 21.4286 22.0234 21.4286 21.5938V20.0312C21.4286 19.6016 21.0268 19.25 20.5357 19.25H18.75C18.2589 19.25 17.8571 19.6016 17.8571 20.0312Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Xử lý yêu cầu đặt lịch
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link " href="#">
                            <i class="p-2">
                                <svg width="25" height="23" viewBox="0 0 25 23" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.125 11.5V6.8125H10.9375V11.5H3.125ZM3.125 14.625H10.9375V19.3125H3.125V14.625ZM14.0625 19.3125V14.625H21.875V19.3125H14.0625ZM21.875 11.5H14.0625V6.8125H21.875V11.5ZM3.125 0.5625C1.40137 0.5625 0 1.96387 0 3.6875V19.3125C0 21.0361 1.40137 22.4375 3.125 22.4375H21.875C23.5986 22.4375 25 21.0361 25 19.3125V3.6875C25 1.96387 23.5986 0.5625 21.875 0.5625H3.125Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Tạo Khám Bệnh
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#">
                            <i class="p-2">
                                <svg width="25" height="23" viewBox="0 0 25 23" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.125 11.5V6.8125H10.9375V11.5H3.125ZM3.125 14.625H10.9375V19.3125H3.125V14.625ZM14.0625 19.3125V14.625H21.875V19.3125H14.0625ZM21.875 11.5H14.0625V6.8125H21.875V11.5ZM3.125 0.5625C1.40137 0.5625 0 1.96387 0 3.6875V19.3125C0 21.0361 1.40137 22.4375 3.125 22.4375H21.875C23.5986 22.4375 25 21.0361 25 19.3125V3.6875C25 1.96387 23.5986 0.5625 21.875 0.5625H3.125Z"
                                        fill="black"/>
                                </svg>
                            </i>
                            Quản Lý thuốc thú ý
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 p-0">
            <div class="header d-flex justify-content-end">
                <span class="fs-4">{{Session::get("name")}}
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
                        <th style="width: 200px;">Hành động</th> <!-- Adjust the width as needed -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @php
                            $createdAt = $user->schedulesAsCustomer[0]->created_at;
                              $dateTime = new DateTime($createdAt);
                              $time = $dateTime->format('h:i A'); // Format the time to include AM/PM
                        @endphp
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{$user->schedulesAsCustomer[0]->date }}, {{$time}}</td>
                            <td class="d-flex justify-content-around">
                                <form id="cfForm"
                                      action="{{ route('cf-update-build', $user->schedulesAsCustomer[0]->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-primary btn-sm"
                                            onclick="handleSubmit(event, 'cfForm')">Xác nhận
                                    </button>
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
                <button type="button" class="btn btn-secondary" style=" width :100px" data-bs-dismiss="modal">Hủy
                </button>
                <button type="button" class="btn btn-primary" style=" width :100px" id="confirmAppointmentButton">Xác
                    nhận
                </button>
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
                <button type="button" class="btn btn-secondary" style=" width :100px" data-bs-dismiss="modal">Hủy
                </button>
                <button type="button" class="btn btn-primary" style=" width :100px" id="confirmAppointmentButton">Xác
                    nhận
                </button>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<!-- JS thanh cong -->
<script>
    function handleSubmit(event, formId) {
        event.preventDefault(); // Prevent default form submission
        const form = document.getElementById(formId);
    }
</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tất cả các nút "Xác nhận"
        var confirmButtons = document.querySelectorAll('.btn-primary.btn-sm');
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
