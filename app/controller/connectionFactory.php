<?php
    
    class ConnectionFactory{
        
        private $conn;
        
        function __construct(){
            
            include_once '../../../configs/server.php';
            
            $this->conn = new mysqli(Host, User, Password, DataBase);
            
            if (!$this->conn) {
                die("Connection failed: ".mysqli_connect_error());
                echo "não conectou";
            }
            
            $this->conn->set_charset("utf8");
        }
        
        public function getConnection(){
            
            return $this->conn;
        }
    } 
    
?>