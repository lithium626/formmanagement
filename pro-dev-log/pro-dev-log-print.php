<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Professional Development Log</title>
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
			$id = $_POST['pro_dev_log'];
			include("../dbconnect.php");
			$query = "SELECT * FROM prodevlog WHERE ID ='$id'";
			$result = mysqli_query($dbc, $query) or die ('Error querying database.');
			$row = mysqli_fetch_row($result);
		?>
		
		
		<div class="container">
			<?php
				include_once('../nav.php');
			?>
			<div class="content">
			
				<div id="printlogo">
					<img src="../img/logoheader.png">
				</div>
			
				<h2>Sampson Community College<br><br>Professional Development Log</h2>
				
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Pro. Dev. Log" onClick="window.print()"></div><br><br>
				
				<br><br><br>
				
				<form name="pro-dev-log-edit" action="pro-dev-log-edit-input.php" method="POST" autocomplete="on">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					
					<span id="label">Employee: </span>
					<input type="text" name="employee" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Academic Year: </span>
					<select name="academic_year" required>
						<option value="">Choose One: </option>
						<option value="2015-2016" <?php if($row['2']=='2015-2016') { print("selected='selected'"); } else { print(''); } ?>>2015-2016</option>
						<option value="2016-2017" <?php if($row['2']=='2016-2017') { print("selected='selected'"); } else { print(''); } ?>>2016-2017</option>
						<option value="2017-2018" <?php if($row['2']=='2017-2018') { print("selected='selected'"); } else { print(''); } ?>>2017-2018</option>
					</select>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['3']); ?>" required>
					
					<div id="biglinebreak">&nbsp;</div>
					
					<table width="80%" border="2px">
						<tr>
							<th>Title of Workshop/Program/Webinar/Etc.</th><th>Location &amp; Date of Workshop/Program</th><th>Number of Hours of Professional Development</th>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_1" value="<?php echo ($row['4']); ?>" required></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_1_hours" value="<?php echo ($row['5']); ?>" required></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_2" value="<?php echo ($row['6']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_2_hours" value="<?php echo ($row['7']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_3" value="<?php echo ($row['8']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_3_hours" value="<?php echo ($row['9']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_4" value="<?php echo ($row['10']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_4_hours" value="<?php echo ($row['11']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_5" value="<?php echo ($row['12']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_5_hours" value="<?php echo ($row['13']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_6" value="<?php echo ($row['14']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_6_hours" value="<?php echo ($row['15']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_7" value="<?php echo ($row['16']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_7_hours" value="<?php echo ($row['17']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_8" value="<?php echo ($row['18']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_8_hours" value="<?php echo ($row['19']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_9" value="<?php echo ($row['20']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_9_hours" value="<?php echo ($row['21']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_10" value="<?php echo ($row['22']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_10_hours" value="<?php echo ($row['23']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_11" value="<?php echo ($row['24']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_11_hours" value="<?php echo ($row['25']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_12" value="<?php echo ($row['26']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_12_hours" value="<?php echo ($row['27']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_13" value="<?php echo ($row['28']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_13_hours" value="<?php echo ($row['29']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_14" value="<?php echo ($row['30']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_14_hours" value="<?php echo ($row['31']); ?>"></td>
						</tr>
						<tr style="background-color:lightgrey;">
							<td colspan="2"><input style="width: 95%;" type="text" name="workshop_15" value="<?php echo ($row['32']); ?>"></td>
							<td><input style="width: 95%;" type="number" min="0" step="0.5" name="workshop_15_hours" value="<?php echo ($row['33']); ?>"></td>
						</tr>
					</table>
		
					<div id="biglinebreak">&nbsp;</div>
					
					<input id="checkbox" type="radio" name="requirement_met" value="met" <?php if($row['34']=='met') { print('checked'); } else { print(''); } ?> required> I met the College's 15 hour requirement for academic/professional development for this academic year.<br><br>
					<input id="checkbox" type="radio" name="requirement_met" value="not_met" <?php if($row['34']=='not_met') { print('checked'); } else { print(''); } ?>> I did not meet the College's 15 hour requirement for academic/professional development for the academic year because:<br><br>
					<textarea name="reason_not_met" class="jqte-test"><?php echo ($row['35']); ?></textarea>
					
					<script>
						$('.jqte-test').jqte();
						
						// settings of status
						var jqteStatus = true;
						$(".status").click(function()
						{
							jqteStatus = jqteStatus ? false : true;
							$('.jqte-test').jqte({"status" : jqteStatus})
						});
					</script>
					
					<div id="biglinebreak">&nbsp;</div>
					<hr>
					<div id="biglinebreak">&nbsp;</div>
					
					Employee's Signature <input id="signature" type="text" name="employee_signature" value="<?php echo ($row['36']); ?>" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Date: <input type="date" name="employee_date" value="<?php echo ($row['37']); ?>" required><br><br><br>
					
					Supervisor's Signature: <input id="signature" type="text" name="supervisor_signature" value="<?php echo ($row['38']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Date: <input type="date" name="supervisor_date" value="<?php echo ($row['39']); ?>"><br><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					<hr>
				</form>
			</div>
		</div>
	</body>
</html>