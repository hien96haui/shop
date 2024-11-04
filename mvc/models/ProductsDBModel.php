<?php
	/**
	 * 
	 */
	class ProductsDBModel extends DB{
		
		public function getProperties($styles_id='',$color_type='')
		{
			$sql = 'SELECT DISTINCT procduct_color.group_id, procduct_color.Titile FROM product_properties join procduct_color on  product_properties.group_id = procduct_color.color_group and product_properties.color = procduct_color.group_id where product_properties.type="'.$styles_id.'" and procduct_color.color_group="'.$color_type.'"';
	        $result = $this->conn->query($sql);
	        $data=[];

		        while ($row = $result->fetch_assoc()) {
		            $data[] = $row; // Thêm từng dòng vào mảng
		        }

	        return $data; // Trả về mảng
		}
		public function getSizes($styles_id='',$color_id='')
		{
			
			$sql = "SELECT DISTINCT size.id, size.Title FROM product_properties join size on product_properties.size =size.id WHERE product_properties.type =".$styles_id." and product_properties.color = ".$color_id;
	        $result = $this->conn->query($sql);
	        $data=[];

		        while ($row = $result->fetch_assoc()) {
		            $data[] = $row; // Thêm từng dòng vào mảng
		        }

	        return $data; // Trả về mảng
		}
	

	}