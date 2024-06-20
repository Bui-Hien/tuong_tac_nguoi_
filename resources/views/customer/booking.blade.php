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
                <a class="nav-link  " href="#"><i class="bi bi-envelope me-2"></i> PetHaven@Gmail.com</a>
                <a class="nav-link " href="#"><i class="bi bi-clock me-2"></i> Mở cửa từ thứ 2 - chủ nhật: 8:30 - 19:30</a>
                <a class="nav-link " href="#"><i class="bi bi-telephone me-2"></i> 0443.4465.883</a>
                <a class="nav-link disabled ms-2" aria-disabled="true"><i class="bi bi-geo-alt me-2"></i> 175 Tây Sơn - Đống Đa - Hà Nội</a>
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
            <!-- Form Section -->
            <div class="col-md-6">
                <div class="form-section">
                    <form id="booking-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ Và Tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Nguyen Van A">
                            <div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" placeholder="0989883833">
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Ngày Đặt Dịch Vụ</label>
                            <input type="date" class="form-control" id="date">
                            <div class="invalid-feedback">Vui lòng chọn ngày đặt dịch vụ.</div>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Cơ Sở</label>
                            <input type="text" class="form-control" id="location" placeholder="Hà Nội">
                            <div class="invalid-feedback">Vui lòng nhập cơ sở.</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="service" class="form-label col-sm-12">Loại Dịch Vụ</label>
                            <div class="col-sm-6">
                                <select id="service" class="form-select mb-3">
                                    <option selected value="">Chọn loại dịch vụ</option>
                                    <option value="Thăm khám">Thăm khám</option>
                                    <option value="Kiểm tra tổng quát">Kiểm tra tổng quát</option>
                                    <option value="Kiểm tra da và lông">Kiểm tra da và lông</option>
                                    <option value="Tiêm phòng và tẩy giun">Tiêm phòng và tẩy giun</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn loại dịch vụ hoặc loại chăm sóc.</div>
                            </div>
                            <div class="col-sm-6">
                                <select id="care" class="form-select mb-3">
                                    <option selected value="">Chọn loại chăm sóc</option>
                                    <option value="Trông thú cưng">Trông thú cưng</option>
                                    <option value="Tỉa lông thú cưng">Tỉa lông thú cưng</option>
                                    <option value="Tắm cho thú cưng">Tắm cho thú cưng</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn loại dịch vụ hoặc loại chăm sóc.</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button style="background-color: #9adafe" type="submit" class="btn">
                                Đặt lịch
                            </button>
                        </div>
                        <!-- Thông báo thành công khi đặt lịch -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Lịch hẹn đã được đặt thành
                                            công</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <!-- Phần xu ly bo  trông cac trường trong from  -->
    <script>
        document.getElementById('booking-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn không cho form submit tự động

            // Lấy tất cả các trường cần kiểm tra
            var name = document.getElementById('name');
            var phone = document.getElementById('phone');
            var date = document.getElementById('date');
            var service = document.getElementById('service');
            var care = document.getElementById('care');

            // Reset lại trạng thái của các trường
            var fields = [name, phone, date, service, care];
            fields.forEach(function(field) {
                field.classList.remove('is-invalid');
            });

            var isValid = true;

            // Kiểm tra từng trường và thêm lớp 'is-invalid' nếu trường đó trống
            if (name.value.trim() === '') {
                name.classList.add('is-invalid');
                isValid = false;
            }
            if (phone.value.trim() === '') {
                phone.classList.add('is-invalid');
                isValid = false;
            }
            if (date.value.trim() === '') {
                date.classList.add('is-invalid');
                isValid = false;
            }

            // Kiểm tra logic chọn dịch vụ
            if (service.value.trim() === '' && care.value.trim() === '') {
                service.classList.add('is-invalid');
                care.classList.add('is-invalid');
                isValid = false;
            } else if (service.value.trim() !== '' && care.value.trim() !== '') {
                service.classList.add('is-invalid');
                care.classList.add('is-invalid');
                isValid = false;
            }

            // Nếu tất cả các trường đều hợp lệ, mở modal
            if (isValid) {
                var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                modal.show();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
