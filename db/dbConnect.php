<?php  
    class dbConnect {  
	
		private $conn;
	
        function __construct() {  
            $this->conn = mysqli_connect("localhost", "group21", "back-LATE-WALL-drop", "group21");   
            if(mysqli_connect_errno())// testing the connection  
            {  
                echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
            }
            return $this->conn;  
        }  
        public function Close(){  
            mysql_close();  
        }  
		
		function get_conn() {
			return $this->conn;
		}
	
    }  
?> 