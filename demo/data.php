<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>Dialog trên Điện Thoại</title>
    <style>
       
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Ví dụ Giao Diện Dialog</h1>
        <p>Nội dung trang ở đây. Cuộn xuống để xem thêm.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum. Suspendisse potenti. Proin non diam malesuada, sodales eros in, interdum purus.</p>
        <p>...</p>

        <button id="openDialog">Mở Dialog</button>

        <div class="dialog-container" id="myDialog">
            <div class="success-message" id="successMessage">
                <span id="successText">Đặt hàng thành công</span>
                <button class="close-button" id="closeSuccessMessage">x</button>
            </div>
            <div class="dialog-header">
                <span>Đây là một Dialog</span>
                <button class="close-button" id="closeDialogHeader" style="opacity: 0;">x</button>
            </div>
            <div class="dialog-content" id="dialogContent">
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
                <p>Bạn có muốn tiếp tục?</p>
            </div>
            <button id="closeDialog">Đóng</button>
        </div>

        <script>
            const dialog = document.getElementById('myDialog');
            const openDialogButton = document.getElementById('openDialog');
            const closeDialogButton = document.getElementById('closeDialog');
            const closeSuccessMessageButton = document.getElementById('closeSuccessMessage');
            const closeDialogHeaderButton = document.getElementById('closeDialogHeader');
            const successMessage = document.getElementById('successMessage');
            const dialogContent = document.getElementById('dialogContent');

            openDialogButton.addEventListener('click', () => {
                dialog.classList.add('show'); 
                document.body.style.overflow = 'hidden'; 
                successMessage.style.opacity = '1'; // Hiện thông báo khi mở dialog
                closeDialogHeaderButton.style.opacity = '0'; // Ẩn nút "x" của header khi mở
            });

            closeDialogButton.addEventListener('click', () => {
                dialog.classList.remove('show'); 
                document.body.style.overflow = 'auto'; 
            });

            closeSuccessMessageButton.addEventListener('click', () => {
                successMessage.style.opacity = '0'; 
                successMessage.style.height = '0'; // Ẩn chiều cao của thông báo
            });

            closeDialogHeaderButton.addEventListener('click', () => {
                dialog.classList.remove('show'); 
                document.body.style.overflow = 'auto'; 
            });

            let lastScrollTop = 0; 

            dialogContent.addEventListener('scroll', () => {
                const scrollTop = dialogContent.scrollTop;

                if (scrollTop > 0) {
                    successMessage.style.opacity = '0'; // Ẩn thông báo khi cuộn xuống
                    successMessage.style.height = '0'; // Ẩn chiều cao của thông báo
                    closeDialogHeaderButton.style.opacity = '1'; // Hiện nút "x" của header khi cuộn
                } else {
                    successMessage.style.opacity = '1'; // Hiện thông báo khi về đầu
                    successMessage.style.height = 'auto'; // Đặt chiều cao về tự động
                    closeDialogHeaderButton.style.opacity = '0'; // Ẩn nút "x" của header
                }

                lastScrollTop = scrollTop; 
            });

            // Đóng dialog khi nhấn nút "x" bên cạnh "Đặt hàng thành công"
            closeSuccessMessageButton.addEventListener('click', () => {
                dialog.classList.remove('show'); 
                document.body.style.overflow = 'auto'; 
            });
        </script>
    </div>
</body>
</html>
