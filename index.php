<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

	session_start();
	include('./includes/config.inc.php');
	include('./model/dbconn.classes.php');

///Oldalak keresése fájlok között.
	if (isset($_GET['oldal'])) {
		$oldal = $_GET['oldal'];
		if (isset($oldalak[$oldal]) && file_exists("./view/{$oldalak[$oldal]['fajl']}.view.php")) {
			$keres = $oldalak[$oldal];
		}
		else if (isset($extrak[$oldal]) && file_exists("./view/{$extrak[$oldal]['fajl']}.view.php")) {
			$keres = $extrak[$oldal];
		}
		else { 
			$keres = $hiba_oldal;
			header("HTTP/1.0 404 Not Found");
		}
	}
	else $keres = $oldalak['/'];

	
?>
<html>
<head>
<link rel="stylesheet" href="./view/stilus.css" type="text/css"/>
</head>
<body>

 <div id="menu">
        <aside id="nav">
            <nav>
                <ul>
				<!--Oldalak "kiíratása" és bejelentkezés után session változóban tárolt felhasználónév hozzáírása a menüsávhoz. -->
				<!--A ki és bejelentkezés oldalak a session tartalmának megfelelően jelennek meg -->
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
						<a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
						<?= $oldal['szoveg'] ?></a>
						</li>
					<?php } ?>
				
					
					<?php
				
					if(isset($_SESSION["userid"]) && !empty($_SESSION["User_name"]) )
					{
					?>
					<li><a href="./includes/logout.inc.php">Kilépés</a><li>
					<?php }else{ ?>
					<li><a href="///////// Át kell még alakítani ///////////">Bejelentkezés</a></li>
					<?php }  ?>
					
					<?php
					if(isset($_SESSION["userid"]) && !empty($_SESSION["User_name"]) ){
					?>
					<li><a>
					<?php 
					echo $_SESSION["User_name"];				
					?>
					</a></li>
					<?php
					}		
           				?>
					
		
			 </ul>
           </nav>
		   
        </aside>
	</div>
	<!--Alapértelmezett oldal -->
       <div id="">
            <?php include("./view/{$keres['fajl']}.view.php"); ?>
        </div>
    


</body>
</html>

<?php

//https://youtu.be/BaEm2Qv14oU?t=2501

?>