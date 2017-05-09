<?php
	session_start();
	// if username and password were saved in cookie, check them
    if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"]))
    {
		$_SESSION["authenticated"] = FALSE;

		// redirect user to home page, using absolute path, per
		// http://us2.php.net/manual/en/function.header.php
		$host = $_SERVER["HTTP_HOST"];
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: http://$host/index.php");
		exit;
	}
?>