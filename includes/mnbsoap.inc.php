<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
session_start();

if(isset($_POST["valSub"]))
{	
	$valutanem=$_POST['valutanem'];

	include "../controller/mnbsoap.controller.php";
	
	$submitValuta = new MNBSoap();
	$submitValuta->PickedOne($valutanem);
	header("location: ../index.php?pid=mnbsoap");
	
}
?>