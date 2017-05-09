<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Field Trip Authorization</title>
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
			$id = $_POST['field_trip'];
			include("../dbconnect.php");
			$query = "SELECT * FROM fieldtrip WHERE ID ='$id'";
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
			
				<h2>Sampson Community College<br><br>Field Trip Authorization</h2>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Field Trip" onClick="window.print()"></div>
				
				<p>
					Requests should be submitted and approved in advance of trip.  Requests for vans should be submitted at least five (5) days in advance.
				</p>
				
				<form name="field-trip-edit" action="field-trip-edit-input.php" method="POST" autocomplete="on">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Instructor(s): </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" style="width: 30%; box-sizing: border-box" required>
					
					<span id="label">Date: </span>
					<input type="date" name="date" value="<?php echo ($row['2']); ?>" required><br><br><br>
					
					<span id="label">Course No.: </span>
					<input type="text" name="course_number" value="<?php echo ($row['3']); ?>" required>
					
					<span id="label">Course Title: </span>
					<input type="text" name="course_title" value="<?php echo ($row['4']); ?>" style="width: 30%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Class Meeting Date: </span>
					<input type="date" name="class_meeting_date" value="<?php echo ($row['5']); ?>" required>
					
					<span id="label">Class Meeting Time: </span>
					<input type="text" name="class_meeting_time" value="<?php echo ($row['6']); ?>" required><br><br><br>
					
					<span id="label">Class Location: </span>
					<input type="text" name="class_meeting_location" value="<?php echo ($row['7']); ?>" required>
					
					<span id="label">Program Area: </span>
					<input type="text" name="program_area" value="<?php echo ($row['8']); ?>" required><br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['9']); ?>" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['10']); ?>" required>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					<div id="options">
					<span id="label">Mode of Travel: </span>
					<select name="mode_travel">
						<option value=''>Choose One: </option>
						<option value="school_van" <?php if($row['11']=='school_van') { print("selected='selected'"); } else { print(''); } ?>>School Van</option>
						<option value="personal_vehicle" <?php if($row['11']=='personal_vehicle') { print("selected='selected'"); } else { print(''); } ?>>Personal Vehicle</option>
						<option value="other" <?php if($row['11']=='other') { print("selected='selected'"); } else { print(''); } ?>>Other</option>
					</select>
					
					<span id="label">Trip Destination: </span>
					<input type="text" name="trip_destination" value="<?php echo ($row['12']); ?>" style="width: 35%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Purpose of Trip: </span>
					<input type="text" name="trip_purpose" value="<?php echo ($row['13']); ?>" style="width: 80%; box-sizing: border-box" required><br><br><br>
					
					<span id="label">Departure Date: </span>
					<input type="date" name="departure_date" value="<?php echo ($row['14']); ?>" required>
					
					<span id="label">Departure Time: </span>
					<input type="text" name="departure_time" value="<?php echo ($row['15']); ?>" required><br><br><br>
					
					<span id="label">Return Date: </span>
					<input type="date" name="return_date" value="<?php echo ($row['16']); ?>" required>
					
					<span id="label">Return Time: </span>
					<input type="text" name="return_time" value="<?php echo ($row['17']); ?>" required><br><br><br>
					
					<span id="label">*Are there any costs associated with this trip? &nbsp; &nbsp;</span>
					<input id="checkbox" type="radio" name="costs" value="yes" <?php if($row['18']=='yes') { print('checked'); } else { print(''); } ?>>YES &nbsp; &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="costs" value="no" <?php if($row['18']=='no') { print('checked'); } else { print(''); } ?>>NO &nbsp; &nbsp; &nbsp;
					<div style="font-size: 12px; font-style: italic;">*No financial commitments should be made without obtaining prior approval.</div><br><br>
					<span id="label">If YES, please explain: </span>
					<input type="text" name="costs_explanation" value="<?php echo ($row['19']); ?>" style="width: 80%; box-sizing: border-box"><br><br><br>
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" value="<?php echo ($row['20']); ?>" required>
					Date: <input type="date" name="instructor_date" value="<?php echo ($row['21']); ?>"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['22']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['23']); ?>"><br><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['24']); ?>">
					Date: <input type="date" name="vp_date" value="<?php echo ($row['25']); ?>"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					<hr>
				</form>
			</div>
		</div>
	</body>
</html>