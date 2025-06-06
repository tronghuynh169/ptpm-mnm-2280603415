<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-dark text-center border-bottom-0 p-4">
                    <h3 class="mb-0">Tạo Tài Khoản Mới</h3>
                </div>
                <div class="card-body p-4">

                    <?php
                        // Hiển thị lỗi một cách chuyên nghiệp hơn
                        if (isset($errors) && !empty($errors)) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<strong>Oops! Có lỗi xảy ra:</strong><ul>';
                            foreach ($errors as $err) {
                                echo "<li>$err</li>";
                            }
                            echo '</ul></div>';
                        }
                    ?>

                    <form action="/ptpm-mnm-2280603415/WebBanHang/account/save" method="post">
                        
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Tên đăng nhập</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập của bạn" required>
                            </div>
                        </div>

                        <!-- Fullname -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label fw-bold">Họ và Tên</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ và tên đầy đủ" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Tạo mật khẩu của bạn" required>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="confirmpassword" class="form-label fw-bold">Xác nhận Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Nhập lại mật khẩu" required>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg fw-bold">Đăng Ký</button>
                        </div>

                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0 text-dark">Đã có tài khoản? <a class="text-dark fw-bold" href="/ptpm-mnm-2280603415/WebBanHang/account/login">Đăng nhập ngay!</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<!-- Bootstrap 5 JS (nếu cần cho các component khác, thường đặt trước thẻ đóng </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>