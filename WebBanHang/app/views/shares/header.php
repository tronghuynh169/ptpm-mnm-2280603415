<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Quản lý sản phẩm</title>

    <!-- Bootstrap 5 CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    />

    <!-- Font Awesome (nếu cần icon) -->
    <link 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        rel="stylesheet" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"
    />

    <style>
        body {
            background-color: #1a1a1a;
        }
        /* Chỉ thêm CSS rất tối giản để bo góc và tăng khoảng cách cho dropdown */
        .navbar-custom {
            border-bottom-left-radius: .75rem;
            border-bottom-right-radius: .75rem;
        }
        .nav-link {
            font-weight: 500;
            transition: color .2s ease;
        }
        .nav-link:hover {
            color: #0dcaf0!important;
        }
        .dropdown-menu {
            min-width: 200px;
        }
    </style>
</head>
<body class="text-light">

    <!-- Navbar Dark với class custom để bo góc -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom shadow-sm">
        <div class="container-fluid">
            <!-- Logo/Brand -->
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-tag me-1"></i> Quản lý sản phẩm
            </a>

            <!-- Button collapse trên mobile -->
            <button 
                class="navbar-toggler border-0" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar" 
                aria-controls="mainNavbar" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Các link trong Navbar -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <!-- Danh sách sản phẩm -->
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/">
                            <i class="fa-solid fa-list me-1"></i> Danh sách
                        </a>
                    </li>

                    <!-- Nếu là Admin, hiển thị thêm link Thêm/Sửa danh mục -->
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/add">
                                <i class="fa-solid fa-plus-circle me-1"></i> Thêm sản phẩm
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Category/list">
                                <i class="fa-solid fa-tags me-1"></i> Quản lý danh mục
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/cart">
                                <i class="fa-solid fa-cart-shopping me-1"></i> Giỏ hàng
                                <?php 
                                    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                    if ($count > 0) {
                                        echo "<span class='badge bg-info ms-1'>$count</span>";
                                    }
                                ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Nếu không phải admin, vẫn có thể xem giỏ -->
                    <?php if (!SessionHelper::isAdmin() && SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/cart">
                                <i class="fa-solid fa-cart-shopping me-1"></i> Giỏ hàng
                                <?php 
                                    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                    if ($count > 0) {
                                        echo "<span class='badge bg-info ms-1'>$count</span>";
                                    }
                                ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Thông tin người dùng / Login-Logout -->
                    <li class="nav-item">
                        <?php
                            if (SessionHelper::isLoggedIn()) {
                                echo "<a class='nav-link'>" . htmlspecialchars($_SESSION['username']) . "
                                (" . SessionHelper::getRole() . ")</a>";
                            }
                            else{
                                echo "<a class='nav-link d-block'
                                href='/ptpm-mnm-2280603415/WebBanHang/account/login'>Đăng nhập</a>
                                ";
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        </a>
                        <?php
                            if(SessionHelper::isLoggedIn()){
                                echo "<a class='nav-link'
                                href='/ptpm-mnm-2280603415/WebBanHang/account/logout'>Đăng xuất</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container chính, các view sẽ inject nội dung vào đây -->
    <div class="container mt-4">
        <!-- Content sẽ được include từ các view khác -->
    </div>

    <!-- Bootstrap 5 JS (bao gồm Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
