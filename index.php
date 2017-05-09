<?php
	$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true: false;
	$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true: false;
	session_start();
	// if username and password were saved in cookie, check them
    if (isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
    {
		$_SESSION["authenticated"] = TRUE;

		// re-save username and, ack, password in cookies for another week
		setcookie("username", $_COOKIE["username"], time() + 21600);
		setcookie("password", $_COOKIE["password"], time() + 21600);
					
		// redirect user to home page, using absolute path, per
		// http://us2.php.net/manual/en/function.header.php
		$host = $_SERVER["HTTP_HOST"];
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: http://$host$path/fullindex.php");
		exit;
    }
	
	if(isset($_POST['username']) && isset($_POST['password']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$dbc=mysqli_connect("localhost", "$username", "$password", "formmanagement") or die ("Error logging into database...Redirecting to home page.<script>setTimeout(function() {window.location.href='http://forms.sampsoncc.edu'}, '5000');</script>");
			$query="SELECT * FROM members WHERE username='$username' and password='$password'";
			$result = mysqli_query($dbc, $query) or die ('Error validating username/password in database.<br>' . mysqli_error($dbc));
			$count=mysqli_num_rows($result);
			if($count==1)
			{
				setcookie("username", "$username", time()+21600);
				setcookie("password", "$password", time()+21600);
				$_COOKIE['username']=$username;
				$_COOKIE['password']=$password;
				header("location:fullindex.php");
				exit;
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC Form Management and Electronic Archival System</title>
		<link rel="stylesheet" href="css/inputstyle.css">
		<link rel="stylesheet" href="css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="js/date.js"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<link href="css/lightbox.css" rel="stylesheet" type="text/css">
		<meta name="author" content="W. Darell Matthews">
	</head>
	<body>
		<div class="container">
			<?php
				include_once('nav.php');
			?>
			<div class="content">
				<h2>Sampson Community College<br>Form Management and Electronic Archival System</h2>
				<p>
					In an effort to make the process of form management work workflow more efficient and effective, we have 
					developed the Form Management and Electronic Archival System.  All faculty and staff should utilize 
					this system to complete and submit all forms electronically.  Supervisors and those individuals needing 
					to sign documents can do so electronically.
				</p>
				<p>
					User rights are required to insert and view data within the database.  Supervisor rights are required to edit 
					data within the database.  Please ensure you are using the correct credentials for your task.
				</p>
				<span style="text-align:center;">
					<p>
						<?php
							if($msie)
							{
								print("<div class='blink' style='letter-spacing: 3px; padding: 2%; font-size: large; color: white; background-color: black;'>I see you're using Internet Explorer...<br><br>");
								print("This web application prefers Google Chrome.<br>Please close IE and reopen in Chrome for the best experience.<br>");
								print("Thank you!</div>");
							}
							
							if($firefox)
							{
								print("<div class='blink' style='letter-spacing: 3px; padding: 2%; font-size: large; color: white; background-color: black;'>I see you're using Firefox...<br><br>");
								print("This web application prefers Google Chrome.<br>Please close Firefox and reopen in Chrome for the best experience.<br>");
								print("Thank you!</div>");
							}
						?>
					</p>
					<p>
						<form name="loginform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
							<span id="label">Username: </span>
							<input type="text" name="username" placeholder="Username" autofocus required><br><br>
							<span id="label">Password: </span>
							<input type="password" name="password" placeholder="Password" required><br><br>
							<input type="submit" value="Login to Form Mgmt. Sys." style="background-color:red; color:white; border-radius:25px;">
						</form>
					</p>
				</span>
				<div style="margin-top:10px;">&nbsp;</div>
				<p>
					<h2>Training Videos</h2>
					<h3>Click PLAY button on either video to begin...go FULLSCREEN if you wish.</h3>
					<table style="margin:auto;">
						<tr>
							<td><video width="80%" controls><source src="http://forms.sampsoncc.edu/training/Form%20Management%20System%20-%20Faculty%20Staff%20Training.mp4" type="video/mp4" rel="prettyPhoto" title="Faculty & Staff Training"></td>
							<td><video width="80%" controls><source src="http://forms.sampsoncc.edu/training/Form%20Management%20System%20-%20Supervisor%20Training.mp4" type="video/mp4" rel="prettyPhoto" title="Faculty & Staff Training"></td>
						</tr>
						<tr>
							<th>Faculty &amp; Staff Training</th>
							<th>Supervisor Training</th>
						</tr>
					</table>
				</p>
				<!--<table align="center">
					<tr>
						<td><button class="btn" onClick="window.location.href='perf-obj-1/perf-obj-1-input-home.php'">Performance Objective #1</button></td>
						<td><button class="btn" onClick="window.location.href='perf-obj-2/perf-obj-2-input-home.php'">Performance Objective #2</button></td>
						<td><button class="btn" onClick="window.location.href='perf-obj-3/perf-obj-3-input-home.php'">Performance Objective #3</button></td>
					</tr>
					<tr>
						<td><button class="btn" onClick="window.location.href='pro-dev-log/pro-dev-log-input-home.php'">Professional Development Log</button></td>
						<td><button class="btn" onClick="window.location.href='textbook/textbook-order-input-home.php'">Textbook Order Form</button></td>
						<td><button class="btn" onClick="window.location.href='inventory/inventory-transfer-input-home.php'">Inventory Transfer Form</button></td>
						<td>&nbsp;</td>
					</tr>
				</table>-->
			</div>
		</div>
		<script>
			$(document).ready(function() {
				setInterval("$('.blink').fadeOut().fadeIn();",1000);
				});
		</script>
	</body>
</html>