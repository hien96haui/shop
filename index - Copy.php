<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chia Màn Hình</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: row;
        }

        .section {
            flex: 1; /* Chiếm đều không gian */
            padding: 20px;
            box-sizing: border-box;
        }

        .section1 {
            background-color: #ffcccb; /* Màu nền cho phần 1 */
        }

        .section2 {
            background-color: #add8e6; /* Màu nền cho phần 2 */
        }

        .section3 {
            background-color: #90ee90; /* Màu nền cho phần 3 */
        }

        /* Responsive cho điện thoại */
        @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Cuộn theo chiều dọc */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section section1">Phần 1</div>
        <div class="section section2">Phần 2</div>
        <div class="section section3">Phần 3</div>
    </div>
</body>
</html>
