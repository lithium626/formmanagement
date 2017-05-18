<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Syllabi</title>
		<link rel="stylesheet" href="../css/outputstyle.css">
		<link rel="stylesheet" href="../css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="../js/date.js"></script>
		<meta name="author" content="W. Darell Matthews">
	</head>
	<body>
		<?php
			$id = $_POST['course_syllabi'];
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
				
				<div id="printlogo">
					<img src="../img/logoheader.png">
				</div>
				
				<h2>Sampson Community College<br><br>Course Syllabus</h2>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Course Syllabus" onClick="window.print()"></div>
				
				<p align="center" style="font-size: 16px;">
					Below is the information submitted by the instructor.  <br>To print their uploaded course syllabus, click the blue link labeled "Course Syllabus".
				</p>
				
				<br><br>
				
				<form name="course-syllabi-print" action="" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Instructor(s): </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" style="width: 30%; box-sizing: border-box" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="text" name="employee_email" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Semester: </span>
					<input type="text" name="semester" value="<?php echo ($row['3']); ?>" style="width: 30%; box-sizing: border-box" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['4']); ?>" style="width: 30%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Course: </span>
					<input type="text" name="course" value="<?php echo ($row['5']); ?>" style="width:30%; box-sizing: border-box" required>
					
					<span id="label">Course Section: </span>
					<input type="text" name="course_section" value="<?php echo ($row['6']); ?>" style="width:30%; box-sizing: border-box" required>
					
					<span id="label">Course Syllabus: </span>
					<!--<input type="text" name="schedule_form" value="<?php //echo ($row['5']); ?>" required>-->
					<?php print("<a target='_blank' href='http://forms.sampsoncc.edu/syllabi/" . $row['3'] . "/" . $row['7'] . "'>");
						echo ($row['7']);
						print("</a>");
					?>
					
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
				</form>
			</div>
		</div>
	</body>
</html>