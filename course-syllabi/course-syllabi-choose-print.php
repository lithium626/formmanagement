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
				<h2>Course Syllabi</h2>
				
				<p style="text-align:center;">
					Search by <strong>Instructor's Name</strong>, <strong>Datatel Semester Code</strong> (ie: 2017sp, 2017su, 2017fa), or <strong>Course</strong> (ie: ABC101):
				</p>
				<form method="GET" name="course-syllabi-search" action="course-syllabi-search.php" style="text-align:center;">
					<input type="text" name="search" autofocus>
					<input type="submit" value="Begin Search...">
				</form>
				<br><br><br>
				
				<p style="text-align:center;">
					Choose a course syllabus form stored in the archives to print.
				</p>
				<form method="POST" name="course-syllabi-choose" action="course-syllabi-print.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM coursesyllabi ORDER BY semester ASC";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='course_syllabi'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['chair_signature'] == NULL || $row['chair_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['semester'] . " --- " . $row['course'] . "-" . $row['course_section'] . " --- " . $row['instructor_signature'] . "</option>");
								//} else if ($row['vp_signature'] == NULL || $row['vp_signature'] == '') {
									//print("<option id='highlight' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['semester'] . " --- " . $row['instructor_signature'] . "</option>");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['semester'] . " --- " . $row['course'] . "-" . $row['course_section'] . " --- " . $row['instructor_signature'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Print Course Syllabus"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Chair Signatures.***</p>
					<!--<p id="highlight" align="center">***Yellow Highlighted Options are Missing VP Signatures.***</p>-->
				</form>
			</div>
		</div>
	</body>
</html>