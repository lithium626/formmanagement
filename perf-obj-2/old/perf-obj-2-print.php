<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Performance Objective #2</title>
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
			$id = $_POST['perf_obj_2_ID'];
			include("../dbconnect.php");
			$query = "SELECT * FROM perfobj2 WHERE ID ='$id'";
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
			
				<h2>Progress Conference #2</h2>
				<div id="printbutton" align="center"><input type="submit" style="width:200px;height:50px;margin-bottom:20px;" value="Print Conference #2" onClick="window.print()"></div>
				<div id="biglinebreak">&nbsp;</div>
				<form name="perf-obj-2-edit" action="perf-obj-2-edit-input.php" method="POST" autocomplete="on" enctype="multipart/form-data">
					<input type="hidden" name="ID" value="<?php echo ($row['0']); ?>">
					<span id="label">Name: </span>
					<input type="text" name="employee" value="<?php echo ($row['1']); ?>" required>
					
					<span id="label">Date Submitted: </span>
					<input type="date" name="date_submitted" value="<?php echo ($row['2']); ?>" required>
					
					<br><br><br>
					
					<span id="label">Objective Setting Period: </span>
					<select name="obj_setting_period" required>
						<option value="">Choose One: </option>
						<option value="2015-2016" <?php if($row['3']=='2015-2016') { print("selected='selected'"); } else { print(''); } ?>>2015-2016</option>
						<option value="2016-2017" <?php if($row['3']=='2016-2017') { print("selected='selected'"); } else { print(''); } ?>>2016-2017</option>
						<option value="2017-2018" <?php if($row['3']=='2017-2018') { print("selected='selected'"); } else { print(''); } ?>>2017-2018</option>
					</select>
					
					<span id="label">Supervisor: </span>
					<input type="text" name="supervisor" value="<?php echo ($row['4']); ?>" required>
					
					<br><br><br>
					
					<span id="label">SECTION 1 - PERFORMANCE OBJECTIVES</span><br><br>
					<p>Employee's Comments:</p>
					<textarea name="section_1_employee" class="jqte-test"><?php echo ($row['5']); ?></textarea>
					<br><br>
					<p>Supervisor's Comments:</p>
					<textarea name="section_1_supervisor" class="jqte-test"><?php echo ($row['6']); ?></textarea>
					
					<br><br><br>
					
					<span id="label">SECTION 2 - PROFESSIONAL AND PERSONAL TRAINING AND DEVELOPMENT</span><br><br>
					<p>Employee's Comments:</p>
					<textarea name="section_2_employee" class="jqte-test"><?php echo ($row['7']); ?></textarea>
					<br><br>
					<p>Supervisor's Comments:</p>
					<textarea name="section_2_supervisor" class="jqte-test"><?php echo ($row['8']); ?></textarea>
					
					<br><br><br>
					
					<span id="label">EVALUATION SUMMARY</span><br><br>
					<p>Use the following space to summarize the employee's overall evaluation.  You may use this space to comment on the ways in which this employee has 
					demonstrated improvement since the last evaluation or explain why the employee has not met objective or failed to improve.</p>
					<textarea name="evaluation_summary" class="jqte-test"><?php echo ($row['9']); ?></textarea>
					
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
					
					<div id="biglinebreak"></div>
					
					<hr>
					
					Employee's Signature <input id="signature" type="text" name="employee_signature" value="<?php echo ($row['10']); ?>"><br><br>
					
					Supervisor's Signature: <input id="signature" type="text" name="supervisor_signature" value="<?php echo ($row['11']); ?>"><br><br>
					
					<div style="text-align: center; font-size: 12px; font-style: italic;">***By entering your full name, you have electronically signed this document.***</div>
					
					<hr>	
				</form>
			</div>
		</div>
	</body>
</html>