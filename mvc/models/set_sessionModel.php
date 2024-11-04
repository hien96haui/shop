<?php
	/**
	 * 
	 */
	class set_sessionModel extends DB
	{
		
		public function getProperties($product_id='')
		{	
			// $value = $_SESSION["carts"];
			// $str = '';
			// $i=0;
			// foreach ($_SESSION['carts'] as $p => $q) {
			// 		// $arr = explode("/", $p);
			// 		// $str = $str.$arr[1]." ";
			// 		$type[$i]=$this->getType();
			// 		// $a["colors"][$i] = getColor();
			// 		// $a["getSize"][$i]  getSize();
			// 		$i++;
			// }
			// return $type;
			return 1;
		}
		function getType()
		{
			return "T-shirt";
		}
		function getColor()
		{
			return "Black";
		}
		function getSize()
		{
			return "Black";
		}
		

	}