<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Request for Personal Leave</title>
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
				<h2>Request for Personal Leave</h2>
				<p style="text-align:center;">
					Instructional faculty may earn up to amaximum of one day of personal leave per semester annually (January 1 - December 31) provided 
					completed request forms, including class work and/or assignments, are submitted in advance to the appropriate supervisor (associate 
					dean, division chair, or department chair).  Personal leave may be taken in <span style="text-decoration:underline; font-weight:bold;">half-day or full-day</span> 
					increments and <span style="text-decoration:underline;font-weight:bold;">must include class, office, and admin hours.</span>  The granting of personal leave 
					is at the discretion of the appropriate supervisor and the Vice President of Academic Affairs.  Personal leave may accumulate within 
					the calendar year but is not cumulative beyond one year.
				</p>
				<div align="center">
					<form>
						<input type="button" value="Choose Request to Edit" onClick="window.location='personal-leave-choose.php'">
						<input type="button" value="Choose Request to Print" onClick="window.location='personal-leave-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="personal-leave-input" action="personal-leave-input.php" method="POST" autocomplete="on">
					<span id="label">Date Requested: </span>
					<input type="date" name="date_requested" required>
					
					<span id="label">Time Increment: </span>&nbsp;&nbsp;
					<input id="checkbox" type="radio" name="time_increment" value="half_day" required> Half-Day Increment&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="checkbox" type="radio" name="time_increment" value="full_day"> Full-Day Increment
					
					<div id="biglinebreak">&nbsp;</div>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" required>
					
					<span id="label">Employee: </span>
					<input type="text" name="employee" placeholder="Employee" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee'" required>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee Email Address'" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Employee's Signature: <input id="signature" type="text" name="employee_signature" placeholder="Employee Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Signature'"><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" placeholder="Dept./Div. Chair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Dept./Div. Chair Signature'"><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" placeholder="VP of Acad. Affair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='VP of Acad. Affairs Signature'"><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>