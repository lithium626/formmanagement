<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #1</title>
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
			$search = str_replace(' ', '', $_GET['search']);
			if($search=="")
			{
				header("Location: perf-obj-choose-full-search.php");
			}
			$obj_setting_period = $_GET['obj_setting_period'];
			$perfobjtable = $_GET['obj_number'];
			//$id = $_POST['makeup_plan'];
			include("../dbconnect.php");
			$query = "SELECT * FROM $perfobjtable WHERE employee LIKE '%$search%' AND obj_setting_period LIKE '%$obj_setting_period'";
			$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
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
	
				<h2>Sampson Community College<br><br>Performance Objective Full Search</h2>
				
				<?php
					$num_rows = mysqli_num_rows($result);
					if($num_rows > 0)
					{
						print("<table style='margin:auto; width:75%; padding:5px;' border='1' cellpadding='5px'>");
						print("<tr><th>Employee</th><th>Date Submitted</th></tr>");
						while($row = mysqli_fetch_row($result))
						{								
							if($perfobjtable == "perfobj1")
							{
								print("<form method='POST' name='perf-obj-1-choose' action='perf-obj-1-print.php'>");
								print("<input type='hidden' name='perf_obj_1_ID' value='" . $row['0'] . "'>");
								print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['2'] . "</td></tr>");
								print("</form>");
							} else if($perfobjtable == "perfobj2") {
								print("<form method='POST' name='perf-obj-2-choose' action='../perf-obj-2/perf-obj-2-print.php'>");
								print("<input type='hidden' name='perf_obj_2_ID' value='" . $row['0'] . "'>");
								print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['2'] . "</td></tr>");
								print("</form>");
							} else {
								print("<form method='POST' name='perf-obj-3-choose' action='../perf-obj-3/perf-obj-3-print.php'>");
								print("<input type='hidden' name='perf_obj_3_ID' value='" . $row['0'] . "'>");
								print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['2'] . "</td></tr>");
								print("</form>");
							}
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