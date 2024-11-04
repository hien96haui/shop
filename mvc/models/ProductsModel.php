<?php
	/**
	 * 
	 */
	class ProductsModel extends DB
	{
		
		public function getProperties($product_id)
		{
			$qry = 'SELECT  color_type  FROM products WHERE url = "'.$product_id.'"';
			$result = $this->conn->query($qry);
			$temp='';
			if ($result->num_rows > 0) {
			    // Lấy dữ liệu từng dòng

			    while ($row = $result->fetch_assoc()) {

			        $temp = $row["color_type"];
			    }
			}
			$kq["color_type"] =  $temp;
			$kq["product_id"] = $product_id;
			// var_dump($data);
			return $kq;
		}

	

	}