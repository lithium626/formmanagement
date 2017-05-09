<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Request for Personal Leave</title>
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
					$date_requested = $_POST['date_requested'];
					$time_increment = $_POST['time_increment'];
					$date_submitted = $_POST['date_submitted'];
					$employee = $_POST['employee'];
					$employee_email = $_POST['employee_email'];
					$supervisor = $_POST['supervisor'];
					
					$employee_signature = $_POST['employee_signature'];
					
					$chair_signature = $_POST['chair_signature'];
					
					$vp_signature = $_POST['vp_signature'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO personalleave (date_requested, time_increment, date_submitted, employee, employee_email, supervisor, employee_signature, chair_signature, vp_signature) VALUES ('$date_requested', '$time_increment', '$date_submitted', '$employee', '$employee_email', '$supervisor', '$employee_signature', '$chair_signature', '$vp_signature')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					$to = "$supervisor";
					$subject = "Personal Leave Form - Submitted";
					$msg = "$employee submitted a $time_increment Personal Leave Form on $date_submitted for the date: $date_requested.  This form can be electronically signed at http://forms.sampsoncc.edu.";
					mail($to, $subject, $msg);
				?>
				<h2>Request for Personal Leave</h2>
				<p>Thank you for submitting your Request for Personal Leave.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>