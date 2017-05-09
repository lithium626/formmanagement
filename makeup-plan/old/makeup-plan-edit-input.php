<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Makeup Plan</title>
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
					$instructor = $_POST['instructor'];
					$employee_email = $_POST['employee_email'];
					$supervisor = $_POST['supervisor'];
					$class_missed = $_POST['class_missed'];
					$date_missed = $_POST['date_missed'];
					$time_missed = $_POST['time_missed'];
					
					$additional_time = $_POST['additional_time'];
					$additional_date = $_POST['additional_date'];
					$additional_met = $_POST['additional_met'];
					$additional_total = $_POST['additional_total'];
					
					$moodle_assignment = $_POST['moodle_assignment'];
					$moodle_description = str_replace("'", "", $_POST['moodle_description']);
					
					$extra_assignment = $_POST['extra_assignment'];
					$extra_assignment_time = $_POST['extra_assignment_time'];
					$extra_assignment_madeup = $_POST['extra_assignment_madeup'];
					$extra_assignment_description = str_replace("'", "", $_POST['extra_assignment_description']);
					
					$other = $_POST['other'];
					$other_assignment = $_POST['other_assignment'];
					$other_time = $_POST['other_time'];
					$other_description = str_replace("'", "", $_POST['other_description']);
					
					$cancellation_cause = $_POST['cancellation_cause'];
					$other_cause_description = str_replace("'", "", $_POST['other_cause_description']);
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "UPDATE makeupplan SET instructor='$instructor', employee_email='$employee_email', supervisor='$supervisor', class_missed='$class_missed', date_missed='$date_missed', time_missed='$time_missed', additional_time='$additional_time', additional_date='$additional_date', additional_met='$additional_met', additional_total='$additional_total', moodle_assignment='$moodle_assignment', moodle_description='$moodle_description', extra_assignment='$extra_assignment', extra_assignment_time='$extra_assignment_time', extra_assignment_madeup='$extra_assignment_madeup', extra_assignment_description='$extra_assignment_description', other='$other', other_assignment='$other_assignment', other_time='$other_time', other_description='$other_description', cancellation_cause='$cancellation_cause', other_cause_description='$other_cause_description', instructor_signature='$instructor_signature', instructor_date='$instructor_date', chair_signature='$chair_signature', chair_date='$chair_date', vp_signature='$vp_signature', vp_date='$vp_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Makeup Plan Form - Submitted";
						$msg = "$instructor submitted a Makeup Plan Form for $class_missed / $date_missed (missed due to $cancellation_cause), which has been signed by Chair $chair_signature.  The form is ready for your electronic signature.";
						mail($to, $subject, $msg);
					}
					
					if($instructor_signature != '' && $chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Makeup Plan Form - Approved";
						$msg = "The Makeup Plan Form for $instructor (Course: $class_missed - Date: $date_missed - Cancellation Cause: $cancellation_cause) has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Makeup Plan for Missed or Cancelled Classes</h2>
				<p>Thank you for editing the Makeup Plan for Missed or Cancelled Classes.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>