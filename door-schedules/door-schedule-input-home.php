<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Faculty / Staff Door Schedule</title>
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
				<h2>Faculty / Staff Semester Door Schedule</h2>
				
				<div align="center">
					<form>
						<input type="button" value="Choose Schedule to Edit" onClick="window.location='door-schedule-choose.php'">
						<input type="button" value="Choose Schedule to Print" onClick="window.location='door-schedule-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<p>
					Complete the form and upload your semester door schedule in either MS Word (.docx) or PDF format.
				</p>
				<form name="door-schedule-input" action="door-schedule-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<span id="label">Faculty / Staff: </span>
					<input type="text" name="instructor" placeholder="Instructor(s)" onfocus="this.placeholder = ''" onblur="this.placeholder='Instructor(s)'" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Email Address'" required>
					
					<br><br>
					
					<span id="label">Semester Schedule: </span>
					<select name="semester" required>
						<option value="">Choose One: </option>
						<option value="2017sp">Spring 2017</option>
						<option value="2017su">Summer 2017</option>
						<option value="2017fa">Fall 2017</option>
					</select>
					<span style="margin-right: 20px;">&nbsp;</span>
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					<div id="options">
					
					<span id="label">Upload Semester Door Schedule: </span>
					<input type="file" name="schedule_form" id="additional_form">
					<span id="label">(must be MS Word .docx document or PDF document)</span>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					Employee's Signature: <input id="signature" type="text" name="instructor_signature" placeholder="Instructor's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Instructor Signature'" required>
					Date: <input type="date" name="instructor_date"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" placeholder="Dept./Div. Chair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Dept./Div. Chair Signature'">
					Date: <input type="date" name="chair_date"><br><br><br>
					
					<!--VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" placeholder="VP of Acad. Affair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='VP of Acad. Affairs Signature'">
					Date: <input type="date" name="vp_date"><br><br><br>-->

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Storage"></div>
				</form>
			</div>
		</div>
	</body>
</html>