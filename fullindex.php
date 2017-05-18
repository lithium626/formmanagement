<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC Form Management and Electronic Archival System</title>
		<link rel="stylesheet" href="css/inputstyle.css">
		<link rel="stylesheet" href="css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="js/date.js"></script>
		<meta name="author" content="W. Darell Matthews">
	</head>
	<body>
		<div class="container">
			<?php
				include_once('nav.php');
			?>
			<div class="content">
				<h2>Sampson Community College<br>Form Management and Electronic Archival System</h2>
				<p>
					<?php
						/* if ($_SESSION["authenticated"])
						{
							echo "You are logged in...<br><br><a href='logout.php'>Log Out...</a><br><br><br>";
						} */
					?>
				</p>
				<p>
					In an effort to make the process of form management work workflow more efficient and effective, we have 
					developed the Form Management and Electronic Archival System.  All faculty and staff should utilize 
					this system to complete and submit all forms electronically.  Supervisors and those individuals needing 
					to sign documents can do so electronically.
				</p>
				<p>
					While most SCC documents and forms are listed in the header above, there may be a few that are not.  For 
					those, click their respective buttons below.
				</p>
				<table align="center">
					<tr>
						<td><button class="btn" onClick="window.location.href='perf-obj-1/perf-obj-1-input-home.php'">Performance Objective #1</button></td>
						<td><button class="btn" onClick="window.location.href='perf-obj-2/perf-obj-2-input-home.php'">Performance Objective #2</button></td>
						<td><button class="btn" onClick="window.location.href='perf-obj-3/perf-obj-3-input-home.php'">Performance Objective #3</button></td>
					</tr>
					<tr>
						<td><button class="btn" onClick="window.location.href='pro-dev-log/pro-dev-log-input-home.php'">Professional Development Log</button></td>
						<!--<td><button class="btn" onClick="window.location.href='textbook-order-input-home.php'">Textbook Order Form</button></td>-->
						<td><button class="btn" onClick="#">Textbook Order Form</button></td>
						<!--<td><button class="btn" onClick="window.location.href='inventory-transfer-input-home.php'">Inventory Transfer Form</button></td>-->
						<td><button class="btn" onClick="#">Inventory Transfer Form</button></td>
					</tr>
					<tr>
						<td><button class="btn" onClick="window.location.href='door-schedules/door-schedule-input-home.php'">Faculty/Staff Door Schedules</button></td>
						<td><button class="btn" onClick="window.location.href='course-syllabi/course-syllabi-input-home.php'">Course Syllabi</button></td>
						<td><button class="btn" onClick="window.location.href='coned-press-release/coned-press-release-input-home.php'">Con-Ed Press Release Form</button></td>
					</tr>
				</table>
				<table align="center">
					<tr>
						<td width="25%">&nbsp;</td>
						<td width="50%">
							<div style="font-family: CartoBold,Arial,sans-serif; color: black; font-size: 16px; background-color: yellow; padding: 10px; text-transform: uppercase;">SCC Administrative Forms / How-To's
							<br><br>
							<select id="dwl">
								<?php
									echo "<option value=''>Choose a File to Download</option>";
									foreach (new DirectoryIterator('SSForms/') as $file)
									{
										if($file->isDot()) continue;
										if($file->isFile())
										{
											$filename = basename($file);
											echo "<option value='SSForms/" . $filename . "'>".$filename."</option>";
										}
									}
								?>
							</select>
							<input type="button" onClick="window.location.href=$('#dwl').val()" value="Download File">
							</div>
						</td>
						<td width="25%">&nbsp;</td>
					</tr>
					<tr>
						<td width="25%">&nbsp;</td>
						<td width="50%">You are logged in...<br><button class="btn-red" onClick="window.location.href='logout.php'">Log Out</button></td>
						<td width="25%">&nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>