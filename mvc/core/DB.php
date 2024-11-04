<?php
 
  	class DB
  	{	
  		  public $conn , $serverName = "localhost", $username ="root", $password = "mysql" , $dbName ="demo"; 
        function __construct(){
    
        $this->conn = mysqli_connect($this->serverName, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbName);
    }
    }

?>
