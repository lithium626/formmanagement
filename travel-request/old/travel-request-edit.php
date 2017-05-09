<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - In-State Overnight/Out-Of-State Travel Request</title>
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
			$id = $_POST['travel_request_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM travelrequest WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>In-State Overnight / Out-of-State Travel Request</h2>
				<div id="biglinebreak">&nbsp;</div>
				<form name="travel-request-edit" action="travel-request-edit-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Employee: </span>
					<input type="text" name="employee" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" value="<?php echo ($row['2']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['3']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Travel To: </span>
					<input type="text" name="destination" value="<?php echo ($row['4']); ?>" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['5']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Date of Travel: </span>
					<span id="label">Period Begins: </span>
					<input type="date" name="period_begins" value="<?php echo ($row['6']); ?>" required>
					<span id="label">Period Ends: </span>
					<input type="date" name="period_ends" value="<?php echo ($row['7']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Purpose of Travel: </span>
					<input type="text" name="purpose" value="<?php echo ($row['8']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Mode of Transportation: </span>
					<input type="text" name="mode_transportation" value="<?php echo ($row['9']); ?>" required>
					<span id="label">Air Fare: $ </span>
					<input type="text" name="air_fare" value="<?php echo ($row['10']); ?>">
					
					<br><br><br>
					
					<span id="label">Registration Fee: $ </span>
					<input type="text" name="registration_fee" value="<?php echo ($row['11']); ?>"><br><br>
					(Deduct cost of any social functions of unrelated items.  Any meals included in registration fee are not to be claimed in daily meal allowances.)
					
					<div id="biglinebreak"></div>
					
					<span id="label">Total Estimated Expenditures: $ </span>
					<input type="text" name="total_expenditures" value="<?php echo ($row['12']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Request Approval For: </span>
					<div id="biglinebreak"></div>
					<div style="margin-left: 10%;">
						<input id="checkbox" type="checkbox" name="in_state" <?php if($row['13']=='on') { print('checked="checked"'); } else { print(''); } ?>> In-State Overnight Travel<br><br>
						<input id="checkbox" type="checkbox" name="out_of_state"<?php if($row['14']=='on') { print('checked="checked"'); } else { print(''); } ?>> Out-of-State Travel<br><br>
						<input id="checkbox" type="checkbox" name="excess_lodging" <?php if($row['15']=='on') { print('checked="checked"'); } else { print(''); } ?>> Excess Lodging $ <input type="text" name="excess_lodging_amount" value="<?php echo ($row['16']); ?>"> Plus Tax Per Night (Total Fees)<br><br>
						<input id="checkbox" type="checkbox" name="excess_registration" <?php if($row['17']=='on') { print('checked="checked"'); } else { print(''); } ?>> Excess Registration Fees of $ <input type="text" name="excess_registration_amount" value="<?php echo ($row['18']); ?>"> (Total Fees)<br><br>
					</div>
					
					<div id="biglinebreak"></div>
					
					<span id="label">Notes: </span>
					<div id="biglinebreak"></div>
					<ol>
						<li>If excess registration fees are requested, a copy of the program reflecting the charges in the registration fee must be attached to this form.  Also, the copy of the program 
						should be attached for all out-of-state travel requests.</li>
						<li>This request is to be approved prior to any in-state overnight travel or any out-of-state travel.</li>
						<li>This requet, upon approval, is to be filed with each request for reimbursement of travel and other expenses form.  Any unauthorized travel requests submitted to the Business 
						Office will not be reimbursed.</li>
						<li>In-state overnight travel, out-of-state travel, excess registration fees, and excess lodging fees must be approved by the President for all employees.</li>
					</ol>
					
					<div id="biglinebreak"></div>
					
					<span id="label">Upload Additional Forms (per Notes above): </span>
					<input id="filename" type="text" name="additional_form" value="<?php echo ($row['19']); ?>">
					<!--<span id="label">(must be MS Word .docx document)</span>-->
										
					<div id="biglinebreak"></div>
					
					<hr>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['20']); ?>"><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['21']); ?>"><br><br>
					
					President or Designee's Signature: <input id="signature" type="text" name="president_signature" value="<?php echo ($row['22']); ?>"><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>