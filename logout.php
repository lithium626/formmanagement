<?php
    // enable sessions
    session_start();

    // delete cookies, if any
    setcookie("username", "", time() - 3600);
    setcookie("password", "", time() - 3600);

    // log user out
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="3;URL=http://forms.sampsoncc.edu">
		<title>SCC Form Management and Electronic Archival System</title>
		<link rel="stylesheet" href="css/inputstyle.css">
		<link rel="stylesheet" href="css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="js/date.js"></script>
		<meta name="author" content="W. Darell Matthews">
	</head>
	<body>
		<div class="container">
			<?php
				include_once('nav.php');
			?>
			<div class="content">
				<h2>Sampson Community College<br>Form Management and Electronic Archival System</h2>
				<span style="text-align:center;">
					<h1>You are logged out!</h1>
					<h3><a href="http://forms.sampsoncc.edu">SCC Form Management System</a></h3>
				</span>
			</div>
		</div>
	</body>
</html>