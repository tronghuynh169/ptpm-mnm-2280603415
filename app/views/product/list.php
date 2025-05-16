<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="/huynhkimtrong/Product/add">Thêm sản phẩm mới</a>
    <ul>
        <?php foreach ($products as $product): ?>
        <li>
            <h2><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Giá: <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="/huynhkimtrong/Product/edit/<?php echo $product->getID(); ?>">Sửa</a>
            <a href="/huynhkimtrong/Product/delete/<?php echo $product->getID(); ?>" 
            onclick="return confirm('Bạn có chắc muốn xoá sản phảm này?')">
                Xoá
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>