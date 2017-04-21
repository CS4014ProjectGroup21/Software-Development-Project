<html><head>
		<title>Elements - Editorial by HTML5 UP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="stylesheet" href="assets/css/main.css">
	</head>
	<body>
	    <?php
			require_once __DIR__.'/db/dbFunction.php'; 
			require_once __DIR__.'/Objects/User.class.php'; 
			$db = new dbFunction();
            if (isset($_POST) && count ($_POST) > 0) {
				$id = htmlspecialchars(ucfirst(trim($_POST["id"])));
                $name = htmlspecialchars(ucfirst(trim($_POST["name"])));
                $surname = htmlspecialchars(ucfirst(trim($_POST["surname"])));
                $email = trim(strtolower($_POST["email"]));
                $psw = $_POST["psw"];
                $psw2 = $_POST["psw2"];
				$dateString = ($_POST["bday"]);
				$dob = date('Y-m-d', strtotime($dateString));
				$subject = (string)($_POST['subject']);
					
                //check wheter user/email alerady exists
                    
                if (!($psw === $psw2)) { //in case Javascript is disabled.
                    printf("<h2> Passwords do not match. </h2>");
                    } else {
						
                        $siteSalt  = "ulstudentpapers";
                        $saltedHash = hash('sha256', $psw.$siteSalt);	
                            
                        $user = new User();
						$user->set_id($id);
                        $user->set_name($name);
                        $user->set_surname($surname);
						$user->set_dob($dob);
                        $user->set_email($email);
                        $user->set_password($saltedHash);
						$user->set_subject($subject);
						$result = $db->registerUser($user);
						if($result) {
							echo "Account created!";
							header( "Location: http://testweb3.csisad.ul.campus/modules/cs4014/15178536/Project2/login.php" );
						}
                    }
                    
			}
        ?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>Registration</strong> form</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Content -->
								<form method="post">
								<br>
									Student ID: <input type="text" name="id" required="required"><br>
									Name: <input type="text" name="name" required="required"><br>
									Surname: <input type="text" name="surname" required="required"><br>
									E-mail: <input type="email" name="email" required="required"><br>
									Major subject stream: <br>
									<label for="subject">
									<select name="subject" required="required">
										<option value="" disabled="" selected="">Select one</option>
										<option value="English">English</option>
										<option value="Mathematics">Mathematics</option>
										<option value="Information Technology">Information Technology</option>
										<option value="History">History</option>
										<option value="Politics">Politics</option>
									</select></label><br>
									Password: <input type="password" name="psw" required="required"><br>
									Re-enter Password: <input type="password" name="psw2" required="required"><br>
									Date of Birth: <br><input type="date" name="bday" required="required"><br><br>
											
									<br>
									<input type="submit" value="Submit">
									<input type="reset">
								</form>
								

						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	
</body>
</html>