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
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
				<h2>Guest Lecturer / Class Coverage Authorization</h2>
				<p style="text-align:center;">
					Choose a guest lecturer / class coverage authorization form stored in the archives to edit.
				</p>
				<form method="POST" name="guest-lecturer-choose" action="guest-lecturer-edit.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM guestlecturer ORDER BY ID";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='guest_lecturer_ID'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['chair_signature'] == NULL || $row['chair_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date_submitted'] . " --- " . $row['instructor_signature'] . "</option>");
								} else if ($row['vp_signature'] == NULL || $row['vp_signature'] == '') {
									print("<option id='highlight' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date_submitted'] . " --- " . $row['instructor_signature'] . "</option>");
								} else if ($row['vp_signature'] != '' && $row['chair_signature'] != '') {
									print("&nbsp;");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date_submitted'] . " --- " . $row['instructor_signature'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Edit Guest Lecturer"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Chair Signatures.***</p>
					<p id="highlight" align="center">***Yellow Highlighted Options are Missing VP Signatures.***</p>
				</form>
			</div>
		</div>
	</body>
</html>