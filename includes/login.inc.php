<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

if(isset($_POST["logSub"]))
{
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	
	include "../model/dbconn.classes.php";
	include "../model/login.classes.php";
	include "../controller/login_controller.classes.php";
	
	$login = new LoginController($uname, $pwd);
	
	$login->UserLogin();
	header("location: ../index.php?error=none");
	
}



?>