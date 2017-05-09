<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #1</title>
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
				<h2>Performance Objective #1</h2>
				<div align="center">
					<form>
						<input type="button" value="Choose Objective to Edit" onClick="window.location='perf-obj-1-choose.php'">
						<input type="button" value="Choose Objective to Print" onClick="window.location='perf-obj-1-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<p>
					PERFORMANCE OBJECTIVES should be clearly measurable and jointly determined by the employee and supervisor.
				</p>
				<div id="biglinebreak">&nbsp;</div>
				<form name="perf-obj-1-input" action="perf-obj-1-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<span id="label">Name: </span>
					<input type="text" name="employee" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder='Name'" required>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" required>
					
					<br><br><br>
					
					<span id="label">Objective Setting Period: </span>
					<select name="obj_setting_period" required>
						<option value="">Choose One: </option>
						<option value="2015-2016">2015-2016</option>
						<option value="2016-2017">2016-2017</option>
						<option value="2017-2018">2017-2018</option>
					</select>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<br><br><br>
					
					<span id="label">SECTION 1 - PERFORMANCE OBJECTIVES</span><br><br>
					<p>
						Relate to duties as generally outlined in the individual job description and in support of the mission and goals of the college, the department and the supervisor goals, 
						objectives, and activities.  Objectives should be clearly written and given priorities.
					</p>
					<textarea name="section_1" class="jqte-test"></textarea>
					
					<br><br><br>
					
					<span id="label">SECTION 2 - PROFESSIONAL AND PERSONAL TRAINING AND DEVELOPMENT</span><br><br>
					<p>
						Relates to courses, workshops, seminars, and other activities designed to increase or maintain professional expertise, personal advancement, and job mobility.
					</p>
					<textarea name="section_2" class="jqte-test"></textarea>
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
					
					<div id="biglinebreak"></div>
					
					<hr>
					
					Employee's Signature <input id="signature" type="text" name="employee_signature" placeholder="Employee's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Signature'"><br><br>
					
					Supervisor's Signature: <input id="signature" type="text" name="supervisor_signature" placeholder="Supervisor's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Supervisor Signature'"><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>