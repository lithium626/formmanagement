<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective System Search</title>
		<link rel="stylesheet" href="../css/inputstyle.css">
		<link rel="stylesheet" href="../css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="../js/date.js"></script>
		<meta name="author" content="W. Darell Matthews">
	</head>
	<body>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Performance Objective Full Search</h2>
				
				<p style="text-align:center;">
					Search by employee's last name:
				</p>
				<form method="GET" name="perf-obj-full-search" action="perf-obj-full-search.php" style="text-align:center;">
					<input type="text" name="search" autofocus>
					<select name="obj_setting_period" required>
						<option value="">Choose Year: </option>
						<option value="2015-2016">2015-2016</option>
						<option value="2016-2017">2016-2017</option>
						<option value="2017-2018">2017-2018</option>
					</select>&nbsp;&nbsp;&nbsp;
					<select name="obj_number" required>
						<option value="">Choose Obj. # </option>
						<option value="perfobj1">Perf Obj 1</option>
						<option value="perfobj2">Perf Obj 2</option>
						<option value="perfobj3">Perf Obj 3</option>
					</select>&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Begin Search...">
				</form>
			</div>
		</div>
	</body>
</html>