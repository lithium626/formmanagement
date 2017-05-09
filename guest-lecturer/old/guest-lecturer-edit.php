<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Guest Lecturer / Class Coverage Authorization</title>
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
			$id = $_POST['guest_lecturer_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM guestlecturer WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Guest Lecturer / Class Coverage Authorization</h2>
				<p>
					Requests should be submitted and approved in advance if possible.  Please inform your Dept. / Div. Chair when this form is complete.
				</p>
				<div id="biglinebreak">&nbsp;</div>
				<form name="guest-lecturer-edit" action="guest-lecturer-edit-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Instructor(s): </span>
					<input type="text" name="instructor" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Date: </span>
					<input type="date" name="date_submitted" value="<?php echo ($row['3']); ?>" required><br><br><br>
					
					<span id="label">Course No.: </span>
					<input type="text" name="course_number" value="<?php echo ($row['4']); ?>" required>
					
					<span id="label">Course Title: </span>
					<input type="text" name="course_title" value="<?php echo ($row['5']); ?>" required><br><br><br>
					
					<span id="label">Course Date: </span>
					<input type="date" name="course_date" value="<?php echo ($row['6']); ?>" required>
					
					<span id="label">Course Time: </span>
					<input type="text" name="course_time" value="<?php echo ($row['7']); ?>" required><br><br><br>
					
					<span id="label">Course Location: </span>
					<input type="text" name="course_location" value="<?php echo ($row['8']); ?>" required>
					
					<span id="label">Guest Lecturer: </span>
					<input type="text" name="guest_lecturer" value="<?php echo ($row['9']); ?>" required><br><br><br>
					
					<span id="label">Employee Email Address: </span>
					<input type="email" name="employee_email" value="<?php echo ($row['2']); ?>" required>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['10']); ?>" required>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					<div id="options">
					<span id="label">*Are there any costs associated with this trip? &nbsp; &nbsp;</span>
					<input id="checkbox" type="radio" name="costs" value="yes" <?php if($row['11']=='yes') { print('checked'); } else { print(''); } ?>>YES &nbsp; &nbsp; &nbsp;
					<input id="checkbox" type="radio" name="costs" value="no" <?php if($row['11']=='no') { print('checked'); } else { print(''); } ?>>NO &nbsp; &nbsp; &nbsp;
					<div style="font-size: 12px; font-style: italic;">*No financial commitments should be made without obtaining prior approval.</div><br><br>
					<span id="label">If YES, please explain: </span>
					<input type="text" name="costs_explanation" value="<?php echo ($row['12']); ?>" style="width: 80%; box-sizing: border-box"><br><br><br>
					
					Description of topic(s) to be presented:<br>
					<textarea name="topic_presented" class="jqte-test"><?php echo ($row['13']); ?></textarea>
					<script>
						$('.jqte-test').jqte();
						
						// settings of status
						var jqteStatus = true;
						$(".status").click(function()
						{
							jqteStatus = jqteStatus ? false : true;
							$('.jqte-test').jqte({"status" : jqteStatus})
						});
					</script>
					
					<span id="label">Upload Additional Documents: </span>
					<input id="filename" type="text" name="additional_form" value="<?php echo ($row['14']); ?>">
					</div>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					
					Instructor's Signature: <input id="signature" type="text" name="instructor_signature" value="<?php echo ($row['15']); ?>" required>
					Date: <input type="date" name="instructor_date" value="<?php echo ($row['16']); ?>"><br><br><br>
					
					Dept./Div. Chair's Signature: <input id="signature" type="text" name="chair_signature" value="<?php echo ($row['17']); ?>">
					Date: <input type="date" name="chair_date" value="<?php echo ($row['18']); ?>"><br><br><br>
					
					VP of Academic Affair's Signature: <input id="signature" type="text" name="vp_signature" value="<?php echo ($row['19']); ?>">
					Date: <input type="date" name="vp_date" value="<?php echo ($row['20']); ?>"><br><br><br>

					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>					
					<div align="center"><input type="submit" value="Submit for Approval"></div>
				</form>
			</div>
		</div>
	</body>
</html>