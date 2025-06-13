<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
<h1>Danh sách sản phẩm</h1>

<a href="/ptpm-mnm-2280603415/WebBanHang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>

<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/ptpm-mnm-2280603415/WebBanHang/api/product')
            .then(response => response.json())
            .then(data => {
                const productList = document.getElementById('product-list');
                data.forEach(product => {
                    const productItem = document.createElement('li');
                    // Gán ID cho mỗi item để dễ dàng xóa khỏi DOM sau này
                    productItem.id = `product-item-${product.id}`; 
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
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product deleted successfully') {
                        // Tốt hơn là xóa trực tiếp element thay vì reload lại trang
                        const itemToRemove = document.getElementById(`product-item-${id}`);
                        if(itemToRemove) {
                            itemToRemove.remove();
                        } else {
                            // Nếu không tìm thấy thì mới reload
                            location.reload(); 
                        }
                    } else {
                        alert('Xóa sản phẩm thất bại');
                    }
                });
        }
    }
</script>