<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem lịch khám bệnh</title>
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
            font-size: 23px;
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
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            right: 0;
            left: 200px;
            height: 67px;
            z-index: 1000;
        }

        .main-content {
            margin-left: 200px;
            padding: 80px 20px 20px 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table .btn {
            background-color: #33CCFF;
            color: white;
        }

        #infoModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 2000;
            width: 600px;
        }

        #infoModal h4 {
            justify-content: center;
            text-align: center;
            margin-bottom: 20px;
        }

        #infoModal .form-group {
            margin-bottom: 15px;
        }

        #infoModal .form-row {
            display: flex;
            justify-content: space-between;
        }

        #infoModal .form-group label {
            display: block;
            text-align: left;
        }

        #infoModal .form-group input {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            background-color: #f0f0f0;
            pointer-events: none;
        }

        #infoModal .close-btn {
            background: #888888;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            margin-top: 10px;
            float: right;
        }

        #infoModal .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar h6 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar h6 i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="text-center mb-4">
        <h6><i class="fas fa-user-md"></i>Bác sĩ</h6>
    </div>
    <div class="divider"></div>
    <a href="{{ route('doctors.health-record') }}" class="btn active"><i class="fas fa-calendar-alt p-2"></i> Xem lịch khám</a>

    <a href="{{ route('doctors.healthcares') }}" class="btn active"><i class="fas fa-book-medical p-1"></i> Quản lý sổ
        khám bệnh</a>
</div>
<div class="topbar">
    <div class="user-info">
        <span class="fs-4 text-uppercase">{{Session::get("name")}}</span>
        <img src="https://via.placeholder.com/30" class="rounded-circle" alt="User">
    </div>
</div>
<div class="main-content">
    <h2 class="text-center m-3">Xem lịch khám bệnh</h2>
    <table class="table table-bordered mt-4">
        <thead>
        <tr style="background-color: #9adafe">
            <th>Mã KH</th>
            <th>Tên</th>
            <th>Loại dịch vụ</th>
            <th>Loại thú cưng</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($Lists as $List)
            <tr>
                <td>{{ $List->id }}</td>
                <td>{{ $List->user_name }}</td>
                <td>{{ $List->service_name }}</td>
                <td>{{ $List->pet_name }}</td>
                <td>{{ $List->created_at }}</td>
                <td>
                    <button class="btn xem-thong-tin">Xem thông tin</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Information Modal -->
<div id="infoModal">
    <span class="close-icon">&times;</span>
    <h4>Thông tin lịch khám bệnh</h4>
    <div class="form-row">
        <div class="form-group" style="width: 45%;">
            <label for="maKH">Mã KH</label>
            <input type="text" id="maKH" readonly>
        </div>
        <div class="form-group" style="width: 45%;">
            <label for="soDienThoai">Số điện thoại</label>
            <input type="text" id="soDienThoai" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group" style="width: 45%;">
            <label for="tenKH">Tên khách hàng</label>
            <input type="text" id="tenKH" readonly>
        </div>
        <div class="form-group" style="width: 45%;">
            <label for="loaiThuCung">Loại thú cưng</label>
            <input type="text" id="loaiThuCung" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group" style="width: 45%;">
            <label for="thoiGian">Thời gian</label>
            <input type="text" id="thoiGian" readonly>
        </div>
        <div class="form-group" style="width: 45%;">
            <label for="ghiChu">Ghi chú</label>
            <input type="text" id="ghiChu" readonly>
        </div>
    </div>
    <button class="close-btn">Đóng</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const infoModal = document.getElementById('infoModal');
        const closeModal = infoModal.querySelector('.close-btn');
        const closeIcon = infoModal.querySelector('.close-icon');
        const xemThongTinButtons = document.querySelectorAll('.xem-thong-tin');

        xemThongTinButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const maKH = row.cells[0].innerText;
                const tenKH = row.cells[1].innerText;
                const loaiThuCung = row.cells[3].innerText;
                const thoiGian = row.cells[4].innerText;

                document.getElementById('maKH').value = maKH;
                document.getElementById('soDienThoai').value = '';
                document.getElementById('tenKH').value = tenKH;
                document.getElementById('loaiThuCung').value = loaiThuCung;
                document.getElementById('thoiGian').value = thoiGian;
                document.getElementById('ghiChu').value = '';

                infoModal.style.display = 'block';
            });
        });

        closeModal.addEventListener('click', function () {
            infoModal.style.display = 'none';
        });

        closeIcon.addEventListener('click', function () {
            infoModal.style.display = 'none';
        });
    });
</script>
</body>
</html>
