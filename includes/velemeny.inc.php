<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
session_start();

	include "../model/dbconn.classes.php";
	include "../model/velemeny.classes.php";
	include "../controller/velemeny_controller.classes.php";
	
if(isset($_POST["velSub"]))
{	
	$velemeny=$_POST['velemeny'];
	if(!empty($_SESSION["userid"])){
		$userid=$_SESSION["userid"];
	}
	
	$submitV = new VelemenyController($userid,$velemeny);
	
	$submitV->Velemenyez();
	header("location: ../index.php?pid=velemeny");
	
}

if(isset($_POST["velGet"])){
	
	$velemeny=$_POST['velGet'];
	if(!empty($_SESSION["userid"])){
		$userid=$_SESSION["userid"];
	}
	
	$submitV = new VelemenyController($userid,$velemeny);
	
	$submitV->VelemenyLista($userid,$velemeny);
	header("location: ../index.php?pid=velemeny");
	



	
}



?>