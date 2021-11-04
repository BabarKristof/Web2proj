<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

	session_start();
	include_once("./includes/menu.class.php");
	include_once('./model/dbconn.classes.php');


$menulink="bemutatkozas";

 if (isset($_GET["pid"])) {
    $menulink=$_GET["pid"];
  }
  if (isset($_POST["pid"])) {
    $menulink=$_POST["pid"];
  }
  
?>
<html>
<head>
<link rel="stylesheet" href="./view/stilus.css" type="text/css"/>
</head>
<body>

<nav>
    <?php
      $main_menu = new Menu();
      echo $main_menu->MenuKeszit();
	  
    ?>
</nav>
    
<div id="content">
    <?php
//Keresett oldal megjelenítési a menü kontroller php segítségével, view mappából. - oldal ID alapján.	
	
      $ActualPage=$main_menu->MenupontVisszakeres($menulink);
	  if(isset($_GET["pid"]) == $menulink){
		  include("./view/".$menulink.".view.php");
	  } else include_once("./view/".$menulink.".view.php"); 
	  
	  // a fentebb inicializált menulink változó alapértelmezetten a bemutatkozás-t kapja meg, 
	  //így ezt hívjük meg, ha még nem történt post/get method
	  
    ?>
 </div>

</body>
</html>

<?php
//https://youtu.be/BaEm2Qv14oU?t=2501

?>