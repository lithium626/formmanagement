<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Employee Request for Leave</title>
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
			$id = $_POST['sick_leave'];
			include("../dbconnect.php");
			$query = "SELECT * FROM employeeleave WHERE ID ='$id'";
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
			
				<h2>Sampson Community College<br><br>Employee Request for Leave</h2>
				<ol>
					<li>Annual leave must be requested in advance and approved by the appropriate supervisors before it is taken.  Annual leave cannot be taken in less than one (1) hour increments.</li>
					<li>If due to sickness you are unable to report to work, this request must be completed immediately upon your return.</li>
					<li>Records of Sick Leave and Annual Leave will be kept in the Business Office and any time over and above accumulated time due will be deducted from your salary.</li>
					<li>File one copy with the Business Office.</li>
				</ol>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Employee Leave" onClick="window.print()"></div><br><br><br><br>
				
				<form name="sick-leave-edit" action="sick-leave-edit-input.php" method="POST" autocomplete="on" style="margin-top: -75px;">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					
					<div style="float:right;">
						<span id="label">Date Filed: </span>
						<input type="date" name="date_filed" value="<?php echo ($row['4']); ?>" required>
					</div>
					
					<span id="label">Supervisor(s): </span>
					<input type="text" name="supervisor" value="<?php echo ($row['3']); ?>" required><br><br><br>
					
					<span id="label">SUBJECT: </span>
					<span id="label">Request for Leave </span><br><br>
					
					<span id="label">EMPLOYEE: </span>
					<input type="text" name="employee" value="<?php echo ($row['1']); ?>" required><br><br>
					
					<span id="label">EMPLOYEE EMAIL: </span>
					<input type="email" name="employee" value="<?php echo ($row['2']); ?>" required><br><br>
					
					<p>
						I request approval for the following leave from work:
					</p>
					
					<hr>
					<!--<div id="biglinebreak">&nbsp;</div>-->
					
					<div id="options">
					<span id="label">ANNUAL LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="al_date1" value="<?php echo ($row['5']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date1_timeout" value="<?php echo ($row['6']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date1_timein" value="<?php echo ($row['7']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date2" value="<?php echo ($row['8']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date2_timeout" value="<?php echo ($row['9']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date2_timein" value="<?php echo ($row['10']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date3" value="<?php echo ($row['11']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date3_timeout" value="<?php echo ($row['12']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date3_timein" value="<?php echo ($row['13']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date4" value="<?php echo ($row['14']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date4_timeout" value="<?php echo ($row['15']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date4_timein" value="<?php echo ($row['16']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date5" value="<?php echo ($row['17']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date5_timeout" value="<?php echo ($row['18']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date5_timein" value="<?php echo ($row['19']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="al_date6" value="<?php echo ($row['20']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="al_date6_timeout" value="<?php echo ($row['21']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="al_date6_timein" value="<?php echo ($row['22']); ?>"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="al_total_time" value="<?php echo ($row['23']); ?>"><br>
					</div>
					
					
					<!--<div id="biglinebreak">&nbsp;</div>-->
					<hr>
					<!--<div id="biglinebreak">&nbsp;</div>-->
					
					<div id="options">
					<span id="label">BONUS LEAVE HOURS</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="bl_date1" value="<?php echo ($row['24']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="bl_date1_timeout" value="<?php echo ($row['25']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="bl_date1_timein" value="<?php echo ($row['26']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="bl_date2" value="<?php echo ($row['27']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="bl_date2_timeout" value="<?php echo ($row['28']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="bl_date2_timein" value="<?php echo ($row['29']); ?>"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="bl_total_time" value="<?php echo ($row['30']); ?>"><br>
					</div>
					
					
					<!--<div id="biglinebreak">&nbsp;</div>-->
					<hr>
					<!--<div id="biglinebreak">&nbsp;</div>-->
					
					<div id="options">
					<span id="label">FUNERAL LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="fl_date1" value="<?php echo ($row['31']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="fl_date1_timeout" value="<?php echo ($row['32']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="fl_date1_timein" value="<?php echo ($row['33']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="fl_date2" value="<?php echo ($row['34']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="fl_date2_timeout" value="<?php echo ($row['35']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="fl_date2_timein" value="<?php echo ($row['36']); ?>"><br><br><br>
					
					<span id="label">TOTAL HOURS:</span>
					<input type="text" name="fl_total_time" value="<?php echo ($row['37']); ?>"><br><br><br>
					
					<span id="label">Relationship to Employee:</span>
					<input type="text" name="fl_relationship" value="<?php echo ($row['38']); ?>"><br>
					</div>
					
					
					<!--<div id="biglinebreak">&nbsp;</div>-->
					<hr>
					<!--<div id="biglinebreak">&nbsp;</div>-->
					
					<div id="options">
					<span id="label">SICK LEAVE</span><br><br>
					<span id="label">Date(s): </span>
					<input type="date" name="sl_date1" value="<?php echo ($row['39']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="sl_date1_timeout" value="<?php echo ($row['40']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="sl_date1_timein" value="<?php echo ($row['41']); ?>"><br><br><br>
					
					<span id="label">Date(s): </span>
					<input type="date" name="sl_date2" value="<?php echo ($row['42']); ?>">
					
					<span id="label">Time/From: </span>
					<input type="text" name="sl_date2_timeout" value="<?php echo ($row['43']); ?>">
					
					<span id="label">To: </span>
					<input type="text" name="sl_date2_timein" value="<?php echo ($row['44']); ?>"><br><br><br>
					
					<span id="label">TOTAL HOURS w/ MULTIPLIER:</span>
					<input type="text" name="sl_total_time" value="<?php echo ($row['45']); ?>">
					<span style="font-size: 13px;">***Faculty Enter Multiplier Used:</span> <input type="number" min="0" step="0.1" name="sl_multiplier" value="<?php echo ($row['46']); ?>"><br><br><br>
					<span id="label">Type of sick leave taken:</span><br><br>
					Personal / Family &nbsp; <input id="checkbox" type="radio" name="sl_type" value="personal-family" <?php if($row['47']=='personal-family') { print('checked'); } else { print(''); } ?>> &nbsp; 
					Maternity &nbsp; <input id="checkbox" type="radio" name="sl_type" value="maternity" <?php if($row['47']=='maternity') { print('checked'); } else { print(''); } ?>><br>
					</div>
					
					
					<!--<div id="biglinebreak">&nbsp;</div>-->
					<hr>
					<!--<div id="biglinebreak">&nbsp;</div>-->
					
					Applicant's Signature: <input id="signature" type="text" name="applicant_signature" value="<?php echo ($row['48']); ?>" required>
					Date: <input type="date" name="applicant_date" value="<?php echo ($row['49']); ?>"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['50']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['51']); ?>"><br><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['52']); ?>">
					Date: <input type="date" name="vp_date" value="<?php echo ($row['53']); ?>"><br><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					<hr>
				</form>
			</div>
		</div>
	</body>
</html>