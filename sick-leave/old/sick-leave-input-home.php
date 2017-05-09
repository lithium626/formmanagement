<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Employee Request for Leave</title>
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
				<h2>Employee Request for Leave</h2>
				<ol>
					<li>Annual leave must be requested in advance and approved by the appropriate supervisors before it is taken.  Annual leave cannot be taken in less than one (1) hour increments.</li>
					<li>If due to sickness you are unable to report to work, this request must be completed immediately upon your return.</li>
					<li>Records of Sick Leave and Annual Leave will be kept in the Business Office and any time over and above accumulated time due will be deducted from your salary.</li>
					<li>File one copy with the Business Office.</li>
				</ol>
				<br><br>
				<p style="text-align:center;">
					I request approval for the following leave from work:
				</p>
				<div align="center">
					<form>
						<input type="button" value="Choose Request to Edit" onClick="window.location='sick-leave-choose.php'">
						<input type="button" value="Choose Request to Print" onClick="window.location='sick-leave-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="sick-leave-input" action="sick-leave-input.php" method="POST" autocomplete="on">
					<span id="label">Date Filed: </span>
					<input type="date" name="date_filed" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<br><br><br>
					
					<span id="label">Employee: </span>
					<input type="text" name="employee" placeholder="Employee" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee'" required>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee Email Address'" required>
					
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">ANNUAL LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="al_date1" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date1_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date1_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date2" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date2_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date2_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date3" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date3_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date3_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date4" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date4_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date4_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date5" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date5_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date5_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date6" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date6_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="al_date6_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="al_total_time" placeholder="Total Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Total Hours'"><br><br><br>
					</div>
					
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">BONUS LEAVE HOURS</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="bl_date1" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="bl_date1_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="bl_date1_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="bl_date2" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="bl_date2_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="bl_date2_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="bl_total_time" placeholder="Total Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Total Hours'"><br><br><br>
					</div>
					
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">FUNERAL LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="fl_date1" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="fl_date1_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="fl_date1_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="fl_date2" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="fl_date2_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="fl_date2_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="fl_total_time" placeholder="Total Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Total Hours'"><br><br><br>
					
					<span id="label">Relationship to Employee:</span>
					<input type="text" name="fl_relationship" placeholder="Relationship to Employee" onfocus="this.placeholder=''" onblur="this.placeholder='Relationship to Employee'"><br><br><br>
					</div>
					
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">SICK LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="sl_date1" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="sl_date1_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="sl_date1_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="sl_date2" placeholder="Date(s)" onfocus="this.placeholder=''" onblur="this.placeholder='Date(s)'">
					
					<span id="label">Time/From: </span>
					<input type="text" name="sl_date2_timeout" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'">
					
					<span id="label">To: </span>
					<input type="text" name="sl_date2_timein" placeholder="Time" onfocus="this.placeholder=''" onblur="this.placeholder='Time'"><br><br><br>
					
					<span id="label">TOTAL HOURS w/ MULTIPLIER:</span>
					<input type="text" name="sl_total_time" placeholder="Total Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Total Hours'">
					<span style="font-size: 13px;">***Faculty Enter Multiplier Used:</span> <input type="number" min="0" step="0.1" name="sl_multiplier" placeholder="Faculty Multiplier" onfocus="this.placeholder=''" onblur="this.placeholder='Faculty Multiplier'"><br><br><br>
					<span id="label">Type of sick leave taken:</span><br><br>
					Personal / Family &nbsp; <input id="checkbox" type="radio" name="sl_type" value="personal-family" checked> &nbsp; 
					Maternity &nbsp; <input id="checkbox" type="radio" name="sl_type" value="maternity"><br><br><br>
					</div>
					
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Applicant's Signature: <input id="signature" type="text" name="applicant_signature" placeholder="Applicant's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Applicant's Signature'" required>
					Date: <input type="date" name="applicant_date"><br><br><br>
					
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