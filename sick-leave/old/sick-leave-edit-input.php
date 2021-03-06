<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Employee Request for Leave</title>
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
					$employee_email = $_POST['employee_email'];
					$supervisor = $_POST['supervisor'];
					$date_filed = $_POST['date_filed'];
					
					$al_date1 = $_POST['al_date1'];
					$al_date1_timeout = $_POST['al_date1_timeout'];
					$al_date1_timein = $_POST['al_date1_timein'];
					$al_date2 = $_POST['al_date2'];
					$al_date2_timeout = $_POST['al_date2_timeout'];
					$al_date2_timein = $_POST['al_date2_timein'];
					$al_date3 = $_POST['al_date3'];
					$al_date3_timeout = $_POST['al_date3_timeout'];
					$al_date3_timein = $_POST['al_date3_timein'];
					$al_date4 = $_POST['al_date4'];
					$al_date4_timeout = $_POST['al_date4_timeout'];
					$al_date4_timein = $_POST['al_date4_timein'];
					$al_date5 = $_POST['al_date5'];
					$al_date5_timeout = $_POST['al_date5_timeout'];
					$al_date5_timein = $_POST['al_date5_timein'];
					$al_date6 = $_POST['al_date6'];
					$al_date6_timeout = $_POST['al_date6_timeout'];
					$al_date6_timein = $_POST['al_date6_timein'];
					$al_total_time = $_POST['al_total_time'];
					
					$bl_date1 = $_POST['bl_date1'];
					$bl_date1_timeout = $_POST['bl_date1_timeout'];
					$bl_date1_timein = $_POST['bl_date1_timein'];
					$bl_date2 = $_POST['bl_date2'];
					$bl_date2_timeout = $_POST['bl_date2_timeout'];
					$bl_date2_timein = $_POST['bl_date2_timein'];
					$bl_total_time = $_POST['bl_total_time'];
					
					$fl_date1 = $_POST['fl_date1'];
					$fl_date1_timeout = $_POST['fl_date1_timeout'];
					$fl_date1_timein = $_POST['fl_date1_timein'];
					$fl_date2 = $_POST['fl_date2'];
					$fl_date2_timeout = $_POST['fl_date2_timeout'];
					$fl_date2_timein = $_POST['fl_date2_timein'];
					$fl_total_time = $_POST['fl_total_time'];
					$fl_relationship = $_POST['fl_relationship'];
					
					$sl_date1 = $_POST['sl_date1'];
					$sl_date1_timeout = $_POST['sl_date1_timeout'];
					$sl_date1_timein = $_POST['sl_date1_timein'];
					$sl_date2 = $_POST['sl_date2'];
					$sl_date2_timeout = $_POST['sl_date2_timeout'];
					$sl_date2_timein = $_POST['sl_date2_timein'];
					$sl_total_time = $_POST['sl_total_time'];
					$sl_multiplier = $_POST['sl_multiplier'];
					$sl_type = $_POST['sl_type'];
					
					$applicant_signature = $_POST['applicant_signature'];
					$applicant_date = $_POST['applicant_date'];
								
					$chair_signature = $_POST['chair_signature'];
					$chair_date = $_POST['chair_date'];
					
					$vp_signature = $_POST['vp_signature'];
					$vp_date = $_POST['vp_date'];
					
					include("../dbconnect.php");
					$query = "UPDATE employeeleave SET employee='$employee', employee_email='$employee_email', supervisor='$supervisor', date_filed='$date_filed', al_date1='$al_date1', al_date1_timeout='$al_date1_timeout', al_date1_timein='$al_date1_timein', al_date2='$al_date2', al_date2_timeout='$al_date2_timeout', al_date2_timein='$al_date2_timein', al_date3='$al_date3', al_date3_timeout='$al_date3_timeout', al_date3_timein='$al_date3_timein', al_date4='$al_date4', al_date4_timeout='$al_date4_timeout', al_date4_timein='$al_date4_timein', al_date5='$al_date5', al_date5_timeout='$al_date5_timeout', al_date5_timein='$al_date5_timein', al_date6='$al_date6', al_date6_timeout='$al_date6_timeout', al_date6_timein='$al_date6_timein', al_total_time='$al_total_time', bl_date1='$bl_date1', bl_date1_timeout='$bl_date1_timeout', bl_date1_timein='$bl_date1_timein', bl_date2='$bl_date2', bl_date2_timeout='$bl_date2_timeout', bl_date2_timein='$bl_date2_timein', bl_total_time='$bl_total_time', fl_date1='$fl_date1', fl_date1_timeout='$fl_date1_timeout', fl_date1_timein='$fl_date1_timein', fl_date2='$fl_date2', fl_date2_timeout='$fl_date2_timeout', fl_date2_timein='$fl_date2_timein', fl_total_time='$fl_total_time', fl_relationship='$fl_relationship', sl_date1='$sl_date1', sl_date1_timeout='$sl_date1_timeout', sl_date1_timein='$sl_date1_timein', sl_date2='$sl_date2', sl_date2_timeout='$sl_date2_timeout', sl_date2_timein='$sl_date2_timein', sl_total_time='$sl_total_time', sl_multiplier='$sl_multiplier', sl_type='$sl_type', applicant_signature='$applicant_signature', applicant_date='$applicant_date', chair_signature='$chair_signature', chair_date='$chair_date', vp_signature='$vp_signature', vp_date='$vp_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
					
					if($vp_signature == '')
					{
						$to = "bstarling@sampsoncc.edu, awarner@sampsoncc.edu";
						$subject = "Employee Leave Form - Submitted";
						$msg = "$employee submitted an Employee Leave Form on $applicant_date, which has been signed by $chair_signature.  The form is ready for your electronic signature.";
						mail($to, $subject, $msg);
					} else {
						$to = "vlucas@sampsoncc.edu, kjackson@sampsoncc.edu";
						$subject = "Employee Leave Form - Submitted";
						$msg = "$employee submitted an Employee Leave Form on $applicant_date, which has been signed by $chair_signature and $vp_signature and is ready for filing.";
						mail($to, $subject, $msg);
					}
					
					if($applicant_signature != '' && $chair_signature != '' && $vp_signature != '')
					{
						$to = "$employee_email";
						$subject = "Employee Leave Form - Approved";
						$msg = "The Employee Leave Form for $employee, completed on $applicant_date, has been signed and approved.  It is available for print from your Division Secretary.";
						mail($to, $subject, $msg);
					}
				?>
				<h2>Employee Request for Leave</h2>
				<p>Thank you for editing the Employee Request for Leave.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>