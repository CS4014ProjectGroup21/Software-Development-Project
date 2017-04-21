<?php
	require_once 'dbConnect.php';  

	session_start();  
    class banUser {  
		
		private $db;
		private $bannedEmail;
		
        function __construct() {  
              
            // connecting to database  
            $this->db = new dbConnect();
			$this->bannedEmail = $_POST("bannedEmail");
			ban();
        }  
        // destructor  
        function __destruct() {  
              
        }
		
		function ban(){
			$conn = $this->db->get_conn();
			$query = mysqli_query($conn, "INSERT INTO banned (Banned_email) VALUES ('.$this->bannedEmail.')");
			if($query) {
				echo "User got banned!";
			}
		}
		
?>