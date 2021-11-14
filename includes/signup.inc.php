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
	$vname=$_POST['vname'];
	$kname=$_POST['kname'];
	
	include "../model/dbconn.classes.php";
	include "../model/signup.classes.php";
	include "../controller/signup_controller.classes.php";
	
	$signup = new SignupController($uname, $pwd, $pwdRe, $email,$vname,$kname);
	
	$signup->Register();
	header("location: ../index.php?pid=reg_log");
	
}



?>