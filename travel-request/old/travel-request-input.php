<?php
	include_once('../login-redirect.php');
?>
<?php
	//echo "Current Script Owner: " . get_current_user() . "<br><br>";
	//echo exec('whoami') . "<br><br>";
	$target_dir = "/var/www/html/tr-forms/";
	$target_file = $target_dir . basename($_FILES["additional_form"]["name"]);
	/*if(is_dir($target_dir))
	{
		echo "Directory is present.<br><br>";
	} else {
		echo "Directory is not present.<br><br>";
	}
	if(is_writable($target_dir))
	{
		echo "Directory is writable.<br><br>";
	} else {
		echo "Directory is not writable.<br><br>";
	}
	// if everything is ok, try to upload file
	if (move_uploaded_file($_FILES["additional_form"]["tmp_name"], $target_file)) {
		echo "The file <strong><i>". basename( $_FILES["additional_form"]["name"]). "</i></strong> has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}*/
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
					$additional_form = basename($_FILES["additional_form"]["name"]);
					
					$chair_signature = $_POST['chair_signature'];
					$vp_signature = $_POST['vp_signature'];
					$president_signature = $_POST['president_signature'];
					
					include("../dbconnect.php");
					$query = "INSERT INTO travelrequest (employee, date_submitted, employee_email, destination, supervisor, period_begins, period_ends, purpose, mode_transportation, air_fare, registration_fee, total_expenditures, in_state, out_of_state, excess_lodging, excess_lodging_amount, excess_registration, excess_registration_amount, additional_form, chair_signature, vp_signature, president_signature) VALUES ('$employee', '$date_submitted', '$employee_email', '$destination', '$supervisor', '$period_begins', '$period_ends', '$purpose', '$mode_transportation', '$air_fare', '$registration_fee', '$total_expenditures', '$in_state', '$out_of_state', '$excess_lodging', '$excess_lodging_amount', '$excess_registration', '$excess_registration_amount', '$additional_form', '$chair_signature', '$vp_signature', '$president_signature')";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if (move_uploaded_file($_FILES["additional_form"]["tmp_name"], $target_file)) 
					{
						echo "The file <strong><i>". basename( $_FILES["additional_form"]["name"]). "</i></strong> has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file or there was no file attached.";
					}

					$to = "$supervisor";
					$subject = "Travel Request Form - Submitted";
					$msg = "$employee submitted a Travel Request Form on $date_submitted for travel to $destination from $period_begins to $period_ends via $mode_transportation.";
					mail($to, $subject, $msg);		
				?>
				<h2>In-State Overnight / Out-Of-State Travel Request</h2>
				<p>Thank you for submitting your Travel Request.  The information will be stored in a database for final approval and archival.</p>
			</div>
	</body>
</html>