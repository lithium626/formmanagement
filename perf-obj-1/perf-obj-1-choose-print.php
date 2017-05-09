<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #1</title>
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
				<h2>Performance Objective #1</h2>
				
				<p style="text-align:center;">
					Search by <strong>Employee's</strong> Last Name:
				</p>
				<form method="GET" name="perf-obj-1-search" action="perf-obj-1-search.php" style="text-align:center;">
					<input type="text" name="search" autofocus>
					<input type="submit" value="Begin Search...">
				</form>
				<br>
				
				<p style="text-align:center;">
					Search by <strong>Supervisor's</strong> Last Name:
				</p>
				<form method="GET" name="perf-obj-1-supervisor-search" action="perf-obj-1-supervisor-search.php" style="text-align:center;">
					<input type="text" name="search">
					<input type="submit" value="Begin Search...">
				</form>
				<br><br><br>
				
				<p style="text-align:center;">
					Choose a Performance Objective #1 to print.
				</p>
				<form method="POST" name="perf-obj-1-choose" action="perf-obj-1-print.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM perfobj1 ORDER BY ID DESC";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='perf_obj_1_ID'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['supervisor_signature'] == NULL || $row['supervisor_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['employee'] . " --- " . $row['date_submitted'] . "</option>");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['ID'] . " --- " . $row['employee'] . " --- " . $row['date_submitted'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Print Objective #1"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Chair Signatures.***</p>
				</form>
			</div>
		</div>
	</body>
</html>