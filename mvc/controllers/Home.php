<?php
	class Home extends Controller {

		function index($id=''){
			$home = $this->model("HomeModel");
			$data = $home->getName($this->getPage($id));
		
			$home = $this->view('DefaultView',["view"=>"HomeView","data"=>$data]);
		}
		private function getPage($id){
			if(empty($id))	return 1;
			if(is_numeric($id))
			{
				return $id;
			}
			else return 0;
		}

	}
