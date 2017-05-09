<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Guest Lecturer / Class Coverage Authorization</title>
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
					$date_submitted = $_POST['date_submitted'];
					$course_number = $_POST['course_number'];
					$course_title = $_POST['course_title'];
					$course_date = $_POST['course_date'];
					$course_time = $_POST['course_time'];
					$course_location = $_POST['course_location'];
					
					$guest_lecturer = $_POST['guest_lecturer'];
					$supervisor = $_POST['supervisor'];
					$costs = $_POST['costs'];
					$costs_explanation = str_replace("'", "", $_POST['costs_explanation']);
					$topic_presented = str_replace("'", "", $_POST['topic_presented']);
					$additional_form = $_POST['additional_form'];
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "UPDATE guestlecturer SET instructor='$instructor', employee_email='$employee_email', date_submitted='$date_submitted', course_number='$course_number', course_title='$course_title', course_date='$course_date', course_time='$course_time', course_location='$course_location', guest_lecturer='$guest_lecturer', supervisor='$supervisor', costs='$costs', costs_explanation='$costs_explanation', topic_presented='$topic_presented', additional_form='$additional_form', instructor_signature='$instructor_signature', instructor_date='$instructor_date', chair_signature='$chair_signature', chair_date='$chair_date', vp_signature='$vp_signature', vp_date='$vp_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Guest Lecturer Form - Submitted";
						$msg = "$instructor submitted a Guest Lecturer Form on $date_submitted for Course: $course_number / Course Title: $course_title / Course Date: $course_date / Course Time: $course_time / Course Location: $course_location.  The guest lecturer ($guest_lecturer) has been assigned and the form has been signed by Chair $chair_signature.  The form is ready for your electronic signature.";
						mail($to, $subject, $msg);
					}
					
					if($instructor_signature != '' && $chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Guest Lecturer Form - Approved";
						$msg = "The Guest Lecturer Form for $instructor on $date_submitted (Course: $course_number / Course Title: $course_title / Course Date: $course_date / Course Time: $course_time / Course Location: $course_location) with Guest Lecturer $guest_lecturer has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Guest Lecturer / Class Coverage Authorization Form</h2>
				<p>Thank you for editing the Guest Lecturer / Class Coverage Authorization.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>