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
				<?php
					$id = $_POST['ID'];
					$employee = $_POST['employee'];
					$date_submitted = $_POST['date_submitted'];
					$employee_email = $_POST['employee_email'];
					$destination = str_replace("'", "", $_POST['destination']);
					$supervisor = $_POST['supervisor'];
					$period_begins = $_POST['period_begins'];
					$period_ends = $_POST['period_ends'];
					$purpose = str_replace("'", "", $_POST['purpose']);
					$mode_transportation = $_POST['mode_transportation'];
					$air_fare = $_POST['air_fare'];
					$registration_fee = $_POST['registration_fee'];
					$total_expenditures = $_POST['total_expenditures'];
					$in_state = $_POST['in_state'];
					$out_of_state = $_POST['out_of_state'];
					$excess_lodging = $_POST['excess_lodging'];
					$excess_lodging_amount = $_POST['excess_lodging_amount'];
					$excess_registration = $_POST['excess_registration'];
					$excess_registration_amount = $_POST['excess_registration_amount'];
					$additional_form = $_POST['additional_form'];
					
					$chair_signature = $_POST['chair_signature'];
					$vp_signature = $_POST['vp_signature'];
					$president_signature = $_POST['president_signature'];
					
					include("../dbconnect.php");
					$query = "UPDATE travelrequest SET employee='$employee', date_submitted='$date_submitted', employee_email = '$employee_email', destination='$destination', supervisor='$supervisor', period_begins='$period_begins', period_ends='$period_ends', purpose='$purpose', mode_transportation='$mode_transportation', air_fare='$air_fare', registration_fee='$registration_fee', total_expenditures='$total_expenditures', in_state='$in_state', out_of_state='$out_of_state', excess_lodging='$excess_lodging', excess_lodging_amount='$excess_lodging_amount', excess_registration='$excess_registration', excess_registration_amount='$excess_registration_amount', additional_form='$additional_form', chair_signature='$chair_signature', vp_signature='$vp_signature', president_signature='$president_signature' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Travel Request Form - Submitted";
						$msg = "$employee submitted a Travel Request Form on $date_submitted for travel to $destination from $period_begins to $period_ends via $mode_transportation.  The form has been signed by Chair $chair_signature and is ready for your electronic signature.";
						mail($to, $subject, $msg);
					} else {
						$to = "fsutter@sampsoncc.edu";
						$subject = "Travel Request Form - Submitted";
						$msg = "$employee submitted a Travel Request Form on $date_submitted for travel to $destination from $period_begins to $period_ends via $mode_transportation.  The form has been signed by Chair $chair_signature and VP $vp_signature and is ready for filing.";
						mail($to, $subject, $msg);
					}
					
					if($chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Travel Request Form - Approved";
						$msg = "The Travel Request Form for $employee (submitted $date_submitted for travel to $destination from $period_begins to $period_ends via $mode_transportation) has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>In-State Overnight / Out-of-State Travel Request</h2>
				<p>Thank you for submitting your Travel Request.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>