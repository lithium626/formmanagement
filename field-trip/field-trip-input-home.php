<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Field Trip Authorization</title>
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
				<h2>Field Trip Authorization</h2>
				<p>
					Requests should be submitted and approved in advance of trip.  Requests for vans should be submitted at least five (5) days in advance.
				</p>
				<div align="center">
					<form>
						<input type="button" value="Choose Form to Edit" onClick="window.location='field-trip-choose.php'">
						<input type="button" value="Choose Form to Print" onClick="window.location='field-trip-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="field-trip-input" action="field-trip-input.php" method="POST" autocomplete="on">
					<span id="label">Instructor(s): </span>
					<input type="text" name="instructor" placeholder="Instructor(s)" onfocus="this.placeholder = ''" onblur="this.placeholder='Instructor(s)'" required>
					
					<span id="label">Date: </span>
					<input type="date" name="date" required><br><br><br>
					
					<span id="label">Course No.: </span>
					<input type="text" name="course_number" placeholder="Course Number" onfocus="this.placeholder=''" onblur="this.placeholder='Course Number'" required>
					
					<span id="label">Course Title: </span>
					<input type="text" name="course_title" placeholder="Course Title" onfocus="this.placeholder=''" onblur="this.placeholder='Course Title'" required><br><br><br>
					
					<span id="label">Class Meeting Date: </span>
					<input type="date" name="class_meeting_date" required>
					
					<span id="label">Class Meeting Time: </span>
					<input type="text" name="class_meeting_time" placeholder="Class Meeting Time" onfocus="this.placeholder=''" onblur="this.placeholder='Class Meeting Time'" required><br><br><br>
					
					<span id="label">Class Location: </span>
					<input type="text" name="class_meeting_location" placeholder="Class Meeting Location" onfocus="this.placeholder=''" onblur="this.placeholder='Class Meeting Location'" required>
					
					<span id="label">Program Area: </span>
					<input type="text" name="program_area" placeholder="Program Area (Dept.)" onfocus="this.placeholder=''" onblur="this.placeholder='Program Area (Dept.)'" required><br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Email Address'" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">Mode of Travel: </span>
					<select name="mode_travel">
						<option value=''>Choose One: </option>
						<option value='school_van'>School Van</option>
						<option value='personal_vehicle'>Personal Vehicle</option>
						<option value='other'>Other</option>
					</select>&nbsp; &nbsp;
					
					<span id="label">Trip Destination: </span>
					<input type="text" name="trip_destination" placeholder="Trip Destination" onfocus="this.placeholder=''" onblur="this.placeholder='Trip Destination'" style="width: 35%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Purpose of Trip: </span>
					<input type="text" name="trip_purpose" placeholder="Purpose of Trip" onfocus="this.placeholder=''" onblur="this.placeholder='Purpose of Trip'" style="width: 80%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Departure Date: </span>
					<input type="date" name="departure_date" required>
					
					<span id="label">Departure Time: </span>
					<input type="text" name="departure_time" placeholder="Departure Time" onfocus="this.placeholder=''" onblur="this.placeholder='Departure Time'" required><br><br><br>
					
					<span id="label">Return Date: </span>
					<input type="date" name="return_date" required>
					
					<span id="label">Return Time: </span>
					<input type="text" name="return_time" placeholder="Return Time" onfocus="this.placeholder=''" onblur="this.placeholder='Return Time'" required><br><br><br>
					
					<span id="label">*Are there any costs associated with this trip? &nbsp; &nbsp;</span>
					<input id="checkbox" type="radio" name="costs" value="yes">YES &nbsp; &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="costs" value="no">NO &nbsp; &nbsp; &nbsp;
					<div style="font-size: 12px; font-style: italic;">*No financial commitments should be made without obtaining prior approval.</div><br><br>
					<span id="label">If YES, please explain: </span>
					<input type="text" name="costs_explanation" placeholder="Explanation of Costs" onfocus="this.placeholder=''" onblur="this.placeholder='Explanation of Costs'" style="width: 80%; box-sizing: border-box"><br><br><br>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
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