<?php
	class ProductsDB extends Controller {

		function index($id=''){
			$home = $this->model("ProductsDBModel");
			if(!empty($_GET['color_id'])){
			
				$type = $_GET['styles_id'];	
				$color = $_GET['color_id'];
				$data = $home->getSizes($type,$color);
			}
			else {
					if(!empty($_GET['styles_id'])){
					$type = $_GET['styles_id'];	
					$color_type =$_GET['color_type'];	
					$data = $home->getProperties($type,$color_type);
				}
				// else $data = $home->getProperties(0);
			}	
			
			
			$home = $this->view('ProductsDBView',["data"=>$data]);
		
		}
	

	}
