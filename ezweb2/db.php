<?php

class DB{

    public function __construct(){
        $servername = "localhost";
        $db_username = "root";
        $db_password = "Dino@209";
        $db_name = "Dino";
        $this->conn = new mysqli($servername ,$db_username, $db_password, $db_name);
        if ($this->conn->connect_errno) {
		var_dump($this->conn);
            die("connnet database failed!".$conn->connect_errno);
        }

    }
    
}


?>
