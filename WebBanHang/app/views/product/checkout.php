<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="text-center text-light mb-4">Thanh toán</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-light shadow">
                <div class="card-body">
                    <form method="POST" action="/ptpm-mnm-2280603415/WebBanHang/Product/processCheckout">
                        <div class="mb-3">
                            <label for="name" class="form-label text-light">Họ tên:</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-control bg-secondary text-light border-0" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-light">Số điện thoại:</label>
                            <input 
                                type="text" 
                                id="phone" 
                                name="phone" 
                                class="form-control bg-secondary text-light border-0" 
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label text-light">Địa chỉ:</label>
                            <textarea 
                                id="address" 
                                name="address" 
                                class="form-control bg-secondary text-light border-0" 
                                rows="3" 
                                required
                            ></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Thanh toán</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/ptpm-mnm-2280603415/WebBanHang/Product/cart" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Quay lại giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
