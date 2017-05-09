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
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>In-State Overnight / Out-of-State Travel Request</h2>
				<div align="center">
					<form>
						<input type="button" value="Choose Request to Edit" onClick="window.location='travel-request-choose.php'">
						<input type="button" value="Choose Request to Print" onClick="window.location='travel-request-choose-print.php'">
					</form>
				</div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="travel-request-input" action="travel-request-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<span id="label">Employee: </span>
					<input type="text" name="employee" placeholder="Employee" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee'" required>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" required>
					
					<br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" placeholder="Employee Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Employee Email Address'" required>
					
					<br><br><br>
					
					<span id="label">Travel To: </span>
					<input type="text" name="destination" placeholder="Destination" onfocus="this.placeholder = ''" onblur="this.placeholder='Destination'" required>
					
					<?php
						include_once('../supervisor-list.php');
					?>
					
					<br><br><br>
					
					<span id="label">Date of Travel: </span>
					<span id="label">Period Begins: </span>
					<input type="date" name="period_begins" required>
					<span id="label">Period Ends: </span>
					<input type="date" name="period_ends" required>
					
					<br><br><br>
					
					<span id="label">Purpose of Travel: </span>
					<input type="text" name="purpose" placeholder="Purpose of Travel" onfocus="this.placeholder = ''" onblur="this.placeholder='Purpose of Travel'" required>
					
					<br><br><br>
					
					<span id="label">Mode of Transportation: </span>
					<input type="text" name="mode_transportation" placeholder="Mode of Transportation" onfocus="this.placeholder = ''" onblur="this.placeholder='Mode of Transportation'" required>
					<span id="label">Air Fare: $ </span>
					<input type="text" name="air_fare" placeholder="Air Fare" onfocus="this.placeholder = ''" onblur="this.placeholder='Air Fare'">
					
					<br><br><br>
					
					<span id="label">Registration Fee: $ </span>
					<input type="text" name="registration_fee" placeholder="Registration Fee" onfocus="this.placeholder = ''" onblur="this.placeholder='Registration Fee'"><br><br>
					(Deduct cost of any social functions of unrelated items.  Any meals included in registration fee are not to be claimed in daily meal allowances.)
					
					<div id="biglinebreak"></div>
					
					<span id="label">Total Estimated Expenditures: $ </span>
					<input type="text" name="total_expenditures" placeholder="Total Estimated Expenditures" onfocus="this.placeholder = ''" onblur="this.placeholder='Total Estimated Expenditures'" required>
					
					<br><br><br>
					
					<span id="label">Request Approval For: </span>
					<div id="biglinebreak"></div>
					<div style="margin-left: 10%;">
						<input id="checkbox" type="checkbox" name="in_state"> In-State Overnight Travel<br><br>
						<input id="checkbox" type="checkbox" name="out_of_state"> Out-of-State Travel<br><br>
						<input id="checkbox" type="checkbox" name="excess_lodging"> Excess Lodging $ <input type="text" name="excess_lodging_amount" placeholder="Excess Lodging $" onfocus="this.placeholder = ''" onblur="this.placeholder='Excess Lodging $'"> Plus Tax Per Night (Total Fees)<br><br>
						<input id="checkbox" type="checkbox" name="excess_registration"> Excess Registration Fees of $ <input type="text" name="excess_registration_amount" placeholder="Excess Registration Fee $" onfocus="this.placeholder = ''" onblur="this.placeholder='Excess Registration Fee $'"> (Total Fees)<br><br>
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
					<input type="file" name="additional_form" id="additional_form">
					<span id="label">(must be MS Word .docx document or PDF document)</span>
										
					<div id="biglinebreak"></div>
					
					<hr>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" placeholder="Dept./Div. Chair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='Dept./Div. Chair Signature'"><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" placeholder="VP of Acad. Affair's Signature" onfocus="this.placeholder=''" onblur="this.placeholder='VP of Acad. Affairs Signature'"><br><br>
					
					President or Designee's Signature: <input id="signature" type="text" name="president_signature" placeholder="President or Designee Signature" onfocus="this.placeholder=''" onblur="this.placeholder='President or Designee Signature'"><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>