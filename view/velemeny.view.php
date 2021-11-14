<html>
<head>
</head>
<body>

<h2>Kérjük írja le véleményét, vagy releváns híreit:</h2>

<form action="includes/velemeny.inc.php" method="post">
	<table>
	<tr><td><textarea name="velemeny" placeholder="Vélemény/Hír"></textarea></td></tr>
		<?php
		if(!empty($_SESSION['userid'])){
		?>
	<tr><td><button type="submit" name="velSub">Beküldés</button></td></tr>
		<?php
		} else echo "Kérjük jelentkezzen be a vélemény/hír beküldéséhez";
		?>
	</table>
</form>

<h2>Korábbi vélemények lekérdezése: </h2>
<form action="includes/velemeny.inc.php" method="post">
	<table>
	<tr><td><button type="submit" name="velGet">Lekérdez</button></td></tr>
	<tr><td></td></tr>
	</table>
</form>
<table>
<?php
if(!empty($_SESSION['ALLvelemeny'])){
foreach($_SESSION['ALLvelemeny'] as $key => $values){
	echo "<tr><td>".$values['userid']."</td><td>".$values['velemeny']."</td><td>".$values['datum']."</td></tr>";
	}
}
?>
</table>

</body>
</html>