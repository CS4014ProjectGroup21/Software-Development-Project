<?php  
require_once 'dbConnect.php';  
//require_once 'User.class.php';  
session_start();  
    class dbFunction {  
		
		private $db;
		
        function __construct() {  
              
            // connecting to database  
            $this->db = new dbConnect();
        }  
        // destructor  
        function __destruct() {  
              
        }
		
		function registerUser($user){
			//$string = $user->get_string();
			$conn = $this->db->get_conn();
			$insertSubject = mysqli_query($conn, "INSERT INTO subject (Major_Subject) SELECT * FROM (SELECT '".$user->get_subject()."') AS tmp WHERE NOT EXISTS ( SELECT Major_Subject FROM subject WHERE Major_Subject = '".$user->get_subject()."')");
			$get_subject_id = mysqli_query($conn, "SELECT * FROM subject WHERE Major_Subject = '".$user->get_subject()."'");
			$obj = mysqli_fetch_object($get_subject_id);
			$subject_id = $obj->Subject_id;
			echo "works here";
			$query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = '".$user->get_id()."'");
			$num_rows = mysqli_num_rows($query);
			if($num_rows > 0) {
				echo "A user account already exists with this Student/Staff ID! Please try again!";
				$addUser = null;
			}
			//echo $subject_id;
			//$query = mysqli_query($conn, "INSERT INTO `users` (`first_name`, `last_name`, `User_id`, `email`, `password`,`Date_of_Birth`,`subject_id`) VALUES ('Pa', 'L', '15', 'pa@studentmail.ul.ie', '0000', '2017-04-20', '".$subject_id."')");
			else {
			$addUser = mysqli_query($conn, "INSERT INTO users (first_name, last_name, email, User_id, password, Date_of_Birth, Subject_id) VALUES ('".$user->get_name()."', '".$user->get_surname()."', '".$user->get_email()."', '".$user->get_id()."', '".$user->get_password()."', '".$user->get_dob()."', '".$subject_id."')");
			}
			//$query = mysqli_query($conn, "SELECT * FROM users");
			return $addUser;
		}
		
		function login($user){
			$conn = $this->db->get_conn();
			$query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = '".$user->get_id()."' AND password = '".$user->get_password()."'" );
			//SELECT * FROM `users` WHERE `User_id` = "1111" AND `password` = "0000";
			$num_rows = mysqli_num_rows($query);
			if($num_rows > 0) {
				echo "Succesfully logged in.";
			}
			else {
				echo "The username or password does not exist!";
				$query = null;
			}
			return $query;
		}
		
		function createTask($task) {
			$conn = $this->db->get_conn();
			$query = mysqli_query($conn, "INSERT INTO tasks ()");
		}
	}	
?>		