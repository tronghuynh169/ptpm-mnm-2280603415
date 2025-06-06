<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center text-uppercase fw-bold mb-4 text-light">Danh sách sản phẩm</h1>

    <div class="text-center mb-4">
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/ptpm-mnm-2280603415/WebBanHang/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
        <?php endif; ?>
    </div>

    <div class="row g-4">
        <?php foreach ($products as $product): ?>
            <div class="col-md-6">
                <div class="card bg-dark text-light shadow rounded-4 h-100">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 text-center p-3">
                            <?php if ($product->image): ?>
                                <img src="/ptpm-mnm-2280603415/WebBanHang/<?php echo htmlspecialchars($product->image); ?>" class="img-fluid rounded border" alt="Product Image">
                            <?php else: ?>
                                <img src="/ptpm-mnm-2280603415/WebBanHang/images/no-image.png" class="img-fluid rounded border" alt="No Image">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/ptpm-mnm-2280603415/WebBanHang/Product/show/<?php echo $product->id; ?>" class="text-info text-decoration-none">
                                        <?php echo htmlspecialchars($product->name); ?>
                                    </a>
                                </h5>
                                <p class="card-text"><?php echo htmlspecialchars($product->description); ?></p>
                                <p class="card-text">Giá: <strong><?php echo number_format($product->price, 0, ',', '.'); ?> VND</strong></p>
                                <p class="card-text">Danh mục: <?php echo htmlspecialchars($product->category_name); ?></p>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    <?php if (SessionHelper::isAdmin()): ?>
                                        <a href="/ptpm-mnm-2280603415/WebBanHang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                        <a href="/ptpm-mnm-2280603415/WebBanHang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                                    <?php endif; ?>
                                    <?php if (SessionHelper::isLoggedIn()): ?>
                                    <a href="/ptpm-mnm-2280603415/WebBanHang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">Thêm vào giỏ hàng</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
