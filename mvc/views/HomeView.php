<body>
    <div class="wrapper">
        <div class="containero">
           
            <div class="product-list">

            	<?php
            	if(!empty($data["data"])) 
            	foreach ($data["data"] as $item){
            		echo '<div class="product-item" ><a href="/products/index/'.$item["url"].'" >
                    <img src="/public/images/products/'.$item["color_type"].'/'.$item["url"].'/1/1/1.png" alt="Sản phẩm "><h5>
                    '.$item["title"].'</h5></a>
                   <p><b>$15.99</b></p>
                	 </div>';

            	}
            	else echo "No products";		
             
                ?>

      		</div>
        </div>
    </div>
</body>



