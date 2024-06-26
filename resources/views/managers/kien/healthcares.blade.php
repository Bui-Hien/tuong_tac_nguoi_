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
            width: 50%;
        }

        .form-left, .form-right {
            width: 48%;
        }

        .form-left .form-group input, .form-left .form-group select,
        .form-right .form-group input, .form-right .form-group select {
            width: 70%;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info img {
            margin-right: 10px;
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
        }

        .btn-group .tao-so-btn:hover {
            background-color: #33CCFF;
        }

        .btn-group .xoa-btn:hover {
            background-color: red;
        }

        .btn-group .cap-nhat-btn:hover {
            background-color: #7DD3F7;
        }

        .section-divider {
            border-top: 1px solid black;
            margin: 40px 0;
        }

        .table th, .table td {
            text-align: center;
        }

        .table .btn {
            background-color: #33CCFF;
            color: white;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: 10% auto; /* Adjusted to be closer to the top */
            padding: 20px;
            border: 1px solid #888;
            width: 90%; /* Increased width for a larger form */
            max-width: 700px; /* Increased max-width for a larger form */
            text-align: left;
        }

        .modal-content.center-text {
            text-align: center;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-footer.center {
            justify-content: center;
        }

        .modal-footer button {
            margin-left: 10px;
        }

        .modal-footer .confirm-btn {
            color: white;
        }

        .modal-footer .btn-secondary {
            width: 90.26px;
            height: 37.6px;
        }

        .modal-footer .confirm-btn.red {
            background-color: red;
        }

        .modal-footer .confirm-btn.blue {
            background-color: #33CCFF;
        }

        .modal-content .form-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 20px; /* Added gap between left and right sections */
        }

        .modal-content .form-left,
        .modal-content .form-right {
            width: 48%;
        }

        .modal-content .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .modal-content .form-group label {
            margin-bottom: 5px;
            text-align: left;
            margin-left: 0; /* Align labels to the left edge of the form group */
            padding-left: 0; /* Ensure no padding on the left */
        }

        .modal-content .form-group input {
            width: 100%;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .yellow-background {
            background-color: #D9D9D9;
        }


    </style>
</head>
<body>
<div class="sidebar">
    <div class="text-center mb-4">
        <h6><i class="fas fa-user-md"></i> Bác sĩ</h6>
    </div>
    <div class="divider"></div>
    <a href="{{ route('doctors.health-record') }}" class="btn "><i
            class="fas fa-calendar-alt p-2"></i> Xem lịch
        khám</a>
    <a href="{{ route('doctors.healthcares') }}" style="background-color: #DDDDDD" class=" btn "><i
            class="fas fa-book-medical p-1"></i> Quản lý sổ khám
        bệnh</a>
</div>
<div class="topbar">
    <div class="user-info">
        <span class="fs-4 text-uppercase">{{Session::get("name")}}</span>
        <img src="https://via.placeholder.com/30" class="rounded-circle" alt="User">
    </div>
</div>

<div class="main-content">
    <form action="{{route('create.health.record') }}" method="POST">
        @csrf
        <div class="form-section mt-3">
            <div class="form-left">
                <div class="form-group">
                    <label for="doctorId">Mã bác sĩ:</label>
                    <input type="text" class="form-control" id="doctorId" name="idbs">
                </div>
                <div class="form-group">
                    <label for="petId">Mã thú cưng:</label>
                    <input type="text" class="form-control" id="petId" name="idpet">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone" name="sdt">
                </div>
            </div>
            <div class="form-right">
                <div class="form-group">
                    <label for="prescriptionId">Mã đơn thuốc:</label>
                    <input type="text" class="form-control" id="prescriptionId" name="idthuoc">
                </div>
                <div class="form-group">
                    <label for="issueDate">Ngày cấp:</label>
                    <input type="date" class="form-control" id="issueDate" name="date">
                </div>
            </div>
        </div>
        <div class="btn-group">
            {{--            onclick="showConfirmation('Thêm')"--}}
            <button type="submit" class="btn tao-so-btn">Tạo sổ</button>
            <button type="button" class="btn xoa-btn" onclick="showConfirmation('Xóa')"> Xóa</button>
            <button type="button" class="btn cap-nhat-btn" onclick="showConfirmation('Cập nhật')"> Cập nhật</button>
            <button type="button" class="btn">Tìm kiếm</button>
        </div>
    </form>

    <div class="section-divider"></div>
    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>Mã sổ</th>
            <th>Mã Bác sĩ</th>
            <th>Mã thú cưng</th>
            <th>Mã đơn thuốc</th>
            <th>Số điện thoại</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schedules as $schedule)
            <tr class="changeColor" onclick="changeColor(event)">
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->user_id }}</td>
                <td>{{ $schedule->pet_id }}</td>
                <td>{{ $schedule->prescriptions_id }}</td>
                <td>{{ $schedule->phone }}</td>
                <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y, h:i A') }}</td>
                <td>
                    <button class="btn btn-primary"
                            data-id="{{ $schedule->id }}"
                            data-phone="{{ $schedule->phone }}"
                            data-user-name="{{ $schedule->name }}"
                    data-pet-type="{{ $schedule->species }}"
                    data-date="{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y, h:i A') }}"
                    data-pet-breed="{{ $schedule->species }}"
                    >Xem thông tin</button>
                </td>
            </tr>
        @endforeach

    </table>

