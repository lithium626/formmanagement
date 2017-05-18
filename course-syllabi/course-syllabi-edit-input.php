<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Syllabi</title>
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
					$semester = $_POST['semester'];
					$supervisor = $_POST['supervisor'];
					
					//$schedule_form = basename($_FILES["schedule_form"]["name"]);
					
					$instructor_signature = $_POST['instructor_signature'];
					$instructor_date = $_POST['instructor_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					//$vp_signature = $_POST['vp_signature'];
					//$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					//$query = "UPDATE doorschedule SET instructor='$instructor', employee_email='$employee_email', semester='$semester', supervisor='$supervisor', course='$course', course_section='$course_section', instructor_signature='$instructor_signature', instructor_date='$instructor_date', chair_signature='$chair_signature', chair_date='$chair_date', vp_signature='$vp_signature', vp_date='$vp_date' WHERE ID='$id'";
					$query = "UPDATE doorschedule SET instructor='$instructor', employee_email='$employee_email', semester='$semester', supervisor='$supervisor', course='$course', course_section='$course_section', instructor_signature='$instructor_signature', instructor_date='$instructor_date', chair_signature='$chair_signature', chair_date='$chair_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					//if($vp_signature == '')
					//{
						//$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						//$subject = "Faculty / Staff Semester Door Schedule - Submitted";
						//$msg = "$instructor submitted a Faculty / Staff Semester Door Schedule for the $semester semester.  The form is ready for your electronic signature.";
						//mail($to, $subject, $msg);
					//}
					
					//if($instructor_signature != '' && $chair_signature != '' && $vp_signature != '')
					if($instructor_signature != '' && $chair_signature != '')
					{
						$to = "$employee_email";
						$subject = "Course Syllabus ($semester : $course-$course_section) - Approved";
						$msg = "The Course Syllabus for $instructor ($semester : $course-$course_section) has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Course Syllabi</h2>
				<p>Thank you for editing the Course Syllabus.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>