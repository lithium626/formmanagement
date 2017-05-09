<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Field Trip Authorization</title>
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
				<h2>Field Trip Authorization</h2>
				<p style="text-align:center;">
					Choose a field trip authorization stored in the archives to edit.
				</p>
				<form method="POST" name="field-trip-choose" action="field-trip-edit.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM fieldtrip ORDER BY ID DESC";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='field_trip_ID'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['chair_signature'] == NULL || $row['chair_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date'] . " --- " . $row['instructor_signature'] . "</option>");
								} else if ($row['vp_signature'] == NULL || $row['vp_signature'] == '') {
									print("<option id='highlight' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date'] . " --- " . $row['instructor_signature'] . "</option>");
								} else if ($row['vp_signature'] != '' && $row['chair_signature'] != '') {
									print("&nbsp;");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['course_number'] . " --- " . $row['date'] . " --- " . $row['instructor_signature'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Edit Field Trip"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Chair Signatures.***</p>
					<p id="highlight" align="center">***Yellow Highlighted Options are Missing VP Signatures.***</p>
				</form>
			</div>
		</div>
	</body>
</html>