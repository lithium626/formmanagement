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
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Continuing Education Press &amp; Information Release</h2>
				<p>
					Requests should be submitted and approved by you supervisor, then forwarded to the Digital Media Manager for publication.
				</p>
				<div align="center">
					<form>
						<input type="button" value="Choose Form to Edit" onClick="window.location='coned-press-release-choose.php'">
						<input type="button" value="Choose Form to Print" onClick="window.location='coned-press-release-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="coned-press-release-input" action="coned-press-release-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<span id="label">PRIMARY CONTACT / PROGRAM COORDINATOR</span><br><br><br>
					
					<span id="label">Name: </span>
					<input type="text" name="instructor" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder='Name'" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Email Address'" required><br><br><br>
					
					<span id="label">Employee Phone Number: </span>
					<input type="tel" name="employee_phone" placeholder="xxx-xxx-xxxx format" onfocus="this.placeholder=''" onblur="this.placeholder='xxx-xxx-xxxx format'" required>
					
					<span id="label"> ext:</span>
					<input type="text" name="employee_extension" placeholder="xxxx" onfocus="this.placeholder''" onblur="this.placeholder='xxxx'" required><br><br><br>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<hr>
					
					<span id="label">NEW CLASS (Continuing Education)</span><br><br><br>
					
					<span id="label">Start Date: </span>
					<input type="date" name="start_date" required>
					
					<span id="label">End Date: </span>
					<input type="date" name="end_date" required><br><br><br>
					
					<span id="label">Meeting Day(s): </span>
					<input type="text" name="meeting_day" placeholder="ie: Monday, Tues, MTWR" onfocus="this.placeholder=''" onblur="this.placeholder='ie: Monday, Tues, MTWR'" required>
					
					<span id="label">Meeting Time(s): </span>
					<input type="text" name="meeting_time" placeholder="ie: 6-9pm" onfocus="this.placeholder=''" onblur="this.placeholder='ie: 6-9pm'" required><br><br><br>
					
					<span id="label">Course Location: </span>
					<input type="text" name="course_location" placeholder="Course Location" onfocus="this.placeholder=''" onblur="this.placeholder='Course Location'" required>
					
					<span id="label">Course Instructor: </span>
					<input type="text" name="course_instructor" placeholder="Course Instructor" onfocus="this.placeholder=''" onblur="this.placeholder='Course Instructor'" required><br><br><br>
					
					<span id="label">Registration Cost: $</span>
					<input type="text" name="registration_cost" placeholder="Registration Cost" onfocus="this.placeholder=''" onblur="this.placeholder='Registration Cost'" required>
					
					<span id="label">Registration Date: </span>
					<input type="date" name="registration_date" required><br><br><br>
					
					<span id="label">Registration Time: </span>
					<input type="text" name="registration_time" placeholder="ie: 6pm or 1800" onfocus="this.placeholder=''" onblur="this.placeholder='ie: 6pm or 1800'" required>
					
					<span id="label">Registration Location: </span>
					<input type="text" name="registration_location" placeholder="ie: Bldg & Room - E100" onfocus="this.placeholder=''" onblur="this.placeholder='ie: Bldg & Room - E100'" required><br><br><br>
					
					<span id="label">Extra Supplies Needed: </span>
					<input type="text" name="extra_supplies" placeholder="Extra Supplies Needed" onfocus="this.placeholder=''" onblur="this.placeholder='Extra Supplies Needed'" style="width: 60%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Instructor Credentials / Qualifications to Teach Course:</span><br>
					<textarea name="instructor_credentials" class="jqte-test"></textarea>
					
					<span id="label">Description of Class:</span><br>
					<textarea name="class_description" class="jqte-test"></textarea>
					
					<span id="label">Skills Gained from Taking Course:</span><br>
					<textarea name="skills_gained" class="jqte-test"></textarea>
					
					<span id="label">Job Opportunities and/or Benefits from Having Skills Described Above:</span><br>
					<textarea name="job_opportunities" class="jqte-test"></textarea>
					
					<span id="label">Partnering Organizations: </span>
					<input type="text" name="partnering_organizations" placeholder="Partnering Organizations" onfocus="this.placeholder=''" onblur="this.placeholder='Partnering Organizations'" style="width: 100%; box-sizing: border-box"><br><br><br>
					
					<span id="label">Max Seats Available: </span>
					<input type="number" name="max_seats" min="1" max="50" required><br><br>
					
					<span id="label">Min Seats Required to Conduct Course: </span>
					<input type="number" name="min_seats" min="1" max="50" required><br><br><br>
					
					<span id="label">Additional Notes:</span><br>
					<textarea name="additional_notes" class="jqte-test"></textarea>
					
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
							<input type="file" name="additional_form" id="additional_form">
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					Primary Contact Signature: <input id="signature" type="text" name="primary_signature" placeholder="Primary Contact Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Primary Contact Signature'" required>
					Date: <input type="date" name="primary_date"><br><br><br>
					
					Dept./Div. Chair Signature: <input id="signature" type="text" name="chair_signature" placeholder="Dept./Div. Chair Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Dept./Div. Chair Signature'">
					Date: <input type="date" name="chair_date"><br><br><br>
					
					Digital Media Manager Signature: <input id="signature" type="text" name="dmm_signature" placeholder="Digital Media Manager Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Digital Media Manager Signature'">
					Date: <input type="date" name="dmm_date"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>