<?php
session_start();

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity; // Tăng số lượng
    } else {
        $_SESSION['cart'][$productId] = $quantity; // Thêm sản phẩm mới
    }
}

// Xử lý thêm sản phẩm vào giỏ hàng khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    addToCart($productId, $quantity);
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add to Cart Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px; /* Tăng chiều rộng tối đa */
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product {
            text-align: center;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .quantity {
            width: 50px;
            margin: 10px 0;
        }
        .add-to-cart {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .add-to-cart:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sản phẩm</h1>
        <div class="product">
            <img src="product.jpg" alt="Sản phẩm" class="product-image">
            <h2>Tên sản phẩm</h2>
            <p>Giá: <span class="price">100.000 VNĐ</span></p>
            <form method="post">
                <input type="hidden" name="product_id" value="1"> <!-- ID sản phẩm -->
                <input type="number" name="quantity" value="1" min="1" class="quantity">
                <button type="submit" name="add_to_cart" class="add-to-cart">Thêm vào giỏ</button>
            </form>
        </div>
        
        <h2>Giỏ hàng</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                    <li>Sản phẩm ID: <?php echo $productId; ?>, Số lượng: <?php echo $quantity; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
    </div>
</body>
</html>
