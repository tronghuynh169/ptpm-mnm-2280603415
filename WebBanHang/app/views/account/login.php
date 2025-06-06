<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <!-- Sử dụng card với hiệu ứng kính mờ -->
                <div class="card card-glass text-white">
                    <div class="card-body p-5 text-center">

                        <form action="/ptpm-mnm-2280603415/WebBanHang/account/checklogin" method="post">
                            
                            <h2 class="fw-bold mb-3 text-uppercase text-dark">Đăng Nhập</h2>
                            <p class=" mb-4 text-dark">Chào mừng bạn quay trở lại!</p>

                            <!-- Cải tiến: Label được đặt trước input, có icon và placeholder -->
                            <!-- Username -->
                            <div class="form-group text-start mb-4">
                                <label class="form-label fw-bold" for="username">Tài Khoản</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white border-0"><i class="fas fa-user"></i></span>
                                    <input type="text" id="username" name="username" class="form-control form-control-lg form-control-dark" placeholder="Nhập tài khoản của bạn" required />
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group text-start mb-3">
                                <label class="form-label fw-bold" for="password">Mật Khẩu</label>
                                 <div class="input-group">
                                    <span class="input-group-text bg-dark text-white border-0"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg form-control-dark" placeholder="Nhập mật khẩu" required />
                                </div>
                            </div>

                            <div class="text-end mb-4">
                                <a class="small text-white-50" href="#!">Quên mật khẩu?</a>
                            </div>

                            <!-- Nút đăng nhập nổi bật hơn -->
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark btn-lg fw-bold text-uppercase" type="submit">Đăng Nhập</button>
                            </div>
                            
                            <hr class="my-4 light-hr">


                            <div class="mt-5">
                                <p class="mb-0 text-dark">Chưa có tài khoản? 
                                    <a href="/ptpm-mnm-2280603415/WebBanHang/account/register" class="text-dark fw-bold">Đăng ký ngay</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
