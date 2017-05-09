<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Field Trip Authorization</title>
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
					$date = $_POST['date'];
					$course_number = $_POST['course_number'];
					$course_title = $_POST['course_title'];
					$class_meeting_date = $_POST['class_meeting_date'];
					$class_meeting_time = $_POST['class_meeting_time'];
					$class_meeting_location = $_POST['class_meeting_location'];
					
					$program_area = $_POST['program_area'];
					$employee_email = $_POST['employee_email'];
					$supervisor = $_POST['supervisor'];
					$mode_travel = $_POST['mode_travel'];
					$trip_destination = str_replace("'", "", $_POST['trip_destination']);
					$trip_purpose = str_replace("'", "", $_POST['trip_purpose']);
					$departure_date = $_POST['departure_date'];
					$departure_time = $_POST['departure_time'];
					$return_date = $_POST['return_date'];
					$return_time = $_POST['return_time'];
					$costs = $_POST['costs'];
					$costs_explanation = str_replace("'", "", $_POST['costs_explanation']);
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO fieldtrip (instructor, date, course_number, course_title, class_meeting_date, class_meeting_time, class_meeting_location, program_area, employee_email, supervisor, mode_travel, trip_destination, trip_purpose, departure_date, departure_time, return_date, return_time, costs, costs_explanation, instructor_signature, instructor_date, chair_signature, chair_date, vp_signature, vp_date) VALUES ('$instructor', '$date', '$course_number', '$course_title', '$class_meeting_date', '$class_meeting_time', '$class_meeting_location', '$program_area', '$employee_email', '$supervisor', '$mode_travel', '$trip_destination', '$trip_purpose', '$departure_date', '$departure_time', '$return_date', '$return_time', '$costs', '$costs_explanation', '$instructor_signature', '$instructor_date', '$chair_signature', '$chair_date', '$vp_signature', '$vp_date')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					$to = "$supervisor";
					$subject = "Field Trip Authorization - Submitted";
					$msg = "$instructor submitted a Field Trip Authorization on $date for Course $course_number / $course_title.  The travel to $trip_destination, via $mode_travel, is for the purpose of $trip_purpose.  Students will depart on $departure_date / $departure_time and return on $return_date / $return_time.";
					mail($to, $subject, $msg);
				?>
				<h2>Field Trip Authorization Form</h2>
				<p>Thank you for submitting your Field Trip Authorization.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>