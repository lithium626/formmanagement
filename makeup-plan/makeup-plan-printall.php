<?php
	include_once('../login-redirect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SCC - Course Makeup Plan</title>
		<!--<link rel="stylesheet" href="../css/outputstyle.css">-->
		<link rel="stylesheet" href="../css/jquery-te-1.4.0.css">
		<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery-te-1.4.0.min.js"></script>
		<script type="text/javascript" src="../js/date.js"></script>
		<meta name="author" content="W. Darell Matthews">
		<style>
			.header {
					font-family: CartoBold,Arial,sans-serif;
					font-weight: 400;
					background-color: #15304d;
					padding-bottom: 10px;
					padding-top: 10px;
					margin: 0 auto;
					max-width: 100%;
					border-radius: 10px;
				}

			.header img {
					float: left;
					margin-top: 20px;
					margin-left: 5%;
				}

			.header #nav {
					float: right;
					margin-right: 5%;
					text-transform: uppercase;
				}

			.header #clearfloat {
					clear: both;
				}

			.header li {
					height: 32px;
					margin: 8px 5px 2px;
					width: 168px;
					text-align: center;
					overflow: hidden;
					display: inline-block;
				}

			.header li a {
					background-color: white;
					display: block;
					padding: 7px 2px 7px;
					font-size: 16px;
					text-decoration: none;
					color: #15304d;
				}

			@media print {
				@page { size: 240mm 317mm; }
					.header { display: none; }
					.content #noshow { display: none; }
					.content #printlogo { display: block; margin: left; margin-top: -15px;}
					.content h2 { font-size: 20px; }
					.content li { font-size: 11px; }
					.content ol { margin-bottom: 25px; }
					.content form { margin-top: auto; }
					.content form input { padding: 2px; margin: 0; width: auto; }
					.content form input[type="text"] { width: 350px; }
					.content form #checkbox { width: 8px; }
					.content textarea { height:auto; overflow:visible!important; page-break-inside:avoid !important; }
					.content #options { padding: 0px; }
					.content hr { margin-top: 2px; margin-bottom: 2px; }
					.content br:nth-child(3n+1) { display:none; }
					#printbutton { display: none; }
					footer { page-break-after: always; }
			}
		</style>
	</head>
	<body>
		<?php include_once('../nav.php'); ?>
		<div id='printbutton' align='center'><input type='submit' style='width:200px;height:50px;margin-top:10px;margin-bottom:20px;' value='Print Makeup Plan' onClick='window.print()'></div>
		<?php
			include("../dbconnect.php");
			$printarray = $_SESSION['printarray'];
			foreach ($printarray as $printitem)
			{
				$id = $printitem;
				$query = "SELECT * FROM makeupplan WHERE ID ='$id'";
				$result = mysqli_query($dbc, $query) or die ('Error querying database.');
				$row = mysqli_fetch_row($result);
				echo "<div class='content'><div id='printlogo' align='center'><img src='../img/logoheader.png'></div>";		
				echo "<h2 align='center'>Sampson Community College<br><br>Makeup Plan for Missed or Cancelled Classes</h2>";
				echo "	<div id='noshow'><p style='text-align:center;'>
							Time must be made up for any curriculum instructional that is missed or cancelled for any reason, 
							including inclement weather.  Class time may be made up at another date or by an alternative 
							method.  Sampson Community College recognizes several methods, as described below, for making up 
							class time.
						</p>
						<p style='text-align:center;'>
							When class sessions are missed, instructors are resonsible for determing with the Registrar and the 
							VP of Academics, how missed class hours will be made up.  Instructors also are responsible for 
							informing their supervisors and for completing this form.
						</p></div>";
				echo "	<form name='makeup-plan-edit' action='makeup-plan-edit-input.php' method='POST' autocomplete='on'>
							I certify that missed or cancelled class time was/will be made up as follows:<br><br><br>
							
							<span id='label'>Instructor: </span>
							<input type='text' name='instructor' value='" . ($row['1']) . "' required>
							
							<span id='label'>Employee Email Address: </span>
							<input type='email' name='employee_email' value='" . ($row['2']) . "' required><br><br>
							
							<div id='noshow'><span id='label'>Supervisor: </span>
							<input type='text' name='supervisor' value='" . ($row['3']) . "' required><br><br><br></div>
							
							<span id='label'>Course Information: </span>
							<input type='text' name='class_missed' value='" . ($row['4']) . "' required>
							<input type='date' name='date_missed' value='" . ($row['5']) . "' required>
							<input type='number' min='0' step='0.5' name='time_missed' value='" . ($row['6']) . "' required>
							<hr>";
				echo "		<div id='options'>
								<input id='checkbox' type='checkbox' name='additional_time'";
							
							if($row['7']=='on') { print('checked'); } else { print(''); };
							
				echo "		> Add additional classes or additional minutes to 
								classes to provide equivalent instructional time.  The instructor must provide date/time class 
								was made up (see class roster):<br>
								<span id='label'>Makeup Date/Time: </span>
								<input name='additional_date' id='date2 datePick' type='text' value='" . ($row['8']) . "'/>
								<script>
									$('#datePick').multiDatesPicker();
								</script>
								<input type='number' min='0' step='0.5' name='additional_met' value='" . ($row['9']) . "'>
								<input type='number' min='0' step='0.5' name='additional_total' value='" . ($row['10']) . "'>
								<script>
									document.getElementById('date2').valueAsDate = new Date.today();
								</script>
							</div>";	
				echo "		<div id='biglinebreak'>&nbsp;</div>
					
							<div id='options'>
								<input id='checkbox' type='checkbox' name='moodle_assignment'";
							
							if($row['11']=='on') { print('checked'); } else { print(''); };
  
				echo " 		> Provide Moodle online equivalent instruction.
								(This option is available only to faculty with Moodle access either online, hybrid, or supplemental use.)  
								Paste the assignment in the box provided below:<br><br>";
								
								if($row['12'] == '')
								{
									echo "Moodle Assignment - NONE";
								} else {
									echo "<textarea name='moodle_description' class='jqte-test'>";
									echo $row['12'];
									echo "</textarea>";
								}
								
				echo "			<br><br><span id='label'>Upload Additional Documents: </span>"; 
								print("<a target='_blank' href='http://forms.sampsoncc.edu/mup-forms/" . $row['21'] . "'>");
								echo ($row['21']);
								print("</a>");
				
				echo "		</div>
							<div id='biglinebreak'>&nbsp;</div>
							<div id='options'>
								<input id='checkbox' type='checkbox' name='extra_assignment'";

							if($row['13']=='on') { print('checked'); } else { print(''); };

				echo "		> Require extra out-of-class assignment(s) that 
								provide equivalent instruction:<br><br><br>
						
								Approximate time to complete: <input type='number' min='0' step='0.5' name='extra_assignment_time' value='" . ($row['14']) . "'>
								Total Time Madeup: <input type='number' min='0' step='0.5' name='extra_assignment_madeup' value='" . ($row['15']) . "'><br><br>
								Description of assignment:<br><br>";
							
								if($row['16'] == '')
								{
									echo "Extra Assignment - NONE";
								} else {
									echo "<textarea name='moodle_description' class='jqte-test'>";
									echo $row['16'];
									echo "</textarea>";
								}
								
				echo "		<br><br><span id='label'>Upload Additional Documents: </span>";
					
								print("<a target='_blank' href='http://forms.sampsoncc.edu/mup-forms/" . $row['21'] . "'>");
								echo ($row['21']);
								print("</a>");
				
				echo "		</div>
							<div id='biglinebreak'>&nbsp;</div>
							<div id='options'>
								<input id='checkbox' type='checkbox' name='other'";
							
							if($row['17']=='on') { print('checked'); } else { print(''); };
							
				echo "		> 	Other: <input type='text' name='other_assignment' value='" . ($row['18']) . "'>
								Total Time Madeup: <input type='number' min='0' step='0.5' name='other_time' value='" . ($row['19']) . "'><br><br><br>
								Description of assignment:<br><br>";
						
								if($row['20'] == '')
								{
									echo "Other Assignment/Activity - NONE";
								} else {
									echo "<textarea name='moodle_description' class='jqte-test'>";
									echo $row['20'];
									echo "</textarea>";
								}
								
		?>
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
		<?php
				echo "			<br><br><span id='label'>Upload Additional Documents: </span>";
				
									print("<a target='_blank' href='http://forms.sampsoncc.edu/gl-forms/" . $row['21'] . "'>");
									echo ($row['21']);
									print("</a>");
				
				echo "			</div>
								<hr>
								Class cancellation caused by:<br><br><br>
								<input id='checkbox' type='radio' name='cancellation_cause' value='inclement_weather'";
								
								if($row['22']=='inclement_weather') { print('checked'); } else { print(''); };
								
				echo "			> Inclement Weather &nbsp; &nbsp;
								<input id='checkbox' type='radio' name='cancellation_cause' value='personal_illness'";
								
								if($row['22']=='personal_illness') { print('checked'); } else { print(''); };
								
				echo "			> Personal Illness &nbsp; &nbsp;
								<input id='checkbox' type='radio' name='cancellation_cause' value='family_illness'";
								
								if($row['22']=='family_illness') { print('checked'); } else { print(''); };
								
				echo " 			> Family Illness/Death &nbsp; &nbsp;<br><br>
								<input id='checkbox' type='radio' name='cancellation_cause' value='other_cause'";
								
								if($row['22']=='other_cause') { print('checked'); } else { print(''); };
				
				echo "			> Other (Describe): 
								<input style='width:75%' type='text' name='other_cause_description' value='" . ($row['23']) . "'>";

				echo "			<hr>
								Instructor's Signature: <input id='signature' type='text' name='instructor_signature' value='" . ($row['24']) . "' required>
								Date: <input type='date' name='instructor_date' value='" . ($row['25']) . "'><br><br><br>
								
								Dept./Div. Chair's Signature: <input id='signature' type='text' name='chair_signature' value='" . ($row['26']) . "'>
								Date: <input type='date' name='chair_date' value='" . ($row['27']) . "'><br><br><br>
								
								VP of Academic Affair's Signature: <input id='signature' type='text' name='vp_signature' value='" . ($row['28']) . "'>
								Date: <input type='date' name='vp_date' value='" . ($row['29']) . "'><br><br><br>
								
								<div style='text-align: center; font-size: 12px; font-style: italic;'>***By entering your full name, you have electronically signed this document.***</div><br><br><br>
								<hr>";
								
				echo "	</form></div></div><footer>&nbsp;</footer>";
			}
		?>
	</body>
</html>