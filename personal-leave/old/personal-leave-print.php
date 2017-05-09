<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Request for Personal Leave</title>
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
			$id = $_POST['personal_leave'];
			include("../dbconnect.php");
			$query = "SELECT * FROM personalleave WHERE ID ='$id'";
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
			
				<h2>Sampson Community College<br><br>Request for Personal Leave</h2>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Employee Leave" onClick="window.print()"></div><br><br>
				
				<p style="text-align:center; margin-left:15%; margin-right:15%">
					Instructional faculty may earn up to amaximum of one day of personal leave per semester annually (January 1 - December 31) provided 
					completed request forms, including class work and/or assignments, are submitted in advance to the appropriate supervisor (associate 
					dean, division chair, or department chair).  Personal leave may be taken in <span style="text-decoration:underline; font-weight:bold;">half-day or full-day</span> 
					increments and <span style="text-decoration:underline;font-weight:bold;">must include class, office, and admin hours.</span>  The granting of personal leave 
					is at the discretion of the appropriate supervisor and the Vice President of Academic Affairs.  Personal leave may accumulate within 
					the calendar year but is not cumulative beyond one year.
				</p><br><br><br>
				
				<form name="personal-leave-edit" action="personal-leave-edit-input.php" method="POST" autocomplete="on">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					
					<span id="label">Date Requested: </span>
					<input type="date" name="date_requested" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Time Increment: </span>&nbsp;&nbsp;
					<input id="checkbox" type="radio" name="time_increment" value="half_day" <?php if($row['2']=='half_day') { print('checked'); } else { print(''); } ?> required> Half-Day Increment&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="checkbox" type="radio" name="time_increment" value="full_day" <?php if($row['2']=='full_day') { print('checked'); } else { print(''); } ?>> Full-Day Increment<br><br><br>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" value="<?php echo ($row['3']); ?>" required>
					
					<span id="label">Employee: </span>
					<input type="text" name="employee" value="<?php echo ($row['4']); ?>" required><br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['5']); ?>" required>
					
					<span id="label">Supervisor(s): </span>
					<input type="text" name="supervisor" value="<?php echo ($row['6']); ?>" required>
					
						
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Employee's Signature: <input id="signature" type="text" name="employee_signature" value="<?php echo ($row['7']); ?>"><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['8']); ?>"><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['9']); ?>"><br><br>
					
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					<hr>
				</form>
			</div>
		</div>
	</body>
</html>