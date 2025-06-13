<?php include 'app/views/shares/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="/ptpm-mnm-2280603415/WebBanHang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>

<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem('jwtToken');

        if (!token) {
            alert('Vui lòng đăng nhập');
            location.href = '/ptpm-mnm-2280603415/WebBanHang/account/login'; // Điều hướng đến trang đăng nhập
            return;
        }

        fetch('/ptpm-mnm-2280603415/WebBanHang/api/product', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const productItem = document.createElement('li');
                productItem.className = 'list-group-item';
                productItem.innerHTML = `
                    <h2><a href="/ptpm-mnm-2280603415/WebBanHang/Product/show/${product.id}">${product.name}</a></h2>
                    <p>${product.description}</p>
                    <p>Giá: ${product.price} VND</p>
                    <p>Danh mục: ${product.category_name}</p>
                    <a href="/ptpm-mnm-2280603415/WebBanHang/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                `;
                productList.appendChild(productItem);
            });
        });
    });

    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            fetch(`/ptpm-mnm-2280603415/WebBanHang/api/product/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('jwtToken')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Product deleted successfully') {
                    location.reload();
                } else {
                    alert('Xóa sản phẩm thất bại');
                }
            });
        }
    }
</script>
