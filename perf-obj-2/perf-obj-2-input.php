<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #2</title>
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
					$employee = $_POST['employee'];
					$date_submitted = $_POST['date_submitted'];
					$obj_setting_period = $_POST['obj_setting_period'];
					$supervisor = $_POST['supervisor'];
					$section_1_employee = str_replace("'", "", $_POST['section_1_employee']);
					$section_1_supervisor = str_replace("'", "", $_POST['section_1_supervisor']);
					$section_2_employee = str_replace("'", "", $_POST['section_2_employee']);
					$section_2_supervisor = str_replace("'", "", $_POST['section_2_supervisor']);
					$evaluation_summary = str_replace("'", "", $_POST['evaluation_summary']);
					
					$employee_signature = $_POST['employee_signature'];
					$supervisor_signature = $_POST['supervisor_signature'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO perfobj2 (employee, date_submitted, obj_setting_period, supervisor, section_1_employee, section_1_supervisor, section_2_employee, section_2_supervisor, evaluation_summary, employee_signature, supervisor_signature) VALUES ('$employee', '$date_submitted', '$obj_setting_period', '$supervisor', '$section_1_employee', '$section_1_supervisor', '$section_2_employee', '$section_2_supervisor', '$evaluation_summary', '$employee_signature', '$supervisor_signature')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);

					$to = "$supervisor";
					$subject = "Performance Objective #2 - Submitted";
					$msg = "$employee submitted their Performance Objective #2.";
					mail($to, $subject, $msg);			
				?>
				<h2>Progress Conference #2</h2>
				<p>Thank you for submitting your Progress Conference #2.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>