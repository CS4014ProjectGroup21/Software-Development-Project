<html><head>
		<title>Editorial by HTML5 UP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript"><!--
			var wordLen = 4; // Maximum word length
			 function checkWordLen(obj){
			  var len = obj.value.split(/[\s]+/);
			   if(len.length > wordLen){
				   alert("You cannot put more than "+wordLen+" tags.");
				   obj.oldValue = obj.value!=obj.oldValue?obj.value:obj.oldValue;
				   obj.value = obj.oldValue?obj.oldValue:"";
				   return false;
			   }
			 return true;
		   };
		</script>
	</head>
	<body>
	<?php
		session_start();
		require_once __DIR__.'/db/dbFunction.php'; 
		require_once __DIR__.'/Task.class.php';
		$db = new dbFunction();
		if (isset($_POST) && count ($_POST) > 0) {
			//$taskTitle = $_POST("taskTitle");
			//$taskType = $_POST("taskType");
			//$description = $_POST("description");
			//$tags = $_POST("tags");
			//$numPages = $_POST("numPages");
			//$numWords = $_POST("numWords");
			//$fileFormat = $_POST("fileFormat");
			//$authorID = $_POST("id"); //$authorID = $user->get_id();
			//$taskClaimDeadline = $_POST("claimDate");
			//$taskCompletionDeadline = $_POST("completionDate");
			
			
			$task->set_title($_POST("taskTitle"));
			$task->set_type($_POST("taskType"));
			$task->set_description($_POST("description"));
			$task->set_tags($_POST("tags"));
			$task->set_numPages($_POST("numPages"));
			$task->set_numWords($_POST("numWords"));
			$task->set_fileFormat($_POST("fileFormat"));
			$task->set_authorID($_POST("id")); //$task->set_authorID($user->get_id());
			$task->set_claimDate(date('Y-m-d', strtotime($_POST("claimDate"))));
			$task->set_completionDate(date('Y-m-d', strtotime($_POST("completionDate"))));
			
			$result = $db->createTask($task);
			if($result){
				$_SESSION["user"] = $user;
				header( "Location: http://testweb3.csisad.ul.campus/modules/cs4014/15178536/Project2/index.php" );
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
									<a href="index.html" class="logo"><strong>Editorial</strong> by HTML5 UP</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									
									
								</section>

							
								

							<section id="createTask">
    <form method="get">
		<input name="taskTitle" placeholder="Task Title" type="text" id="taskTitle" maxlength="15" required="required">
		<span id="resTaskTitle"></span>
		<select name="taskType" placeholder="Task type"><option value="" disabled="" selected="">Select task type </option>
			<option value="MSc thesis">MSc thesis</option>
			<option value="BSc dissertation">BSc dissertation</option>
			<option value="Project report">Project report</option>
			<option value="PhD thesis">PhD thesis</option>
			<option value="Assignment">Assignment</option>
			<option value="Conference Research Paper">Conference Research Paper</option>
		</select>
		<textarea name="description" rows="10" cols="30">Please provide a brief description.</textarea>
		<fieldset>
			<textarea rows="1" cols="30" name="tags" placeholder="Tags" onchange="checkWordLen(this);"></textarea>
		</fieldset>
		<input type="number" placeholder=" Number of pages" name="numPages" required="required">
		<input type="number" placeholder=" Number of words" name="numWords" required="required">
<select name="fileFormat">
 <option value="" disabled="" selected="">Select file format </option>
			<option value="docx">.docx</option>
			<option value="doc">.doc</option>
			<option value="tex">.tex</option>
			<option value="pdf">.pdf</option>
		</select>
Sample of the document(approx. 3 pages in .pdf format) <input type="file" name="sampleOfDocument" accept=".pdf" required="required">
<br>Deadline for claiming task:<br><input type="date" name="claimDate">
<br>Deadline for completion:<br><input type="date" name="completionDate">
<br><input type="submit">
  



	</form> 

</section>
  
								

						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	
</body></html>