<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

if(isset($_POST["logSub"]))
{
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	
	include "../classes/dbconn.classes.php";
	include "../classes/login.classes.php";
	include "../classes/login_controller.classes.php";
	
	$login = new LoginController($uname, $pwd);
	
	$login->UserLogin();
	header("location: ../index.php?error=none");
	
}



?>