<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm Áo Thun</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="wrapper">
        <div class="container">
           <div class="image-small">
                <img src="https://img.thesitebase.net/10611/10611706/products/ver_1/14eap3a5hm2c0kwlm-d5VfX-1712909388e322b2b491.jpg" onclick="updateMainImage(0)">
                <img src="https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c518fu-dyUfl-1712909397dca7267a61.jpg" alt="Mockup 2" onclick="updateMainImage(1)">
                <img src="https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c51a0x-xhX5L-17129095062272490e4f.jpg" alt="Mockup 3" onclick="updateMainImage(2)">
            </div>


            <div class="image-main">
                <button class="slider-button left" onclick="changeImage(-1)">
                    <img src="https://img.icons8.com/ios-filled/50/000000/chevron-left.png" alt="Left" />
                </button>
                <img id="mainImage" src="https://img.thesitebase.net/10611/10611706/products/ver_1/14eap3a5hm2c0kwlm-d5VfX-1712909388e322b2b491.jpg" alt="Mockup Chính">
                <button class="slider-button right" onclick="changeImage(1)">
                    <img src="https://img.icons8.com/ios-filled/50/000000/chevron-right.png" alt="Right" />
                </button>
            </div>

            <div class="details">
                <h2 id="productName">Áo Thun Màu Trắng lz</h2>
                <p class="price" id="productPrice">250.000 VNĐ</p>
                <p id="productDescription">Mô tả chi tiết về sản phẩm áo thun màu trắng.</p>
                <div class="attributes">
                    <div class="types">
                        <label>Loại Áo:</label>
                        <select id="typeOptions" onchange="updateOptions(this.value)">
                          
                            <option value="T-shirt">T-shirt</option>
                            <option value="Hoodie">Hoodie</option>
                        </select>
                    </div>
                    <div class="colors">
                        <label>Màu:</label>
                        <select id="colorOptions" onchange="updateColors()">
                             <option value="white">Trắng</option>
                            <option value="lime">Vàng chanh</option>
                        </select>
                    </div>
                    <div class="sizes">
                        <label>Size:</label>
                        <select id="sizeOptions" onchange="updateSizes(this.value)">
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                            <option value="4XL">4XL</option>
                            <option value="5XL">5XL</option>
                        </select>
                    </div>
                </div>
                <button class="button">Mua Hàng</button>
            </div>
        </div>
    </div>
</body>
</html>
