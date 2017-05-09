<?php
	include_once('../login-redirect.php');
?>
<?php
	//echo "Current Script Owner: " . get_current_user() . "<br><br>";
	//echo exec('whoami') . "<br><br>";
	$target_dir = "/var/www/html/gl-forms/";
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
					$additional_form = basename($_FILES["additional_form"]["name"]);
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO guestlecturer (instructor, employee_email, date_submitted, course_number, course_title, course_date, course_time, course_location, guest_lecturer, supervisor, costs, costs_explanation, topic_presented, additional_form, instructor_signature, instructor_date, chair_signature, chair_date, vp_signature, vp_date) VALUES ('$instructor', '$employee_email', '$date_submitted', '$course_number', '$course_title', '$course_date', '$course_time', '$course_location', '$guest_lecturer', '$supervisor', '$costs', '$costs_explanation', '$topic_presented', '$additional_form', '$instructor_signature', '$instructor_date', '$chair_signature', '$chair_date', '$vp_signature', '$vp_date')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if (move_uploaded_file($_FILES["additional_form"]["tmp_name"], $target_file)) 
					{
						echo "The file <strong><i>". basename( $_FILES["additional_form"]["name"]). "</i></strong> has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file or there was no file attached.";
					}
					
					$to = "$supervisor";
					$subject = "Guest Lecturer Form - Submitted";
					$msg = "$instructor submitted a Guest Lecturer Form on $date_submitted for Course: $course_number / Course Title: $course_title / Course Date: $course_date / Course Time: $course_time / Course Location: $course_location.  The guest lecturer ($guest_lecturer) has been assigned.";
					mail($to, $subject, $msg);
				?>
				<h2>Guest Lecturer / Class Coverage Authorization</h2>
				<p>Thank you for submitting your Guest Lecturer / Class Coverage Authorization.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>