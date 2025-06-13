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

.product-image {
    max-width: 100px;
    border-radius: 10px;
    border: 1px solid #555;
    margin-top: 10px;
    display: block;
}

.image-preview {
    margin-top: 10px;
    text-align: center;
}

.custom-file-upload {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3a3a3a;
    border: 1px solid #555;
    border-radius: 10px;
    color: #f8f9fa;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.custom-file-upload:hover {
    background-color: #555;
}

#image {
    display: none;
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Sửa sản phẩm</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm p-4">
        <form id="edit-product-form" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?php echo $product->id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Giá:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Danh mục:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                <a href="/ptpm-mnm-2280603415/WebBanHang/Product/list" class="btn btn-outline-secondary px-4">Quay lại danh sách sản phẩm</a>
            </div>
        </form>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>
<script> 
document.addEventListener("DOMContentLoaded", function () {
    const productId = <?= json_encode($product->id) ?>;

    fetch(`/ptpm-mnm-2280603415/WebBanHang/api/product/${productId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
            document.getElementById('price').value = data.price;
            document.getElementById('category_id').value = data.category_id;
        });

    document.getElementById('edit-product-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        fetch(`/ptpm-mnm-2280603415/WebBanHang/api/product/${jsonData.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product updated successfully') {
                location.href = '/ptpm-mnm-2280603415/WebBanHang/Product';
            } else if (data.errors) {
                alert("Lỗi: " + data.errors.join(', '));
            } else {
                alert('Cập nhật sản phẩm thất bại');
            }
        });
    });
});

</script> 