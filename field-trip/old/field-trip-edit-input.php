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
					$id = $_POST['ID'];
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
					$query = "UPDATE fieldtrip SET instructor='$instructor', date='$date', course_number='$course_number', course_title='$course_title', class_meeting_date='$class_meeting_date', class_meeting_time='$class_meeting_time', class_meeting_location='$class_meeting_location', program_area='$program_area', employee_email='$employee_email', supervisor='$supervisor', mode_travel='$mode_travel', trip_destination='$trip_destination', trip_purpose='$trip_purpose', departure_date='$departure_date', departure_time='$departure_time', return_date='$return_date', return_time='$return_time', costs='$costs', costs_explanation='$costs_explanation', instructor_signature='$instructor_signature', instructor_date='$instructor_date', chair_signature='$chair_signature', chair_date='$chair_date', vp_signature='$vp_signature', vp_date='$vp_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Field Trip Authorization Form - Submitted";
						$msg = "$instructor submitted a Field Trip Authorization on $date for Course $course_number / $course_title.  The travel to $trip_destination, via $mode_travel, is for the purpose of $trip_purpose.  Students will depart on $departure_date / $departure_time and return on $return_date / $return_time.  The form has been signed by Chair $chair_signature and is ready for your electronic signature.";
						mail($to, $subject, $msg);
					}
					
					if($instructor_signature != '' && $chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Field Trip Authorization - Approved";
						$msg = "The Field Trip Authorization for $instructor submitted on $date for Course $course_number / $course_title to $trip_destination (Depart: $departure_date / $departure_time - Return: $return_date / $return_time) has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Field Trip Authorization Form</h2>
				<p>Thank you for editing the Field Trip Authorization.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>