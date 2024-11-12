<?php
	class set_sessionModel extends DB
	{
		public function getProperties($product_id='')
		{	
			if(!isset($_POST["post_type"])){
				$type["getTypeList"] = $this->getTypeList();
				$type["value"] = $this->getType($_POST["value"]);
				$type["getColorList"] = $this->getColorList($_POST["value"]);		
				$type["colors"] = [];
				$type[""] = [];
				$i=0;
				if(isset($_SESSION["carts"])){
					$value = $_SESSION["carts"];
					foreach ($_SESSION['carts'] as $p => $q) {
						$type["colors"][$i]=$this->getColorList($p);
						$type["sizes"][$i]=$this->getSizeList();
						$i++;
					}
				}
				if(!isset($_SESSION["carts"][$type["value"]])){
					$type["colors"][$i]=$this->getColorList($_POST["value"]);//.$this->getColor().$this->getSize();
					$type["sizes"][$i]=$this->getSizeList();
				}
				return $type;
			} else{
				// return 21;//
				if($_POST["post_type"]=="1"){
					$colors = $this->getColorList($_POST["productId"]);
					return $colors;
				}
				if($_POST["post_type"]=="2"){
					$sizes = $this->getSizeList($_POST["productId"]);
					return $sizes;
				}
				
				return 1;
			}
			
			
		}
		function getTypeList(){
			$sql = 'SELECT distinct title from procduct_type';
	        $result = $this->conn->query($sql);
	        $data=[];
		        while ($row = $result->fetch_assoc()) {
		            $data[] = $row['title']; // Thêm từng dòng vào mảng
		        }
	        return $data; // Trả về mảng
		}
		function getColorList($p=""){
			$styles_id = substr($p,-5,1);
			$color_type = substr($p,0,1);
			$sql = 'SELECT DISTINCT procduct_color.group_id, procduct_color.Titile FROM product_properties join procduct_color on  product_properties.group_id = procduct_color.color_group and product_properties.color = procduct_color.group_id where product_properties.type="'.$styles_id.'" and procduct_color.color_group="'.$color_type.'"';
			$result = $this->conn->query($sql);
			$data=[];
		        while ($row = $result->fetch_assoc()) {
		            $data[] = $row["Titile"]; // Thêm từng dòng vào mảng
		        }
	        return $data;
		}
		function getSizeList($p=""){
			$styles_id = substr($p,-5,1);
			$colorselect = substr($p,-3,1);
			$color_type = substr($p,0,1);
			$sql ='SELECT DISTINCT size.id, size.Title FROM product_properties join size on product_properties.size =size.id WHERE product_properties.type ="'.$styles_id.'" and product_properties.color = "'.$colorselect.'" and product_properties.group_id="'.$color_type.'"';
			$result = $this->conn->query($sql);
			$data=[];
			$data1=[];
		        while ($row = $result->fetch_assoc()) {
		            $data[] = $row["Title"]; // Thêm từng dòng vào mảng
		        }
	        return $data;
	        $data1[0]=$p;
	        return $data; // Trả về mảng
		}
		function getType($value)
		{
			$str = substr($value, -5, 1);
			$sql ='SELECT DISTINCT procduct_type.id,procduct_type.title FROM product_properties join procduct_type on product_properties.type = procduct_type.id WHERE product_properties.type ="'.$str.'"';
			$result = $this->conn->query($sql);
		        while ($row = $result->fetch_assoc()) {
		            return $row["title"];	
		        }
		    return $value;
		}
		function getColor()
		{
			return "Black";
		}
		function getSize()
		{
			return "M";
		}	

	}