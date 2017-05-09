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
		<?php
			$id = $_POST['cepr_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM cepr WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>SCC - Continuing Education Press &amp; Information Release</h2>
				
				<div id="biglinebreak">&nbsp;</div>
				<form name="coned-press-release-edit" action="coned-press-release-edit-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">PRIMARY CONTACT / PROGRAM COORDINATOR</span><br><br><br>
					
					<span id="label">Name: </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Employee Phone Number: </span>
					<input type="tel" name="employee_phone" value="<?php echo ($row['3']); ?>" required>
					
					<span id="label"> ext:</span>
					<input type="text" name="employee_extension" value="<?php echo ($row['4']); ?>" required><br><br><br>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" value="<?php echo ($row['5']); ?>" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['6']); ?>" required>
					
					<hr>
					
					<span id="label">NEW CLASS (Continuing Education)</span><br><br><br>
					
					<span id="label">Start Date: </span>
					<input type="date" name="start_date" value="<?php echo ($row['7']); ?>" required>
					
					<span id="label">End Date: </span>
					<input type="date" name="end_date" value="<?php echo ($row['8']); ?>" required><br><br><br>
					
					<span id="label">Meeting Day(s): </span>
					<input type="text" name="meeting_day" value="<?php echo ($row['9']); ?>" required>
					
					<span id="label">Meeting Time(s): </span>
					<input type="text" name="meeting_time" value="<?php echo ($row['10']); ?>" required><br><br><br>
					
					<span id="label">Course Location: </span>
					<input type="text" name="course_location" value="<?php echo ($row['11']); ?>" required>
					
					<span id="label">Course Instructor: </span>
					<input type="text" name="course_instructor" value="<?php echo ($row['12']); ?>" required><br><br><br>
					
					<span id="label">Registration Cost: $</span>
					<input type="text" name="registration_cost" value="<?php echo ($row['13']); ?>" required>
					
					<span id="label">Registration Date: </span>
					<input type="date" name="registration_date" value="<?php echo ($row['14']); ?>" required><br><br><br>
					
					<span id="label">Registration Time: </span>
					<input type="text" name="registration_time" value="<?php echo ($row['15']); ?>" required>
					
					<span id="label">Registration Location: </span>
					<input type="text" name="registration_location" value="<?php echo ($row['16']); ?>" required><br><br><br>
					
					<span id="label">Extra Supplies Needed: </span>
					<input type="text" name="extra_supplies" value="<?php echo ($row['17']); ?>" required><br><br><br>
					
					<span id="label">Instructor Credentials / Qualifications to Teach Course:</span><br>
					<textarea name="instructor_credentials" class="jqte-test"><?php echo ($row['18']); ?></textarea>
					
					<span id="label">Description of Class:</span><br>
					<textarea name="class_description" class="jqte-test"><?php echo ($row['19']); ?></textarea>
					
					<span id="label">Skills Gained from Taking Course:</span><br>
					<textarea name="skills_gained" class="jqte-test"><?php echo ($row['20']); ?></textarea>
					
					<span id="label">Job Opportunities and/or Benefits from Having Skills Described Above:</span><br>
					<textarea name="job_opportunities" class="jqte-test"><?php echo ($row['21']); ?></textarea>
					
					<span id="label">Partnering Organizations: </span>
					<input type="text" name="partnering_organizations" value="<?php echo ($row['22']); ?>"><br><br><br>
					
					<span id="label">Max Seats Available: </span>
					<input type="number" name="max_seats" min="1" max="50" value="<?php echo ($row['23']); ?>" required><br><br>
					
					<span id="label">Min Seats Required to Conduct Course: </span>
					<input type="number" name="min_seats" min="1" max="50" value="<?php echo ($row['24']); ?>" required><br><br><br>
					
					<span id="label">Additional Notes:</span><br>
					<textarea name="additional_notes" class="jqte-test"><?php echo ($row['25']); ?></textarea>
					
					<script>
						$('.jqte-test').jqte();
						
						// settings of status
						var jqteStatus = true;
						$(".status").click(function()
						{
							jqteStatus = jqteStatus ? false : true;
							$('.jqte-test').jqte({"status" : jqteStatus})
						});
					</script>
					
					<div id="options">
						<span id="label">Upload Additional Images/Logos/Documents: </span>
							<input type="file" name="additional_form" id="additional_form" value="<?php echo ($row['26']); ?>">
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					Primary Contact Signature: <input id="signature" type="text" name="primary_signature" value="<?php echo ($row['27']); ?>" required>
					Date: <input type="date" name="primary_date" value="<?php echo ($row['28']); ?>"><br><br><br>
					
					Dept./Div. Chair Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['29']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['30']); ?>"><br><br><br>
					
					Digital Media Manager Signature: <input id="signature" type="text" name="dmm_signature" value="<?php echo ($row['31']); ?>">
					Date: <input type="date" name="dmm_date" value="<?php echo ($row['32']); ?>"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
			</div>
		</div>
	</body>
</html>