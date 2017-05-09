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
				<?php
					$id = $_POST['ID'];
					$employee = $_POST['employee'];
					$academic_year = $_POST['academic_year'];
					$supervisor = $_POST['supervisor'];
					
					$workshop_1 = str_replace("'", "", $_POST['workshop_1']);
					$workshop_1_hours = $_POST['workshop_1_hours'];
					
					$workshop_2 = str_replace("'", "", $_POST['workshop_2']);
					$workshop_2_hours = $_POST['workshop_2_hours'];
					
					$workshop_3 = str_replace("'", "", $_POST['workshop_3']);
					$workshop_3_hours = $_POST['workshop_3_hours'];
					
					$workshop_4 = str_replace("'", "", $_POST['workshop_4']);
					$workshop_4_hours = $_POST['workshop_4_hours'];
					
					$workshop_5 = str_replace("'", "", $_POST['workshop_5']);
					$workshop_5_hours = $_POST['workshop_5_hours'];
					
					$workshop_6 = str_replace("'", "", $_POST['workshop_6']);
					$workshop_6_hours = $_POST['workshop_6_hours'];
					
					$workshop_7 = str_replace("'", "", $_POST['workshop_7']);
					$workshop_7_hours = $_POST['workshop_8_hours'];
					
					$workshop_8 = str_replace("'", "", $_POST['workshop_8']);
					$workshop_8_hours = $_POST['workshop_8_hours'];
					
					$workshop_9 = str_replace("'", "", $_POST['workshop_9']);
					$workshop_9_hours = $_POST['workshop_9_hours'];
					
					$workshop_10 = str_replace("'", "", $_POST['workshop_10']);
					$workshop_10_hours = $_POST['workshop_10_hours'];
					
					$workshop_11 = str_replace("'", "", $_POST['workshop_11']);
					$workshop_11_hours = $_POST['workshop_11_hours'];
					
					$workshop_12 = str_replace("'", "", $_POST['workshop_12']);
					$workshop_12_hours = $_POST['workshop_12_hours'];
					
					$workshop_13 = str_replace("'", "", $_POST['workshop_13']);
					$workshop_13_hours = $_POST['workshop_13_hours'];
					
					$workshop_14 = str_replace("'", "", $_POST['workshop_14']);
					$workshop_14_hours = $_POST['workshop_14_hours'];
					
					$workshop_15 = str_replace("'", "", $_POST['workshop_15']);
					$workshop_15_hours = $_POST['workshop_15_hours'];
					
					$requirement_met = $_POST['requirement_met'];
					$reason_not_met = str_replace("'", "", $_POST['reason_not_met']);
					
					$employee_signature = $_POST['employee_signature'];
					$employee_date = $_POST['employee_date'];
					
					$supervisor_signature = $_POST['supervisor_signature'];
					$supervisor_date = $_POST['supervisor_date'];
					
					include("../dbconnect.php");
					$query = "UPDATE prodevlog SET employee='$employee', academic_year='$academic_year', supervisor='$supervisor', workshop_1='$workshop_1', workshop_1_hours='$workshop_1_hours', workshop_2='$workshop_2', workshop_2_hours='$workshop_2_hours', workshop_3='$workshop_3', workshop_3_hours='$workshop_3_hours', workshop_4='$workshop_4', workshop_4_hours='$workshop_4_hours', workshop_5='$workshop_5', workshop_5_hours='$workshop_5_hours', workshop_6='$workshop_6', workshop_6_hours='$workshop_6_hours', workshop_7='$workshop_7', workshop_7_hours='$workshop_7_hours', workshop_8='$workshop_8', workshop_8_hours='$workshop_8_hours', workshop_9='$workshop_9', workshop_9_hours='$workshop_9_hours', workshop_10='$workshop_10', workshop_10_hours='$workshop_10_hours', workshop_11='$workshop_11', workshop_11_hours='$workshop_11_hours', workshop_12='$workshop_12', workshop_12_hours='$workshop_12_hours', workshop_13='$workshop_13', workshop_13_hours='$workshop_13_hours', workshop_14='$workshop_14', workshop_14_hours='$workshop_14_hours', workshop_15='$workshop_15', workshop_15_hours='$workshop_15_hours', requirement_met='$requirement_met', reason_not_met='$reason_not_met', employee_signature='$employee_signature', employee_date='$employee_date', supervisor_signature='$supervisor_signature', supervisor_date='$supervisor_date' WHERE ID='$id'";
					$result = mysqli_query($dbc, $query) or die ('Error inserting data into database.<br>' . mysqli_error($dbc));
					mysqli_close($dbc);
				?>
				<h2>Professional Development Log</h2>
				<p>Thank you for submitting your Professional Development Log.  The information will be stored in a database for final approval and archival.</p>
			</div>
		</div>
	</body>
</html>