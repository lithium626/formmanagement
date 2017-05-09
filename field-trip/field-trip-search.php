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
			$search = str_replace(' ', '', $_GET['search']);
			if($search=="")
			{
				header("Location: field-trip-choose-print.php");
			}
			//$id = $_POST['makeup_plan'];
			include("../dbconnect.php");
			$query = "SELECT * FROM fieldtrip WHERE instructor LIKE '%$search%' OR class_meeting_date LIKE '%$search%'";
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
	
				<h2>Sampson Community College<br><br>Field Trip Authorization</h2>
				
				<?php
					$num_rows = mysqli_num_rows($result);
					if($num_rows > 0)
					{
						print("<table style='margin:auto; width:75%; padding:5px;' border='1' cellpadding='5px'>");
						print("<tr><th>Instructor</th><th>Field Trip Date</th><th>Trip Destination</th></tr>");
						while($row = mysqli_fetch_row($result))
						{								
							print("<form method='POST' name='field-trip-choose' action='field-trip-print.php'>");
							print("<input type='hidden' name='field_trip' value='" . $row['0'] . "'>");
							print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['5'] . "</td><td>" . $row['12'] . "</td></tr>");
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