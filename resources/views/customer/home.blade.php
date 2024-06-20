<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PetHaven Animal Hospital </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <style>
        nav.col-md-3 {
            background-color: #9ADAFE;
            padding: 20px;
        }
        nav.col-md-3 .nav-link {
            color: #000;
            padding: 10px;
            transition: background-color 0.3s ease;
        }
        nav.col-md-3 .nav-item {
            font-size: 20px;
        }
        nav.col-md-3 .nav-item:hover {
            background-color: #DDDDDD;
        }
        .full-width-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            padding: 0px;
        }
        .header-middle {
            border: 1px solid black;
        }
        .header-middle .nav-item img {
            height: 70px;
        }
        .header-middle .nav-item,
        .header-middle .nav-item h2,
        .header-middle .nav-item button {
            align-self: center;
        }
    </style>
</head>

<body>
<header>
    <div class="header-upper header-middle  ">
        <div class="nav nav-pills nav-fill">
            <a class="nav-link" href="{{route('home')}}"><i class="bi bi-envelope me-2"></i> PetHaven@Gmail.com</a>
            <a class="nav-link" href="#"><i class="bi bi-clock me-2"></i> Mở cửa từ thứ 2 - chủ nhật: 8:30 - 19:30</a>
            <a class="nav-link" href="#"><i class="bi bi-telephone me-2"></i> 0443.4465.883</a>
            <a class="nav-link disabled ms-2" aria-disabled="true"><i class="bi bi-geo-alt me-2"></i> 175 Tây Sơn - Đống Đa - Hà Nội</a>
        </div>
    </div>
    <ul class=" header-middle  nav nav-pills nav-fill d-flex justify-content-between py-2 ">
        <li class="nav-item">
            <img class="w-30" src="./../../img/img.png" alt="Active">
        </li>
        <li class="nav-item mt-2">
            <h3 class="mb-0 fw-bolder">PetHaven vì sức khoẻ thú cưng của bạn</h3>
        </li>
        <li class="nav-item  ">
            <button class="btn w-30 btn-lg   " style ="background-color:#90FF5B; " > <h3 class =" text-center mb-0">Đặt Lịch</h3></button>
        <li class="nav-item mt-2">
            <a href="{{route('booking')}}" class="btn w-30  " style ="background-color:#90FF5B; " >Đặt Lịch</a>
        </li>
    </ul>
</header>
<div class="container-fluid mt-4 ">
    <div class="row">
        <nav class="col-md-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Các dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Các ưu đãi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tuyển dụng</a>
                </li>
            </ul>
        </nav>
        <div class="col-md-6 p-0">
            <img src="./../../img/Rectangle%2024baner.png" alt="PetHaven Team" class="full-width-image">
        </div>
        <div class="col-md-3" style="background-color: #FFCCCC">
            <div class="text-left p-3">
                <h4 class="text-center mt-4 mb-4">Phòng khám thú y PetHaven</h4>
                <p>Được thành lập tại Việt Nam sau khi nhận thấy dịch vụ chăm sóc thú cưng ở Việt Nam không đáp ứng được nhu cầu của chủ.</p>
                <p>Phòng khám thú y PetHaven sẵn sàng phục vụ 24/7. Chăm sóc các chú chó mèo của bạn cả ngày lẫn đêm, hướng dẫn các chế độ chăm sóc thú cưng một cách tốt nhất.</p>
                <p>PetHaven có đội ngũ y bác sỹ hàng đầu Việt Nam trong lĩnh vực thú y và các chuyên gia tận tâm hết mình vì sức khoẻ của thú cưng Việt.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QwtQTHkWWmiYMtkePo6oJ4fGc7IB1YUbGZcmNtsD1S1anEHIxU7lR7QoTOmno4lT" crossorigin="anonymous"></script>
</body>
</html>
