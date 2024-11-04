<?php
	class Products extends Controller {

		function index($id=''){
			$home = $this->model("ProductsModel");
			$data = $home->getProperties($id);
			$home = $this->view('DefaultView',["view"=>"ProductsView","data"=>$data]);
		
		}
	

	}
