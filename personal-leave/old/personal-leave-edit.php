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
		<?php
			$id = $_POST['personal_leave_ID'];
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
				<h2>Request for Personal Leave</h2>
				<p style="text-align:center;">
					I request approval for the following personal leave:
				</p>
				<div id="biglinebreak">&nbsp;</div>
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
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>