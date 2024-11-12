<?php
    $product_id = $data["data"]["product_id"];
    $color_type = $data["data"]["color_type"];  
?>
<body>
 <div class="wrapper">

        <div class="container">
           <div class="image-small">
            <?php
                    for($i=0;$i<3;$i++)
                    {
                        echo '<img src="/public/images/products/'.$color_type.'/'.$product_id.'/1/1/'.($i+1).'.png" onclick="updateSmallMockup('.($i+1).')"> ';
                    }
                ?> 
            </div>
            <div class="image-main">
                <button class="slider-button left" onclick="changeMockupImage(-1)">
                    <img src="/public/images/images/chevron-left.png" alt="Left" />
                </button>
                <img id="mainImage" src="/public/images/products/<?php echo $color_type;?>/<?php echo $product_id;?>/1/1/1.png" alt="Mockup Chính">
                <button class="slider-button right" onclick="changeMockupImage(1)">
                    <img src="/public/images/images/chevron-right.png" alt="Right" />
                </button>
            </div>

            <div class="details">
                <h2 id="productName">Áo Thun Màu Trắng lz</h2>
                <p class="price" id="productPrice">250.000</p>
                <p id="productDescription">Mô tả chi tiết về sản phẩm áo thun màu trắng.</p>
                <!-- <form action="" method="GET"> -->
                    <div class="attributes">
                        <div class="types">
                            <label>Loại Áo:</label>
                            <select id="typeOptions" name="typeOptions">
                                <option value="1">T-shirt</option>
                                <option value="2">Hoodie</option>
                            </select>
                        </div>
                        <div class="colors">
                            <label>Màu:</label>
                            <select id="colorOptions" name="colorOptions">
                                <option value="1">White</option>
                            </select>
                        </div>
                        <div class="sizes" >
                            <label>Size:</label>
                            <select id="sizeOptions" name="sizeOptions">
                                <option value="0">Select</option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                            </select>
                        </div>
                     
                            
                      <p> Quanlity:</p>
                    </div>
                            <select id="quanlity" name="quanlity" style="width: 4em; height: 41px; margin-right: 5px;">
                            <?php for($i=1;$i<11;$i++)
                            echo '<option value="'.$i.'">'.$i.'</option>';
                            ?>
                            </select>
                    <button type="button" id="atcbtn" class="button">ADD TO CARD</button>
                     <div class="dialog-container" id="myDialog">
                        <div class="success-message" id="successMessage">
                            <span id="successText">Đặt hàng thành công</span>
                            <button class="close-button" id="closeSuccessMessage">x</button>
                        </div>
                        <div class="dialog-header">
                            <span>Đây là một Dialog</span>
                            <button class="close-button" id="closeDialogHeader" style="opacity: 0;">x</button>
                        </div>
                        <div class="dialog-content" id="dialogContent"></div>
                        <button id="closeDialog">Đóng</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <script>
     var color_type= "<?php echo $data["data"]["color_type"] ?>";
     var product_id= "<?php echo $data["data"]["product_id"] ?>";
    $(document).ready(function() {
        $('#typeOptions').change(function() {
            const typeId = $(this).val();
            if (typeId) {
                $.ajax({
                    url: '/productsdb',
                    type: 'GET',
                    data: { styles_id: typeId ,color_type:color_type},
                    dataType: 'json',
                    success: function(data) {
                        $('#colorOptions').empty().append('<option value="">-- Chọn --</option>');
                        $('#sizeOptions').empty().append('<option value="">-- Chọn --</option>');

                        data.forEach(function(item) {
                            $('#colorOptions').append(`<option value="${item.group_id}">${item.Titile}</option>`);
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching districts: ', textStatus, errorThrown);
                    }
                });
            } else {
                $('#colorOptions').empty().append('<option value="">-- Chọn --</option>');
                $('#sizeOptions').empty().append('<option value="">-- Chọn --</option>');
            }
            updateMockup(color_type,product_id,1);

        });

        $('#colorOptions').change(function() {
            const type = document.getElementById('typeOptions').value;
            const color = document.getElementById('colorOptions').value;
            
            if (color&&type) {

                $.ajax({
                    url: '/productsdb',
                    type: 'GET',
                    data: { styles_id:type, color_id: color ,color_type:color_type},
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#sizeOptions').empty().append('<option value="">-- Chọn --</option>');
                        data.forEach(function(item) {
                            $('#sizeOptions').append(`<option value="${item.id}">${item.Title}</option>`);
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // console.error('Error fetching sizes: ', textStatus, errorThrown);
                    }
                });
            } else {
                $('#sizeOptions').empty().append('<option value="">-- Chọn --</option>');
            }
            updateMockup(color_type,product_id,2);
        });
        $('#sizeOptions').change(function() {
             $('#productPrice').empty().append('300.000');
        });
        $(document).on('change', '.typeChange', function() {
            const typeSelected = $(this).val();
            const productId = $(this).data('product-id');
            let newProductId = replaceNthFromEnd(productId,5,typeSelected);
           
            // const value = color_type+"/"+product_id+"/" +typeOptions +"/" + colorOptions +"/" +sizeOptions;
            // const selectedData = $(this).find('option:selected').data('other'); 
            // console.log(newProductId);
           
            $.ajax({
                url: '/set_session',
                type: 'POST',
                data: {post_type:"1",productId:newProductId},
                dataType: 'json',
                success: function(response) {
                    // const colorSelect = $('.color-change[data-product-id="' + productId + '"]');
                    // colorSelect.empty();
                    // colorSelect.append('<option value="">-- Chọn Màu --</option>');
                    newProductId = replaceNthFromEnd(newProductId, 1,1);
                     newProductId = replaceNthFromEnd(newProductId, 3,1);
                    let imgStr = '<image style="width:100px; height:100px;" src="/public/images/products/'+newProductId+'.png">';
                    $('.imachange[data-product-id="' + productId + '"]').html(imgStr);
                    $('.color-change[data-product-id="' + productId + '"]').html('<option></option>'+response.value);
                    $('.size-change[data-product-id="' + productId + '"]').html('<option></option>');

                    console.log(response.value);  
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("error typeChange"); 
                }
            });
          });
        $(document).on('change', '.color-change', function() {
            const colorSelected = $(this).val();
            const productId = $(this).data('product-id');
            const typeOptions = $('.typeChange[data-product-id="' + productId + '"]').val();
            
           
            // const value = color_type+"/"+product_id+"/" +typeOptions +"/" + colorOptions +"/" +sizeOptions;
            // const selectedData = $(this).find('option:selected').data('other'); 
            // console.log(typeOptions);
            let newcolor = replaceNthFromEnd(productId,3,colorSelected);
            newcolor = replaceNthFromEnd(newcolor,5,typeOptions);
            console.log(newcolor);
            $.ajax({
                url: '/set_session',
                type: 'POST',
                data: {post_type:"2",productId:newcolor},
                dataType: 'json',
                success: function(response) {
                    // const colorSelect = $('.color-change[data-product-id="' + productId + '"]');
                    // colorSelect.empty();
                    // colorSelect.append('<option value="">-- Chọn Màu --</option>');
                    // newProductId = replaceNthFromEnd(newProductId, 1,1);
                    //  newProductId = replaceNthFromEnd(newProductId, 3,1);
                    newcolor = replaceNthFromEnd(newcolor,1,"1");
                    let imgStr = '<image style="width:100px; height:100px;" src="/public/images/products/'+newcolor+'.png">';
                    $('.imachange[data-product-id="' + productId + '"]').html(imgStr);
                    // $('.color-change[data-product-id="' + productId + '"]').html(response.value);
                    $('.size-change[data-product-id="' + productId + '"]').html(response.value);

                    console.log(response.value);  
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("error typeChange"); 
                }
            });
          });
        $(document).on('change', '#quanlilyChange', function() {
            const selectedData = $(this).find('option:selected').data('other'); 
             
            const quanlity = $(this).val();
            $.ajax({
                url: '/set_session',
                type: 'POST',
                data: {post_type:"3",value:selectedData,quanlity:quanlity},
                dataType: 'json',
                success: function(response) {
                    console.log("success typeChange");      
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("error typeChange"); 
                }
            });
          });

        $('#atcbtn').click(function() {
            const typeOptions = $('#typeOptions').val();
            const colorOptions = $('#colorOptions').val();
            const sizeOptions = $('#sizeOptions').val();
            const value = color_type+"/"+product_id+"/" +typeOptions +"/" + colorOptions +"/" +sizeOptions;
            const quanlity = $('#quanlity').val();
             $.ajax({
                url: '/set_session',
                type: 'POST',
                data: {value:value,quanlity:quanlity},
                dataType: 'json',
                success: function(response) {
                    $('#dialogContent').html(response.value);
                    openDialog();
                },
                error: function() {
                     console.log("error");
                }
            });
        });
    });
    function updateSmallMockup(id){
        updateMainImage(id,product_id,color_type);
    }
    function changeMockupImage(direction){
        changeImage(direction,product_id,color_type);
    }
    // Sự kiện vuốt
    let touchstartX = 0;
    let touchendX = 0;
    const mainImageDiv = document.querySelector('.image-main');
    mainImageDiv.addEventListener('touchstart', (event) => {
        touchstartX = event.changedTouches[0].screenX;
    });

    mainImageDiv.addEventListener('touchend', (event) => {
        touchendX = event.changedTouches[0].screenX;
        handleSwipe(product_id,color_type);
    });
    function replaceNthFromEnd(str, n, replacement) {
        let arr = str.split("");  // Chuyển chuỗi thành mảng ký tự
        let indexFromEnd = arr.length - n;

        // Kiểm tra nếu n hợp lệ
        if (indexFromEnd < 0 || indexFromEnd >= arr.length) {
            return str;  // Nếu n không hợp lệ, trả về chuỗi gốc
        }

        // Thay thế ký tự tại vị trí n từ dưới lên
        arr[indexFromEnd] = replacement;

        // Kết hợp lại thành chuỗi và trả về
        return arr.join("");
    }
    </script>
    <script>
            const dialog = document.getElementById('myDialog');
            const openDialogButton = document.getElementById('openDialog');
            const closeDialogButton = document.getElementById('closeDialog');
            const closeSuccessMessageButton = document.getElementById('closeSuccessMessage');
            const closeDialogHeaderButton = document.getElementById('closeDialogHeader');
            const successMessage = document.getElementById('successMessage');
            const dialogContent = document.getElementById('dialogContent');
            function openDialog(){
                 dialog.classList.add('show'); 
                // document.body.style.overflow = 'hidden'; 
                // successMessage.style.opacity = '1'; // Hiện thông báo khi mở dialog
                // closeDialogHeaderButton.style.opacity = '0'; // Ẩn nút "x" của header khi mở
            }    
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
</body>