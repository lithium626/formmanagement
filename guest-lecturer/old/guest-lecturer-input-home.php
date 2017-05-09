<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Guest Lecturer / Class Coverage Authorization</title>
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
				<h2>Guest Lecturer / Class Coverage Authorization</h2>
				<p>
					Requests should be submitted and approved in advance if possible.  Please inform your Dept. / Div. Chair when this form is complete.
				</p>
				<div align="center">
					<form>
						<input type="button" value="Choose Form to Edit" onClick="window.location='guest-lecturer-choose.php'">
						<input type="button" value="Choose Form to Print" onClick="window.location='guest-lecturer-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="guest-lecturer-input" action="guest-lecturer-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<span id="label">Instructor(s): </span>
					<input type="text" name="instructor" placeholder="Instructor(s)" onfocus="this.placeholder = ''" onblur="this.placeholder='Instructor(s)'" required>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" required><br><br><br>
					
					<span id="label">Course No.: </span>
					<input type="text" name="course_number" placeholder="Course Number" onfocus="this.placeholder=''" onblur="this.placeholder='Course Number'" required>
					
					<span id="label">Course Title: </span>
					<input type="text" name="course_title" placeholder="Course Title" onfocus="this.placeholder=''" onblur="this.placeholder='Course Title'" required><br><br><br>
					
					<span id="label">Course Date: </span>
					<input type="date" name="course_date" required>
					
					<span id="label">Course Time: </span>
					<input type="text" name="course_time" placeholder="Course Time" onfocus="this.placeholder=''" onblur="this.placeholder='Course Time'" required><br><br><br>
					
					<span id="label">Course Location: </span>
					<input type="text" name="course_location" placeholder="Course Location" onfocus="this.placeholder=''" onblur="this.placeholder='Course Location'" required>
					
					<span id="label">Guest Lecturer: </span>
					<input type="text" name="guest_lecturer" placeholder="Guest Lecturer" onfocus="this.placeholder=''" onblur="this.placeholder='Guest Lecturer'" required><br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Email Address'" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					<div id="options">
					<span id="label">*Are there any costs associated with this trip? &nbsp; &nbsp;</span>
					<input id="checkbox" type="radio" name="costs" value="yes">YES &nbsp; &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="costs" value="no">NO &nbsp; &nbsp; &nbsp;
					<div style="font-size: 12px; font-style: italic;">*No financial commitments should be made without obtaining prior approval.</div><br><br>
					<span id="label">If YES, please explain: </span>
					<input type="text" name="costs_explanation" placeholder="Explanation of Costs" onfocus="this.placeholder=''" onblur="this.placeholder='Explanation of Costs'" style="width: 80%; box-sizing: border-box"><br><br><br>
					
					Description of topic(s) to be presented:<br>
					<textarea name="topic_presented" class="jqte-test"></textarea>
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
					<input type="file" name="additional_form" id="additional_form">
					<span id="label">(must be MS Word .docx document or PDF document)</span>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
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