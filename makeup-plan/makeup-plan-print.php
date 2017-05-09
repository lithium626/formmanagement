<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Makeup Plan</title>
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
			$id = $_POST['makeup_plan'];
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
			
				<div id="printlogo">
					<img src="../img/logoheader.png">
				</div>
	
				<h2>Sampson Community College<br><br>Makeup Plan for Missed or Cancelled Classes</h2>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Makeup Plan" onClick="window.print()"></div>
				
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
					
					<span id="label">Instructor: </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['3']); ?>" required><br><br><br>
					
					<span id="label">Course Information: </span>
					<input type="text" name="class_missed" value="<?php echo ($row['4']); ?>" required>
					<input type="date" name="date_missed" value="<?php echo ($row['5']); ?>" required>
					<input type="number" min="0" step="0.5" name="time_missed" value="<?php echo ($row['6']); ?>" required>
					<hr>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="additional_time" <?php if($row['7']=='on') { print('checked'); } else { print(''); } ?>> Add additional classes or additional minutes to 
					classes to provide equivalent instructional time.  The instructor must provide date/time class 
					was made up (see class roster):<br><br><br>
					<span id="label">Makeup Date/Time: </span>
					<input name="additional_date" id="date2 datePick" type="text" value="<?php echo ($row['8']); ?>"/>
						<script>
							$('#datePick').multiDatesPicker();
						</script>
					<!--<input id="date2" type="date" name="additional_date" value="<?php //echo ($row['8']); ?>">-->
					<input type="number" min="0" step="0.5" name="additional_met" value="<?php echo ($row['9']); ?>">
					<input type="number" min="0" step="0.5" name="additional_total" value="<?php echo ($row['10']); ?>">
					<script>
						document.getElementById('date2').valueAsDate = new Date.today();
					</script>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="moodle_assignment" <?php if($row['11']=='on') { print('checked'); } else { print(''); } ?>> Provide Moodle online equivalent instruction.  
					(This option is available only to faculty with Moodle access either online, hybrid, or supplemental use.)  
					Paste the assignment in the box provided below:<br><br><br>
					<?php
						if($row['12'] == '')
						{
							echo "Moodle Assignment - NONE";
						} else {
							echo "<textarea name='moodle_description' class='jqte-test'>";
							echo $row['12'];
							echo "</textarea>";
						}
					?>
					<span id="label">Upload Additional Documents: </span>
					<?php print("<a target='_blank' href='http://forms.sampsoncc.edu/mup-forms/" . $row['21'] . "'>");
						echo ($row['21']);
						print("</a>");
					?>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="extra_assignment" <?php if($row['13']=='on') { print('checked'); } else { print(''); } ?>> Require extra out-of-class assignment(s) that 
					provide equivalent instruction:<br><br><br>
					
					Approximate time to complete: <input type="number" min="0" step="0.5" name="extra_assignment_time" value="<?php echo ($row['14']); ?>">
					Total Time Madeup: <input type="number" min="0" step="0.5" name="extra_assignment_madeup" value="<?php echo ($row['15']); ?>"><br><br><br>
					Description of assignment:<br>
					<?php
						if($row['16'] == '')
						{
							echo "Extra Assignment - NONE";
						} else {
							echo "<textarea name='moodle_description' class='jqte-test'>";
							echo $row['16'];
							echo "</textarea>";
						}
					?>
					<span id="label">Upload Additional Documents: </span>
					<?php print("<a target='_blank' href='http://forms.sampsoncc.edu/mup-forms/" . $row['21'] . "'>");
						echo ($row['21']);
						print("</a>");
					?>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="other" <?php if($row['17']=='on') { print('checked'); } else { print(''); } ?>>
					Other: <input type="text" name="other_assignment" value="<?php echo ($row['18']); ?>">
					Total Time Madeup: <input type="number" min="0" step="0.5" name="other_time" value="<?php echo ($row['19']); ?>"><br><br><br>
					Description of assignment:<br>
					<?php
						if($row['20'] == '')
						{
							echo "Other Assignment/Activity - NONE";
						} else {
							echo "<textarea name='moodle_description' class='jqte-test'>";
							echo $row['20'];
							echo "</textarea>";
						}
					?>
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
					<span id="label">Upload Additional Documents: </span>
					<?php print("<a target='_blank' href='http://forms.sampsoncc.edu/gl-forms/" . $row['21'] . "'>");
						echo ($row['21']);
						print("</a>");
					?>
					</div>
					<hr>
					Class cancellation caused by:<br><br><br>
					<input id="checkbox" type="radio" name="cancellation_cause" value="inclement_weather" <?php if($row['22']=='inclement_weather') { print('checked'); } else { print(''); } ?>> Inclement Weather &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="personal_illness" <?php if($row['22']=='personal_illness') { print('checked'); } else { print(''); } ?>> Personal Illness &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="family_illness" <?php if($row['22']=='family_illness') { print('checked'); } else { print(''); } ?>> Family Illness/Death &nbsp; &nbsp;<br><br>
					<input id="checkbox" type="radio" name="cancellation_cause" value="other_cause" <?php if($row['22']=='other_cause') { print('checked'); } else { print(''); } ?>> Other (Describe): 
					<input style="width:75%" type="text" name="other_cause_description" value="<?php echo ($row['23']); ?>">
					
					<hr>
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" value="<?php echo ($row['24']); ?>" required>
					Date: <input type="date" name="instructor_date" value="<?php echo ($row['25']); ?>"><br><br><br>
					
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['26']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['27']); ?>"><br><br><br>
					
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['28']); ?>">
					Date: <input type="date" name="vp_date" value="<?php echo ($row['29']); ?>"><br><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div><br><br><br>
					<hr>
				</form>
			</div>
		</div>
	</body>
</html>