</div>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h5>Xác nhận sửa thông tin</h5>
        <p>Bạn có muốn <span id="actionType"></span> sổ khám không?</p>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal('confirmationModal')">Hủy</button>
            <button type="button" class="btn confirm-btn" id="confirmBtn" onclick="confirmAction()">Xác nhận</button>
        </div>
    </div>
</div>

<div id="successModal" class="modal">
    <div class="modal-content center-text">
        <h5>Thông báo</h5>
        <p id="successMessage">Cập nhật thành công!</p>
        <div class="modal-footer center">
            <button type="button" class="btn btn-secondary" onclick="closeModal('successModal')">Xong</button>
        </div>
    </div>
</div>

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

    function showConfirmation(action) {
        document.getElementById('actionType').innerText = action.toLowerCase();
        const confirmBtn = document.getElementById('confirmBtn');
        if (action === 'Xóa') {
            confirmBtn.classList.remove('blue');
            confirmBtn.classList.add('red');
        } else {
            confirmBtn.classList.remove('red');
            confirmBtn.classList.add('blue');
        }
        document.getElementById('confirmationModal').style.display = 'block';
    }

    function confirmAction() {
        document.getElementById('confirmationModal').style.display = 'none';
        document.getElementById('successMessage').innerText = document.getElementById('actionType').innerText.charAt(0).toUpperCase() + document.getElementById('actionType').innerText.slice(1) + ' thành công!';
        document.getElementById('successModal').style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
</script>

<!-- Form Xem thong tin -->
<div id="infoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('infoModal')">&times;</span>
        <h5 class="modal-title">Thông tin sổ khám bệnh</h5>
        <div class="form-section">
            <div class="form-left">
                <div class="form-group" style="width: 100%;">
                    <label for="infoMaSo" class="text-start">Mã số:</label>
                    <input type="text" class="form-control" id="infoMaSo" readonly name="maso">
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="infoTenKhachHang" class="text-start">Tên khách hàng:</label>
                    <input type="text" class="form-control" id="infoTenKhachHang" readonly name="tenkh">
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="infoNgayCapSo" class="text-start">Ngày cấp sổ:</label>
                    <input type="text" class="form-control" id="infoNgayCapSo" readonly name="date">
                </div>
            </div>
            <div class="form-right">
                <div class="form-group d-flex justify-content-start" style="width: 100%;">
                    <label for="infoSoDienThoai" class="text-start">Số điện thoại:</label>
                    <input type="text" class="form-control" id="infoSoDienThoai" readonly name="sdt">
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="infoLoaiThuCung" class="text-start">Loại thú cưng:</label>
                    <input type="text" class="form-control" id="infoLoaiThuCung" readonly name="typePet">
                </div>
                <div class="form-group" style="width: 100%;">
                    <label for="infoGiongThuCung" class="text-start">Giống thú cưng:</label>
                    <input type="text" class="form-control" id="infoGiongThuCung" readonly name="giongPet">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="background-color: #33ccff" onclick="closeModal('infoModal')">Đóng</button>
        </div>
    </div>
</div>


<!-- Xem thong tin -->
<script>
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', event => {
            if (event.target.innerText === 'Xem thông tin') {
                const scheduleId = event.target.getAttribute('data-id');
                const phone = event.target.getAttribute('data-phone');
                const userName = event.target.getAttribute('data-user-name');
                const petType = event.target.getAttribute('data-pet-type');
                const date = event.target.getAttribute('data-date');
                const petBreed = event.target.getAttribute('data-pet-breed');

                document.getElementById('infoMaSo').value = scheduleId;
                document.getElementById('infoSoDienThoai').value = phone;
                document.getElementById('infoTenKhachHang').value = userName;
                document.getElementById('infoLoaiThuCung').value = petType;
                document.getElementById('infoNgayCapSo').value = date;
                document.getElementById('infoGiongThuCung').value = petBreed;

                document.getElementById('infoModal').style.display = 'block';
            }
        });
    });

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
</script>
</body>
</html>
