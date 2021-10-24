<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

if(isset($_POST["regSub"]))
{
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$pwdRe=$_POST['pwdRe'];
	$email=$_POST['email'];
	
	include "../classes/dbconn.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup_controller.classes.php";
	
	$signup = new SignupController($uname, $pwd, $pwdRe, $email);
	
	$signup->Register();
	header("location: ../index.php?error=none");
	
}



?>