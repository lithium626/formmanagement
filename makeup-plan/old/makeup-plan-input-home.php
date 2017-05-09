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
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Makeup Plan for Missed or Cancelled Classes</h2>
				
				<div align="center">
					<form>
						<input type="button" value="Choose Plan to Edit" onClick="window.location='makeup-plan-choose.php'">
						<input type="button" value="Choose Plan to Print" onClick="window.location='makeup-plan-choose-print.php'">
					</form>
				</div>
				
				<p>
					Time must be made up for any curriculum instructional that is missed or cancelled for any reason, 
					including inclement weather.  Class time may be made up at another date or by an alternative 
					method.  Sampson Community College recognizes several methods, as described below, for making up 
					class time.
				</p>
				<p>
					When class sessions are missed, instructors are responsible for determining with the Registrar and the 
					VP of Academics, how missed class hours will be made up.  Instructors also are responsible for 
					informing their supervisors and for completing this form.
				</p>
				<form name="makeup_plan_input" action="makeup-plan-input.php" method="POST" autocomplete="on">
					I certify that missed or cancelled class time was/will be made up as follows:<br><br><br>
					
					<span id="label">Instructor: </span>
					<input type="text" name="instructor" placeholder="Instructor" onfocus="this.placeholder = ''" onblur="this.placeholder='Instructor'" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee Email Address'" required><br><br><br>
					
					<?php
						include_once('../supervisor-list.php');
					?><br><br><br>
					
					
					<span id="label">Course Information: </span>
					<input type="text" name="class_missed" placeholder="Course Prefix/Number/Section" onfocus="this.placeholder = ''" onblur="this.placeholder='Course Prefix/Number/Section'" required>
					<input type="date" name="date_missed" required>
					<input type="number" min="0" step="0.25" name="time_missed" placeholder="Time Missed (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Time Missed (hrs)'" required>
					<hr>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="additional_time"> Add additional classes or additional minutes to 
					classes to provide equivalent instructional time.  The instructor must provide date/time class 
					was made up (see class roster):<br><br><br>
					<span id="label">Makeup Date/Time: </span>
					<input  type="date" name="additional_date">
					<input type="number" min="0" step="0.25" name="additional_met" placeholder="Additional Time Met (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Additional Time Met (hrs)'">
					<input type="number" min="0" step="0.25" name="additional_total" placeholder="Total Time Madeup (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Total Time Madeup (hrs)'">
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="moodle_assignment"> Provide Moodle online equivalent instruction.  
					(This option is available only to faculty with Moodle access either online, hybrid, or supplemental use.)  
					Paste the assignment in the box provided below (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br><br><br>
					<textarea name="moodle_description" class="jqte-test"></textarea>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="extra_assignment"> Require extra out-of-class assignment(s) that 
					provide equivalent instruction:<br><br><br>
					
					Approximate time to complete: <input type="number" min="0" step="0.25" name="extra_assignment_time" placeholder="Time to complete (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Time to complete (hrs)'">
					Total Time Madeup: <input type="number" min="0" step="0.25" name="extra_assignment_madeup" placeholder="Total Time Madeup (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Total Time Madeup (hrs)'"><br><br><br>
					Description of assignment (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br>
					<textarea name="extra_assignment_description" class="jqte-test"></textarea>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<input id="checkbox" type="checkbox" name="other">
					Other: <input type="text" name="other_assignment" placeholder="Other" onfocus="this.placeholder = ''" onblur="this.placeholder='Other'">
					Total Time Madeup: <input type="number" min="0" step="0.25" name="other_time" placeholder="Total Time Madeup (hrs)" onfocus="this.placeholder = ''" onblur="this.placeholder='Total Time Madeup (hrs)'"><br><br><br>
					Description of assignment (<span style="font-style: italic;">*Do Not directly paste from Moodle...paste into Word, then copy/paste here*</span>):<br>
					<textarea name="other_description" class="jqte-test"></textarea>
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
					<input id="checkbox" type="radio" name="cancellation_cause" value="inclement_weather"> Inclement Weather &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="personal_illness"> Personal Illness &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="cancellation_cause" value="family_illness"> Family Illness/Death &nbsp; &nbsp;<br><br><br>
					<input id="checkbox" type="radio" name="cancellation_cause" value="other_cause"> Other (Describe): 
					<input style="width:75%" type="text" name="other_cause_description" placeholder="Other cause description" onfocus="this.placeholder = ''" onblur="this.placeholder='Other cause description'">
					
					<hr>
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" placeholder="Instructor's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Instructor Signature'" required>
					Date: <input type="date" name="instructor_date"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" placeholder="Dept./Div. Chair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Dept./Div. Chair Signature'">
					Date: <input type="date" name="chair_date"><br><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" placeholder="VP of Acad. Affair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='VP of Acad. Affairs Signature'">
					Date: <input type="date" name="vp_date"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>