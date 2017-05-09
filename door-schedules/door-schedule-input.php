<?php
	include_once('../login-redirect.php');
?>
<?php
	//echo "Current Script Owner: " . get_current_user() . "<br><br>";
	//echo exec('whoami') . "<br><br>";
	$semester = $_POST['semester'];
	$target_dir = "/var/www/html/schedules/$semester/";
	$target_file = $target_dir . basename($_FILES["schedule_form"]["name"]);
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
	/*if (move_uploaded_file($_FILES["schedule_form"]["tmp_name"], $target_file)) {
		echo "The file <strong><i>". basename( $_FILES["schedule_form"]["name"]). "</i></strong> has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Faculty / Staff Semester Door Schedule</title>
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
					//$semester = $_POST['semester'];
					$supervisor = $_POST['supervisor'];
					
					$schedule_form = basename($_FILES["schedule_form"]["name"]);
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO doorschedule (instructor, employee_email, semester, supervisor, schedule_form, instructor_signature, instructor_date, chair_signature, chair_date, vp_signature, vp_date) VALUES ('$instructor', '$employee_email', '$semester', '$supervisor', '$schedule_form', '$instructor_signature', '$instructor_date', '$chair_signature', '$chair_date', '$vp_signature', '$vp_date')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if (move_uploaded_file($_FILES["schedule_form"]["tmp_name"], $target_file)) 
					{
						echo "The file <strong><i>". basename( $_FILES["schedule_form"]["name"]). "</i></strong> has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file or there was no file attached.";
					}
					
					$to = "$supervisor";
					$subject = "Faculty / Staff Door Schedule - Submitted - $semester";
					$msg = "$instructor submitted a Faculty/Staff Door Schedule for $semester.";
					mail($to, $subject, $msg);
				?>
				<h2>Faculty / Staff Door Schedule</h2>
				<p>Thank you for submitting your Faculty / Staff Door Schedule.  The information will be stored in a database for final archival.</p>
			</div>
	</body>
</html>