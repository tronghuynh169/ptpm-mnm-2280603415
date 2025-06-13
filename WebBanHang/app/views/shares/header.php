<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Quản lý sản phẩm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/">Danh sách sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/Product/add">Thêm sản phẩm</a>
            </li>
            <li class="nav-item" id="nav-login">
                <a class="nav-link" href="/ptpm-mnm-2280603415/WebBanHang/account/login">Login</a>
            </li>
            <li class="nav-item" id="nav-logout" style="display: none;">
                <a class="nav-link" href="#" onclick="logout()">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- SCRIPT -->
<script>
    function logout() {
        localStorage.removeItem('jwtToken');
        location.href = '/ptpm-mnm-2280603415/WebBanHang/account/login';
    }

    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem('jwtToken');

        if (token) {
            document.getElementById('nav-login').style.display = 'none';
            document.getElementById('nav-logout').style.display = 'block';
        } else {
            document.getElementById('nav-login').style.display = 'block';
            document.getElementById('nav-logout').style.display = 'none';
        }
    });
</script>

    <!-- Container chính, các view sẽ inject nội dung vào đây -->
    <div class="container mt-4">
        <!-- Content sẽ được include từ các view khác -->
    </div>

    <!-- Bootstrap 5 JS (bao gồm Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
