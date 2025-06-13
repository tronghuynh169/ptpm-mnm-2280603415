<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: #1a1a1a;
    color: #f8f9fa;
}

.container {
    max-width: 700px;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: #2c2c2c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.form-label {
    color: #f8f9fa;
    font-weight: 500;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 1px solid #555;
    background-color: #3a3a3a;
    color: #f8f9fa;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #00c4b4;
    box-shadow: 0 0 5px rgba(0, 196, 180, 0.5);
    background-color: #3a3a3a;
    color: #f8f9fa;
}

.form-control::placeholder {
    color: #bbb;
}

.btn-primary {
    background-color: #00c4b4;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #1a1a1a;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #009b8b;
}

.btn-outline-secondary {
    border: 1px solid #bbb;
    color: #f8f9fa;
    border-radius: 10px;
    padding: 10px 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #555;
    color: #f8f9fa;
}

.alert {
    border-radius: 10px;
    background-color: #ff6b6b;
    color: #1a1a1a;
}

.alert ul li {
    color: #1a1a1a;
}

h1 {
    font-weight: 700;
    color: #f8f9fa;
}
</style>

<div class="container mt-5">
<h1>Thêm sản phẩm mới</h1>

<form id="add-product-form">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/ptpm-mnm-2280603415/WebBanHang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
</div>
<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hàm để tải danh sách danh mục
        const loadCategories = async () => {
            try {
                const response = await fetch('/ptpm-mnm-2280603415/WebBanHang/api/category');
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const categories = await response.json();
                const categorySelect = document.getElementById('category_id');
                
                // Xóa các option cũ (nếu có) trước khi thêm
                categorySelect.innerHTML = '<option value="">-- Chọn danh mục --</option>';

                categories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            } catch (error) {
                console.error('Failed to load categories:', error);
                // Có thể hiển thị thông báo lỗi cho người dùng ở đây
            }
        };

        // Hàm để xử lý việc submit form
        const handleFormSubmit = async (event) => {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const jsonData = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/ptpm-mnm-2280603415/WebBanHang/api/product', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(jsonData)
                });

                const result = await response.json();

                // Kiểm tra HTTP status code để xác định thành công hay thất bại
                if (!response.ok) { // response.ok là true cho status 200-299
                    // Nếu có lỗi validation từ server (status 400)
                    if (result.errors) {
                        const errorMessages = Object.values(result.errors).join('\n');
                        alert('Thêm sản phẩm thất bại:\n' + errorMessages);
                    } else {
                        throw new Error(result.message || 'Lỗi không xác định từ server.');
                    }
                } else {
                    // Thành công (status 201)
                    alert(result.message || 'Thêm sản phẩm thành công!');
                    location.href = '/ptpm-mnm-2280603415/WebBanHang/Product';
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                alert('Đã xảy ra lỗi. Vui lòng thử lại.');
            }
        };

        // Tải danh mục khi trang được tải xong
        loadCategories();
        
        // Gán sự kiện cho form
        document.getElementById('add-product-form').addEventListener('submit', handleFormSubmit);
    });
</script>