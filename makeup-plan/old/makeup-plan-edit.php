<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Makeup Plan</title>
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
			$id = $_POST['makeup_plan_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM makeupplan WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Makeup Plan for Missed or Cancelled Classes</h2>
				
				<p>
					Time must be made up for any curriculum instructional that is missed or cancelled for any reason, 
					including inclement weather.  Class time may be made up at another date or by an alternative 
					method.  Sampson Community College recognizes several methods, as described below, for making up 
					class time.
				</p>
				<p>
					When class sessions are missed, instructors are resonsible for determing with the Registrar and the 
					VP of Academics, how missed class hours will be made up.  Instructors also are responsible for 
					informing their supervisors and for completing this form.
				</p>
				<form name="makeup-plan-edit" action="makeup-plan-edit-input.php" method="POST" autocomplete="on">
					I certify that missed or cancelled class time was/will be made up as follows:<br><br><br>
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					
					<span id="label">Instructor: </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['3']); ?>" required><br><br><br>
					
					<span id="label">Course Information: </span>
					<input type="text" name="class_missed" value="<?php echo ($row['4']); ?>" required>
					<input type="date" name="date_missed" value="<?php echo ($row['5']); ?>" required>
					<input type="number" min="0" step="0.25" name="time_missed" value="<?php echo ($row['6']); ?>" required>
					<hr>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="additional_time" <?php if($row['7']=='on') { print('checked'); } else { print(''); } ?>> Add additional classes or additional minutes to 
					classes to provide equivalent instructional time.  The instructor must provide date/time class 
					was made up (see class roster):<br><br><br>
					<span id="label">Makeup Date/Time: </span>
					<input type="date" name="additional_date" value="<?php echo ($row['8']); ?>">
					<input type="number" min="0" step="0.25" name="additional_met" value="<?php echo ($row['9']); ?>">
					<input type="number" min="0" step="0.25" name="additional_total" value="<?php echo ($row['10']); ?>">
					
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="moodle_assignment" <?php if($row['11']=='on') { print('checked'); } else { print(''); } ?>> Provide Moodle online equivalent instruction.  
					(This option is available only to faculty with Moodle access either online, hybrid, or supplemental use.)  
					Paste the assignment in the box provided below (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br><br><br>
					<textarea name="moodle_description" class="jqte-test"><?php echo ($row['12']); ?></textarea>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="extra_assignment" <?php if($row['13']=='on') { print('checked'); } else { print(''); } ?>> Require extra out-of-class assignment(s) that 
					provide equivalent instruction:<br><br><br>
					
					Approximate time to complete: <input type="number" min="0" step="0.25" name="extra_assignment_time" value="<?php echo ($row['14']); ?>">
					Total Time Madeup: <input type="number" min="0" step="0.25" name="extra_assignment_madeup" value="<?php echo ($row['15']); ?>"><br><br><br>
					Description of assignment (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br>
					<textarea name="extra_assignment_description" class="jqte-test"><?php echo ($row['16']); ?></textarea>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="other" <?php if($row['17']=='on') { print('checked'); } else { print(''); } ?>>
					Other: <input type="text" name="other_assignment" value="<?php echo ($row['18']); ?>">
					Total Time Madeup: <input type="number" min="0" step="0.25" name="other_time" value="<?php echo ($row['19']); ?>"><br><br><br>
					Description of assignment (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br>
					<textarea name="other_description" class="jqte-test"><?php echo ($row['20']); ?></textarea>
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
					</div>
					<hr>
					Class cancellation caused by:<br><br><br>
					<input id="checkbox" type="radio" name="cancellation_cause" value="inclement_weather" <?php if($row['21']=='inclement_weather') { print('checked'); } else { print(''); } ?>> Inclement Weather &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="personal_illness" <?php if($row['21']=='personal_illness') { print('checked'); } else { print(''); } ?>> Personal Illness &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="family_illness" <?php if($row['21']=='family_illness') { print('checked'); } else { print(''); } ?>> Family Illness/Death &nbsp; &nbsp;<br><br><br>
					<input id="checkbox" type="radio" name="cancellation_cause" value="other_cause" <?php if($row['21']=='other_cause') { print('checked'); } else { print(''); } ?>> Other (Describe): 
					<input style="width:75%" type="text" name="other_cause_description" value="<?php echo ($row['22']); ?>">
					
					<hr>
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" value="<?php echo ($row['23']); ?>" required>
					Date: <input type="date" name="instructor_date" value="<?php echo ($row['24']); ?>"><br><br><br>
					
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['25']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['26']); ?>"><br><br><br>
					
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['27']); ?>">
					Date: <input type="date" name="vp_date" value="<?php echo ($row['28']); ?>"><br><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;" id="highlight">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Edit Makeup Plan"></div>
				</form>
			</div>
		</div>
	</body>
</html>