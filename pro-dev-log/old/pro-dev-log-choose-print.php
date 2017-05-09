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
				<h2>Professional Development Log</h2>
				<p style="text-align:center;">
					Choose an employee's professional development log to edit.
				</p>
				<form method="POST" name="pro-dev-log-choose" action="pro-dev-log-print.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM prodevlog ORDER BY ID";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='pro_dev_log'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['supervisor_signature'] == NULL || $row['supervisor_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['employee'] . " --- " . $row['academic_year'] . "</option>");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['employee'] . " --- " . $row['academic_year'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Print Pro. Dev. Log"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Supervisor Signatures.***</p>
				</form>
			</div>
		</div>
	</body>
</html>