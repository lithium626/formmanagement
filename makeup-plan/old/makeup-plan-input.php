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
					$query = "INSERT INTO makeupplan (instructor, employee_email, supervisor, class_missed, date_missed, time_missed, additional_time, additional_date, additional_met, additional_total, moodle_assignment, moodle_description, extra_assignment, extra_assignment_time, extra_assignment_madeup, extra_assignment_description, other, other_assignment, other_time, other_description, cancellation_cause, other_cause_description, instructor_signature, instructor_date, chair_signature, chair_date, vp_signature, vp_date) VALUES ('$instructor', '$employee_email', '$supervisor', '$class_missed', '$date_missed', '$time_missed', '$additional_time', '$additional_date', '$additional_met', '$additional_total', '$moodle_assignment', '$moodle_description', '$extra_assignment', '$extra_assignment_time', '$extra_assignment_madeup', '$extra_assignment_description', '$other', '$other_assignment', '$other_time', '$other_description', '$cancellation_cause', '$other_cause_description', '$instructor_signature', '$instructor_date', '$chair_signature', '$chair_date', '$vp_signature', '$vp_date')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);

					$to = "$supervisor";
					$subject = "Makeup Plan Form - Submitted";
					$msg = "$instructor submitted a Makeup Plan Form for Course: $class_missed / Date Missed: $date_missed / Cancellation Cause: $cancellation_cause.";
					mail($to, $subject, $msg);
				?>
				<h2>Makeup Plan for Missed or Cancelled Classes</h2>
				<p>Thank you for submitting your Makeup Plan for Missed or Cancelled Classes.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>