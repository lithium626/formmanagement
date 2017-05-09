<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Makeup Plan</title>
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
				header("Location: makeup-plan-choose-print.php");
			}
			//$id = $_POST['makeup_plan'];
			include("../dbconnect.php");
			$query = "SELECT * FROM makeupplan WHERE date_missed LIKE '%$search%' OR class_missed LIKE '%$search%' OR instructor LIKE '%$search%'";
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
	
				<h2>Sampson Community College<br><br>Makeup Plan for Missed or Cancelled Classes</h2>
				
				<?php
					$num_rows = mysqli_num_rows($result);
					if($num_rows > 0)
					{
						print("<table style='margin:auto; width:75%; padding:5px;' border='1' cellpadding='5px'>");
						print("<tr><th>Instructor</th><th>Class Missed</th><th>Date Missed</th></tr>");
						while($row = mysqli_fetch_row($result))
						{								
							print("<form method='POST' name='makeup-plan-choose' action='makeup-plan-print.php'>");
							print("<input type='hidden' name='makeup_plan' value='" . $row['0'] . "'>");
							print("<tr><td><input type='submit' value='" . $row['1'] . "'></td><td>" . $row['4'] . "</td><td>" . $row['5'] . "</td></tr>");
							print("</form>");
							
						}
						print("</table");
					} else {
						print("There are no results...");
					}
					
					$result = mysqli_query($dbc, $query) or die ('Error querying database.');
					while($printrow = mysqli_fetch_row($result))
					{
						$printarray[] = $printrow['0'];
					}
				?>
				
				<br><br><br>
				<div align="center">
					<form method="POST" name="print-all-array" action="makeup-plan-printall.php">
						<input type="hidden" name="printarray" value="<?php $_SESSION['printarray'] = $printarray; ?>">
						<input type="submit" value="Print All Makeup Plans Listed">
					</form>
				</div>
				
			</div>
		</div>
	</body>
</html>