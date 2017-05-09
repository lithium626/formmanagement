<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #1</title>
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
				<?php
					$id = $_POST['ID'];
					$employee = $_POST['employee'];
					$date_submitted = $_POST['date_submitted'];
					$obj_setting_period = $_POST['obj_setting_period'];
					$supervisor = $_POST['supervisor'];
					$section_1 = str_replace("'", "", $_POST['section_1']);
					$section_2 = str_replace("'", "", $_POST['section_2']);
						
					$employee_signature = $_POST['employee_signature'];
					$supervisor_signature = $_POST['supervisor_signature'];
					
					include("../dbconnect.php");
					$query = "UPDATE perfobj1 SET employee='$employee', date_submitted='$date_submitted', obj_setting_period='$obj_setting_period', supervisor='$supervisor', section_1='$section_1', section_2='$section_2', employee_signature='$employee_signature', supervisor_signature='$supervisor_signature' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
				?>
				<h2>Performance Objectives #1</h2>
				<p>Thank you for submitting your Performance Objective #1.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>