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
		<?php
			$id = $_POST['course_syllabus_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM coursesyllabi WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Course Syllabus</h2>
				<!--<p>
					Edit your form as normal.  To upload a different course syllabus file, select the upload area, choose the new file, then submit the form.
				</p>-->
				<div id="biglinebreak">&nbsp;</div>
				<form name="course-syllabi-edit" action="course-syllabi-edit-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Instructor: </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="text" name="employee_email" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Semester: </span>
					<input type="text" name="semester" value="<?php echo ($row['3']); ?>" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['4']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Course Prefix &amp; Number: </span>
					<input type="text" name="course" value="<?php echo ($row['5']); ?>" required>
					
					<span id="label">Course Section: </span>
					<input type="text" name="course_section" value="<?php echo ($row['6']); ?>" required>
					
					<span id="label">Coruse Syllabus: </span>
					<input type="text" name="syllabus_form" value="<?php echo ($row['7']); ?>" required>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" value="<?php echo ($row['8']); ?>" required>
					Date: <input type="date" name="instructor_date" value="<?php echo ($row['9']); ?>"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['10']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['11']); ?>"><br><br><br>
					
					<!--VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php //echo ($row['12']); ?>">
					Date: <input type="date" name="vp_date" value="<?php //echo ($row['13']); ?>"><br><br><br>-->

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>