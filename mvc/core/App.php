<?php
 
  	class App
  	{	
  		protected $controllers="Home", $action="index",$params=[];	
  		
  		function __construct()
  		{
  			 $this->urlProcess();
  			 $this->handleController();
  		}
  		function urlProcess(){
  			if(isset($_GET['url'])){
  				$arr = explode('/',filter_var(trim($_GET['url'])));
  				if(!empty($arr[0])){
  					$this->controllers = ucfirst($arr[0]);
  					unset($arr[0]);

  				}
  				if(!empty($arr[1])){
  					$this->action = ucfirst($arr[1]);
  					unset($arr[1]);
  				}
  				$this->params = array_values($arr);

  				//print_r($this->params);
  				
  			}
  		}
  		function handleController()
  		{ 
  			if(file_exists('./mvc/controllers/'.$this->controllers.'.php')){
  				require_once('./mvc/controllers/'.$this->controllers.'.php');
  				$app = new $this->controllers;
  				if(method_exists($this->controllers, $this->action))
  				{
  					call_user_func_array([$app,$this->action], $this->params);
  				}
  			}else
  			 echo "404 not found";;
  		}
  	}
?>
