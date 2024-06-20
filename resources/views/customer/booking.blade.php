<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PetHaven Animal Hospital </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/booking.css">
</head>

<body>
<header>
    <div class="header-upper">
        <div class="nav nav-pills nav-fill">
            <a class="nav-link" href="{{route('home')}}"><i class="bi bi-envelope me-2"></i> PetHaven@Gmail.com</a>
            <a class="nav-link " href="#"><i class="bi bi-clock me-2"></i> Mở cửa từ thứ 2 - chủ nhật: 8:30 - 19:30</a>
            <a class="nav-link " href="#"><i class="bi bi-telephone me-2"></i> 0443.4465.883</a>
            <a class="nav-link disabled ms-2" aria-disabled="true"><i class="bi bi-geo-alt me-2"></i> 175 Tây Sơn - Đống
                Đa - Hà Nội</a>
        </div>
    </div>
    <ul class=" header-middle nav nav-pills nav-fill ">
        <li class="nav-item me-5 ">
            <img class="w-30" style="height: 70px;" src="{{ asset('img/img.png') }}" alt="Active">

        </li>
        <li class="  nav-item  d-flex align-items-center ">
            <h2 class="mb-0 fw-bolder ">PetHaven vì sức khoẻ thú cưng của bạn</h2>
        </li>
    </ul>
</header>
<div class="container mt-4">
    <!-- Form Section hiển thị lai thông báo-->
    @if(Session::has("fail"))
        <div class="alert alert-fail">
            {{Session::get("fail")}}
        </div>
    @endif
    <div class="row align-items-stretch">
        <!-- Call to Action Section -->
        <div class="col-md-5 ms-5">
            <div class="cta-section">
                <h6>Với đội ngũ bác sĩ và nhân viên chăm sóc,</h6>
                <h6>tận tâm chúng tôi tự hào mang đến các dịch</h6>
                <h6 class="mb-5">vụ y tế toàn diện cho thú cưng của bạn.</h6>
                <h2 class="mt-2">Đặt lịch ngay để được chăm</h2>
                <h2>sóc tốt nhất cho thú cưng của gia đình bạn →</h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-section">
                <form id="booking-form" action="{{route("customers-store-build")}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ Và Tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}"
                               placeholder="Nguyen Van A">
                        @error("name")
                        <div class="text-danger">Vui lòng nhập họ và tên.</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{old("phone")}}"
                               placeholder="0989883833">
                        @error("phone")
                        <div class="text-danger">Vui lòng nhập số điện thoại.</div>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Ngày Đặt Dịch Vụ</label>
                        <input type="date" class="form-control" name="date" value="{{old("date")}}" id="date">
                        @error("date")
                        <div class="text-danger">Vui lòng chọn ngày đặt dịch vụ.</div> @enderror

                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Cơ Sở</label>
                        <input type="text" class="form-control" id="location" placeholder="Hà Nội" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Chọn loại dịc vụ</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="service">
                            <option value="">Chọn loại dịch vụ</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                        @error("service")
                        <div class="text-danger">Vui lòng chọn loại dịch vụ hoặc loại chăm sóc.</div> @enderror

                    </div>
                    <div class="d-flex justify-content-center">
                        <button style="background-color: #9adafe" type="submit" class="btn">
                            Đặt lịch
                        </button>
                    </div>
                    <!-- Thông báo thành công khi đặt lịch -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Lịch hẹn đã được đặt thành
                                        công</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Hi vọng chúng ta có thể gặp nhau sớm tại PetHaven.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Nếu tất cả các trường đều hợp lệ, mở modal
    document.addEventListener("DOMContentLoaded", function () {
        @if(Session::has("success"))
        var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        modal.show();
        @endif
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
