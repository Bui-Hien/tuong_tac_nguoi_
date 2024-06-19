<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetHaven Animal Hospital</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #f1faff;
            padding: 10px 0;
        }
        .header .contact-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header .contact-info div {
            display: flex;
            align-items: center;
        }
        .header .contact-info div p {
            margin: 0 10px;
        }
        .sidebar {
            background-color: #cce6ff;
            height: 100%;
            padding: 20px;
        }
        .sidebar a {
            color: black;
            display: block;
            padding: 10px 0;
        }
        .main-content {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .main-content img {
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row contact-info">
                <div>
                    <img src="pet_haven_logo.png" alt="PetHaven Logo" height="50">
                    <p>PetHaven Animal Hospital</p>
                </div>
                <div>
                    <p><i class="fas fa-envelope"></i> PetHaven@gmail.com</p>
                    <p><i class="fas fa-clock"></i> Mở cửa từ thứ 2 - chủ nhật: 8:30 - 19:30</p>
                    <p><i class="fas fa-map-marker-alt"></i> 175 Tây Sơn-Đống Đa-Hà Nội</p>
                    <p><i class="fas fa-phone"></i> 0443.4465.883</p>
                    <button class="btn btn-primary">Đặt lịch</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="#">Giới thiệu</a>
            <a href="#">Các dịch vụ</a>
            <a href="#">Về chúng tôi</a>
            <a href="#">Các ưu đãi</a>
            <a href="#">Tuyển dụng</a>
        </div>
        <!-- Main content -->
        <div class="col-md-10">
            <div class="container main-content">
                <div class="row">
                    <div class="col-md-6">
                        <img src="veterinary_team.jpg" alt="Veterinary Team" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h3>Phòng khám thú y PetHaven</h3>
                        <p>Được thành lập tại Việt Nam sau khi nhận thấy dịch vụ chăm sóc thú cưng ở Việt Nam không đáp ứng được nhu cầu của các gia đình.</p>
                        <p>Phòng khám thú y PetHaven sẵn sàng phục vụ 24/7. Chăm sóc động vật toàn diện và chuyên nghiệp, hướng dẫn chủ nuôi cách để chăm sóc thú cưng một cách tốt nhất.</p>
                        <p>PetHaven có đội ngũ y bác sỹ hàng đầu Việt Nam trong lĩnh vực thú y, với sự chăm sóc tận tâm nhất đến sức khỏe của thú cưng Việt Nam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
