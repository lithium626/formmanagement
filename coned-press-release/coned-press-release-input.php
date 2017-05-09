<?php
	include_once('../login-redirect.php');
?>
<?php
	//echo "Current Script Owner: " . get_current_user() . "<br><br>";
	//echo exec('whoami') . "<br><br>";
	$target_dir = "/var/www/html/cepr-forms/";
	$target_file = $target_dir . basename($_FILES["additional_form"]["name"]);
	/*if(is_dir($target_dir))
	{
		echo "Directory is present.<br><br>";
	} else {
		echo "Directory is not present.<br><br>";
	}*/
	/*if(is_writable($target_dir))
	{
		echo "Directory is writable.<br><br>";
	} else {
		echo "Directory is not writable.<br><br>";
	}*/
	//if everything is ok, try to upload file
	/*if (move_uploaded_file($_FILES["additional_form"]["tmp_name"], $target_file)) {
		echo "The file <strong><i>". basename( $_FILES["additional_form"]["name"]). "</i></strong> has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}*/
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
					$course_location = $_POST['course_location'];
					$course_instructor = $_POST['course_instructor'];
					$registration_cost = $_POST['registration_cost'];
					$registration_date = $_POST['registration_date'];
					$registration_time = $_POST['registration_time'];
					$registration_location = $_POST['registration_location'];
					$extra_supplies = $_POST['extra_supplies'];
					$instructor_credentials = $_POST['instructor_credentials'];
					$class_description = $_POST['class_description'];
					$skills_gained = $_POST['skills_gained'];
					$job_opportunities = $_POST['job_opportunities'];
					$partnering_organizations = $_POST['parnering_organizations'];
					$max_seats = $_POST['max_seats'];
					$min_seats = $_POST['min_seats'];
					$additional_notes = $_POST['additional_notes'];
					$additional_form = basename($_FILES["additional_form"]["name"]);
					$primary_signature = $_POST['primary_signature'];
					$primary_date = $_POST['primary_date'];
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					$dmm_signature = $_POST['dmm_signature'];
					$dmm_date = $_POST['dmm_date'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO cepr (instructor, employee_email, employee_phone, employee_extension, date_submitted, supervisor, start_date, end_date, meeting_day, meeting_time, course_location, course_instructor, registration_cost, registration_date, registration_time, registration_location, extra_supplies, instructor_credentials, class_description, skills_gained, job_opportunities, partnering_organizations, max_seats, min_seats, additional_notes, additional_form, primary_signature, primary_date, chair_signature, chair_date, dmm_signature, dmm_date) VALUES ('$instructor', '$employee_email', '$employee_phone', '$employee_extension', '$date_submitted', '$supervisor', '$start_date', '$end_date', '$meeting_day', '$meeting_time', '$course_location', '$course_instructor', '$registration_cost', '$registration_date', '$registration_time', '$registartion_location', '$extra_supplies', '$instructor_credentials', '$class_description', '$skills_gained', '$job_opportunities', '$parnering_organizations', '$max_seats', '$min_seats', '$additional_notes', '$additional_form', '$primary_signature', '$primary_date', '$chair_signature', '$chair_date', '$dmm_signature', '$dmm_date')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if (move_uploaded_file($_FILES["additional_form"]["tmp_name"], $target_file)) 
					{
						echo "The file <strong><i>". basename( $_FILES["additional_form"]["name"]). "</i></strong> has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file or there was no file attached.";
					}
					
					$to = "$supervisor";
					$subject = "ConEd Press Release Form - Submitted";
					$msg = "$instructor submitted a ConEd Press & Information Release Form on $date_submitted for Course Instructor: $course_instructor / Course Location: $course_location / Course Start Date: $start_date / Course End Date: $end_date / Course Meeting Day: $meeting_day / Course Meeting Time: $meeting_time / Class Description: $class_description.";
					mail($to, $subject, $msg);
				?>
				<h2>Continuing Education Press &amp; Information Release</h2>
				<p>Thank you for submitting your ConEd Press &amp; Information Release Form.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>