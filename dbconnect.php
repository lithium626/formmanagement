<?php
	$username=$_COOKIE['username'];
	$password=$_COOKIE['password'];
	$dbc = mysqli_connect("localhost", "$username", "$password", "formmanagement") or die ("Error connecting to database." . mysqli_connect_error());
?>