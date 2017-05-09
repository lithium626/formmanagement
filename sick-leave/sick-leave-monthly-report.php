<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Employee Request for Leave</title>
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
			$report_month = $_GET['report_month'];
			$report_year = $_GET['report_year'];
			//$id = $_POST['makeup_plan'];
			include("../dbconnect.php");
			$query = "SELECT * FROM employeeleave WHERE month(date_filed) = '$report_month' AND year(date_filed) = '$report_year'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			//$row = mysqli_fetch_row($result);
		?>
		
		
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
			
				<div id="printlogo">
					<img src="../img/logoheader.png">
				</div>
	
				<h2>Sampson Community College<br><br>Employee Request for Leave</h2>
				
				<?php
					$num_rows = mysqli_num_rows($result);
					if($num_rows > 0)
					{
						print("<table style='margin:auto; width:75%; padding:5px;' border='1' cellpadding='5px'>");
						print("<tr><th>Employee</th><th>Date Filed</th><th>Total Hours</th></tr>");
						while($row = mysqli_fetch_row($result))
						{								
							print("<form method='POST' name='sick-leave-choose' action='sick-leave-print.php'>");
							print("<input type='hidden' name='sick_leave' value='" . $row['0'] . "'>");
							print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['4'] . "</td>");
							print("<td>");
								if($row['23'] != 0) {	
									print($row['23'] . " - Annual Leave");
								} else if ($row['30'] != 0) {
									print($row['30'] . " - Bonus Leave");
								} else if ($row['37'] != 0) {
									print($row['37'] . " - Funeral Leave");
								} else if ($row['46'] != 0) {
									print($row['46'] . " - Sick Leave");
								}
							print("</td></tr>");
							print("</form>");
						}
						print("</table");
					} else {
						print("There are no results...");
					}
				?>
			</div>
		</div>
	</body>
</html>