<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="text-center text-light mb-4">Giỏ hàng</h1>

    <?php if (empty($cart)): ?>
        <div class="alert alert-light text-center">
            Giỏ hàng của bạn đang trống.
        </div>
        <div class="text-center">
            <a href="/ptpm-mnm-2280603415/WebBanHang/Product" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
        <?php
            // Tính tổng tiền giỏ hàng
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }
        ?>
         <!-- Hiển thị tổng tiền -->
         <div class="mb-3 text-end">
            <h5 class="text-light">
                Tổng tiền: 
                <span class="text-warning">
                    <?php echo number_format($totalAmount, 0, ',', '.'); ?> VNĐ
                </span>
            </h5>
        </div>
        <div class="list-group mb-4">
            <?php foreach ($cart as $id => $item): ?>
                <div class="list-group-item bg-dark text-light border-0 mb-3 rounded shadow-sm">
                    <div class="row g-3 align-items-center">
                        <!-- Ảnh sản phẩm -->
                        <div class="col-md-2 text-center">
                            <img 
                                src="/ptpm-mnm-2280603415/WebBanHang/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" 
                                class="img-fluid rounded" 
                                style="max-height: 100px;"
                            >
                        </div>

                            <!-- Thông tin sản phẩm -->
                            <div class="col-md-7">
                                <h5 class="mb-1">
                                    <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </h5>
                                <p class="mb-1">Giá mỗi cái: <strong><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</strong></p>
                                
                                <!-- Số lượng với nút tăng/giảm -->
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">Số lượng:</span>
                                    <!-- Form nút giảm -->
                                    <?php if ($item['quantity'] > 1): ?>
                                        <!-- Khi số lượng > 1 cho phép giảm -->
                                        <form 
                                            action="/ptpm-mnm-2280603415/WebBanHang/Product/decreaseQuantity/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
                                            method="post"
                                            class="d-inline me-1"
                                        >
                                            <button type="submit" class="btn btn-outline-warning btn-sm">
                                                &minus;
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <!-- Khi số lượng = 1, disable nút giảm -->
                                        <button class="btn btn-outline-warning btn-sm me-1" disabled>
                                            &minus;
                                        </button>
                                    <?php endif; ?>

                                    <!-- Hiển thị số lượng -->
                                    <span class="mx-2"><strong><?php echo intval($item['quantity']); ?></strong></span>

                                    <!-- Form nút tăng -->
                                    <form 
                                        action="/ptpm-mnm-2280603415/WebBanHang/Product/increaseQuantity/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
                                        method="post"
                                        class="d-inline ms-1"
                                    >
                                        <button type="submit" class="btn btn-outline-success btn-sm">
                                            &plus;
                                        </button>
                                    </form>
                                </div>

                                <!-- Thành tiền của dòng -->
                                <p class="mb-0">
                                    Thành tiền: 
                                    <strong><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VNĐ</strong>
                                </p>
                            </div>

                        <!-- Thao tác xóa -->
                        <div class="col-md-3 text-end">
                            <form 
                                action="/ptpm-mnm-2280603415/WebBanHang/Product/removeFromCart" 
                                method="post" 
                                onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');"
                            >
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tổng tiền & nút chức năng -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <a href="/ptpm-mnm-2280603415/WebBanHang/Product" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Tiếp tục mua sắm
            </a>
            <a href="/ptpm-mnm-2280603415/WebBanHang/Product/checkout" class="btn btn-success">
                <i class="fa-solid fa-credit-card"></i> Thanh Toán
            </a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
