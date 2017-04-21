<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
   
	<link rel="stylesheet" href="style.css">

  </head>
  <body>
    <?php
			require_once __DIR__.'/db/dbFunction.php'; 
			require_once __DIR__.'/Objects/User.class.php'; 
       if (isset($_POST["id"]) && isset($_POST["psw"]) 
          && trim($_POST["id"]) !='' && trim($_POST["psw"]) != ''  ){
            try {
				$db = new dbFunction();
				$user = new User();
                $user->set_id(trim(strtolower($_POST["id"])));
				$psw = ($_POST["psw"]);
				$siteSalt  = "ulstudentpapers";
                $saltedHash = hash('sha256', $psw.$siteSalt);	
                $user->set_password($saltedHash);		
                $result = $db->login($user);
				
                if (!is_null($result)) {
                    header("Location:./index.php");
					printf("succesfully logged in");
                    } else {
						printf("<h2> Password incorrect or account not found. </h2>");
                    }
            } catch (Exception $exception) {
                    printf("Connection error: %s", $exception->getMessage());
                    }
            }
        ?>  
  
	<div class="login-page">
  <div class="form">
    <form class="login-form" method="post">
      <input type="text" placeholder="Student or Staff ID" required="required" name="id"/>
      <input type="password" placeholder="Password" required="required" name="psw"/>
      <button type="submit" name="submit">login</button>
      <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
    </form>
  </div>
</div>
  </body>
 </html>