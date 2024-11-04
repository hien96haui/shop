<?php
    $product_id = $data["data"]["product_id"];
    $color_type = $data["data"]["color_type"];  
    // $b = $_SESSION['carts'];

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
        // var color_type= "<?php echo $data["data"]["color_type"] ?>";
        //  var product_id= "<?php echo $data["data"]["product_id"] ?>";
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
            // console.log("sda");
             $('#productPrice').empty().append('300.000');
        });
         $('#atcbtn').click(function() {
           
            // console.log(product_id);
            // const value = $('#quanlity').val();
            const typeOptions = $('#typeOptions').val();
            const colorOptions = $('#colorOptions').val();
            const sizeOptions = $('#sizeOptions').val();
            const value = color_type+"/"+product_id+"/" +typeOptions +"/" + colorOptions +"/" +sizeOptions;
             // console.log(value);
            const quanlity = $('#quanlity').val();
            // console.log(quanlity);
             $.ajax({
                    url: '/set_session',
                    type: 'POST',
                    data: {value:value,quanlity:quanlity},
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            console.log("success");
                            // d=response.value;
                            // console.log(response);
                            // $('#product_type').text(response.product_type);
                            $('#dialogContent').html(response.value);
                            openDialog();
                            // alert('Session value set: ' + response.value);
                        } else {
                            // console.log("dsadsa");
                        }
                    },
                    error: function() {
                         console.log("error");
                    }
                });
            // console.log(value);
             // window.onload = openDialog;
             // setTimeout(openDialog, 1);
            // openDialog();
             // $('#productPrice').empty().append('300.000');
        });
    });
    



    function updateSmallMockup(id){
        // var color_type= "<?php echo $data["data"]["color_type"] ?>";
        //  var product_id= "<?php echo $data["data"]["product_id"] ?>";
        // console.log(color_type);
        updateMainImage(id,product_id,color_type);
    }
    function changeMockupImage(direction){
        // console.log("changeMockupImage  ");
        // var color_type= "<?php echo $data["data"]["color_type"] ?>";
        //  var product_id= "<?php echo $data["data"]["product_id"] ?>";
         // console.log(color_type);
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


                //  $.ajax({
                //     url: '/demo/get_session_value.php',
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //             b = response; // Gán giá trị cho biến b
                //             $('#dialogContent').find('#sessionValueB').text(b);
                //     },
                //     error: function () {
                //         console.error('Error fetching session value.');
                //     }
                // });


                 dialog.classList.add('show'); 
                // document.body.style.overflow = 'hidden'; 
                // successMessage.style.opacity = '1'; // Hiện thông báo khi mở dialog
                // closeDialogHeaderButton.style.opacity = '0'; // Ẩn nút "x" của header khi mở
            }
            // openDialogButton.addEventListener('click', () => {
            //     dialog.classList.add('show'); 
            //     document.body.style.overflow = 'hidden'; 
            //     successMessage.style.opacity = '1'; // Hiện thông báo khi mở dialog
            //     closeDialogHeaderButton.style.opacity = '0'; // Ẩn nút "x" của header khi mở
            // });

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
</body