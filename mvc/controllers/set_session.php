<?php
	class set_session extends Controller {

		function index($id=''){
			$home = $this->model("set_sessionModel");
			$data = $home->getProperties('');
			$home = $this->view('set_sessionView',["data"=>$data]);
		
		}
	

	}
