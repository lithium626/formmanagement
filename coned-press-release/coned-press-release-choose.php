<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Continuing Education Press &amp; Information Release</title>
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
				<h2>Continuing Education Press &amp; Information Release</h2>
				<p style="text-align:center;">
					Choose a Continuing Education Press &amp; Information Release form stored in the archives to edit.
				</p>
				<form method="POST" name="coned-press-release-choose" action="coned-press-release-edit.php">
					<?php
						include("../dbconnect.php");
						$query = "SELECT * FROM cepr ORDER BY ID DESC";
						$result = mysqli_query($dbc, $query) or die ('Error querying database: ' . mysqli_error($dbc));
						print("<div style='text-align:center;'><select name='cepr_ID'>");
						print("<option value=''>Choose One:</option>");
						while($row = mysqli_fetch_array($result))
						{
							if($row['chair_signature'] == NULL || $row['chair_signature'] == '')
								{
									print("<option id='highlight_chair' value='" . $row['ID'] . "'>" . $row['ID'] . " --- Start Date: " . $row['start_date'] . " --- Date Submitted: " . $row['date_submitted'] . " --- " . $row['instructor'] . "</option>");
								} else if ($row['dmm_signature'] == NULL || $row['dmm_signature'] == '') {
									print("<option id='highlight' value='" . $row['ID'] . "'>" . $row['ID'] . " --- Start Date: " . $row['start_date'] . " --- Date Submitted: " . $row['date_submitted'] . " --- " . $row['instructor'] . "</option>");
								} else if ($row['dmm_signature'] != '' && $row['chair_signature'] != '') {
									print("&nbsp;");
								} else {
									print("<option value='" . $row['ID'] . "'>" . $row['ID'] . " --- Start Date: " . $row['start_date'] . " --- Date Submitted: " . $row['date_submitted'] . " --- " . $row['instructor'] . "</option>");
								}
						}
						print("</select></div>");
						mysqli_close($dbc);
					?>
					<div id="biglinebreak"></div>
					<div align="center"><input type="submit" value="Edit ConEd Press Release Form"></div>
					<div id="biglinebreak"></div>
					<p id="highlight_chair" align="center">***Green Highlighted Options are Missing Chair Signatures.***</p>
					<p id="highlight" align="center">***Yellow Highlighted Options are Missing Digital Media Manager Signatures.***</p>
				</form>
			</div>
		</div>
	</body>
</html>