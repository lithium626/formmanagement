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
					$id = $_POST['ID'];
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
					$query = "UPDATE personalleave SET date_requested='$date_requested', time_increment='$time_increment', date_submitted='$date_submitted', employee='$employee', employee_email='$employee_email', supervisor='$supervisor', employee_signature='$employee_signature', chair_signature='$chair_signature', vp_signature='$vp_signature' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Personal Leave Form - Submitted";
						$msg = "$employee submitted a $time_increment Personal Leave Form on $date_submitted for the date: $date_requested.  The form has been signed by $chair_signature and is ready for your electronic signature.";
						mail($to, $subject, $msg);
					}
					
					if($employee_signature != '' && $chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Personal Leave Form - Approved";
						$msg = "The $time_increment Personal Leave Form for $employee, submitted on $date_submitted for date: $date_requested, has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Request for Personal Leave</h2>
				<p>Thank you for submitting your Request for Personal Leave.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>