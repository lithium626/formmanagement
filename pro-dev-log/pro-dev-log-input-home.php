<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Professional Development Log</title>
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
				<h2>Professional Development Log</h2>
				<div align="center">
					<form>
						<input type="button" value="Choose Log to Edit" onClick="window.location='pro-dev-log-choose.php'">
						<input type="button" value="Choose Log to Print" onClick="window.location='pro-dev-log-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="pro-dev-log-input" action="pro-dev-log-input.php" method="POST" autocomplete="on">
					<span id="label">Employee: </span>
					<input type="text" name="employee" placeholder="Employee Name" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Name'" required>
					
					<span id="label">Academic Year: </span>
					<select name="academic_year" required>
						<option value="">Choose One: </option>
						<option value="2015-2016">2015-2016</option>
						<option value="2016-2017">2016-2017</option>
						<option value="2017-2018">2017-2018</option>
					</select>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<table width="80%" border="2px">
						<tr>
							<th>Title of Workshop/Program/Webinar/Etc.</th><th>Location &amp; Date of Workshop/Program</th><th>Number of Hours of Professional Development</th>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_1" placeholder="Workshop 1" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 1'" required></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_1_hours" placeholder="Workshop 1 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 1 Hours'" required></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_2" placeholder="Workshop 2" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 2'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_2_hours" placeholder="Workshop 2 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 2 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_3" placeholder="Workshop 3" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 3'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_3_hours" placeholder="Workshop 3 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 3 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_4" placeholder="Workshop 4" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 4'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_4_hours" placeholder="Workshop 4 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 4 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_5" placeholder="Workshop 5" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 5'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_5_hours" placeholder="Workshop 5 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 5 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_6" placeholder="Workshop 6" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 6'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_6_hours" placeholder="Workshop 6 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 6 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_7" placeholder="Workshop 7" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 7'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_7_hours" placeholder="Workshop 7 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 7 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_8" placeholder="Workshop 8" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 8'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_8_hours" placeholder="Workshop 8 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 8 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_9" placeholder="Workshop 9" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 9'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_9_hours" placeholder="Workshop 9 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 9 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_10" placeholder="Workshop 10" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 10'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_10_hours" placeholder="Workshop 10 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 10 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_11" placeholder="Workshop 11" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 11'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_11_hours" placeholder="Workshop 11 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 11 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_12" placeholder="Workshop 12" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 12'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_12_hours" placeholder="Workshop 12 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 12 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_13" placeholder="Workshop 13" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 13'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_13_hours" placeholder="Workshop 13 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 13 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_14" placeholder="Workshop 14" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 14'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_14_hours" placeholder="Workshop 14 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 14 Hours'"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_15" placeholder="Workshop 15" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 15'"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_15_hours" placeholder="Workshop 15 Hours" onfocus="this.placeholder=''" onblur="this.placeholder='Workshop 15 Hours'"></td>
						</tr>
					</table>
		
					<div id="biglinebreak">&nbsp;</div>
					
					<input id="checkbox" type="radio" name="requirement_met" value="met" required> I met the College's 15 hour requirement for academic/professional development for this academic year.<br><br>
					<input id="checkbox" type="radio" name="requirement_met" value="not_met"> I did not meet the College's 15 hour requirement for academic/professional development for the academic year because:<br><br>
					<textarea name="reason_not_met" class="jqte-test"></textarea>
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
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Employee's Signature <input id="signature" type="text" name="employee_signature" placeholder="Employee's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Employee Signature'" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Date: <input type="date" name="employee_date" required><br><br><br>
					
					Supervisor's Signature: <input id="signature" type="text" name="supervisor_signature" placeholder="Supervisor's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Supervisor Signature'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Date: <input type="date" name="supervisor_date"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>