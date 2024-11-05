<?php
	/**
	 * 
	 */
	class set_sessionModel extends DB
	{
		
		public function getProperties($product_id='')
		{	
			$type["value"] = $_POST["value"]."dsdas";
			$type["data"] = [];
			if(isset($_SESSION["carts"])){
				$value = $_SESSION["carts"];
				$i=0;
				foreach ($_SESSION['carts'] as $p => $q) {
					$type["data"][$i]=$this->getType().$this->getColor().$this->getSize();		
					$i++;
				}
			}
				return $type;
			
			// return 1;
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
			return "M";
		}
		

	}