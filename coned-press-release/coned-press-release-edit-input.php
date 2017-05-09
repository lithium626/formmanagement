<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Continuing Education Press &amp; Information Release</title>
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
					$employee_phone = $_POST['employee_phone'];
					$employee_extension = $_POST['employee_extension'];
					$date_submitted = $_POST['date_submitted'];
					$supervisor = $_POST['supervisor'];
					$start_date = $_POST['start_date'];
					$end_date = $_POST['end_date'];
					$meeting_day = $_POST['meeting_day'];
					$meeting_time = $_POST['meeting_time'];
					$course_location = str_replace("'", "", $_POST['course_location']);
					$course_instructor = $_POST['course_instructor'];
					$registration_cost = str_replace("'", "", $_POST['registration_cost']);
					$registration_date = $_POST['registration_date'];
					$registration_time = $_POST['registration_time'];
					$registration_location = str_replace("'", "", $_POST['registration_location']);
					$extra_supplies = $_POST['extra_supplies'];
					$instructor_credentials = str_replace("'", "", $_POST['instructor_credentials']);
					$class_description = str_replace("'", "", $_POST['class_description']);
					$skills_gained = str_replace("'", "", $_POST['skills_gained']);
					$job_opportunities = str_replace("'", "", $_POST['job_opportunities']);
					$partnering_organizations = str_replace("'", "", $_POST['partnering_organizations']);
					$max_seats = $_POST['max_seats'];
					$min_seats = $_POST['min_seats'];
					$additional_notes = str_replace("'", "", $_POST['additional_notes']);
					$additional_form = basename($_FILES["additional_form"]["name"]);
					$primary_signature = $_POST['primary_signature'];
					$primary_date = $_POST['primary_date'];
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					$dmm_signature = $_POST['dmm_signature'];
					$dmm_date = $_POST['dmm_date'];
		
					include("../dbconnect.php");
					$query = "UPDATE cepr SET instructor='$instructor', employee_email='$employee_email', employee_phone='$employee_phone', employee_extension='$employee_extension', date_submitted='$date_submitted', supervisor='$supervisor', start_date='$start_date', end_date='$end_date', meeting_day='$meeting_day', meeting_time='$meeting_time', course_location='$course_location', course_instructor='$course_instructor', registration_cost='$registration_cost', registration_date='$registration_date', registration_time='$registration_time', registration_location='$registration_location', extra_supplies='$extra_supplies', instructor_credentials='$instructor_credentials', class_description='$class_description', skills_gained='$skills_gained', job_opportunities='$job_opportunities', partnering_organizations='$partnering_organizations', max_seats='$max_seats', min_seats='$min_seats', additional_notes='$additional_notes', additional_form='$additional_form', primary_signature='$primary_signature', primary_date='$primary_date', chair_signature='$chair_signature', chair_date='$chair_date', dmm_signature='$dmm_signature', dmm_date='$dmm_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($dmm_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu, dgrubb@sampsoncc.edu, bwiggins@sampsoncc.edu";
						$subject = "ConEd Press and Information Release Form - Submitted";
						$msg = "$instructor submitted a Guest Lecturer Form on $date_submitted for Course: $course_number / Course Title: $course_title / Course Date: $course_date / Course Time: $course_time / Course Location: $course_location.  The guest lecturer ($guest_lecturer) has been assigned and the form has been signed by Chair $chair_signature.  The form is ready for your electronic signature.";
						mail($to, $subject, $msg);
					}
					
					if($primary_signature != '' && $chair_signature != '' && $dmm_signature != '')
					{
						$to = "$employee_email";
						$subject = "ConEd Press and Information Release Form - Approved";
						$msg = "The ConEd Press and Information Release Form for $instructor on $date_submitted (Course Instructor: $course_instructor / Course Location: $course_location / Course Start Date: $start_date / Course End Date: $end_date / Course Meeting Day: $meeting_day / Course Meeting Time: $meeting_time / Class Description: $class_description) has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>SCC - Continuing Education Press &amp; Information Release</h2>
				<p>Thank you for editing the ConEd Press &amp; Information Release Form.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>