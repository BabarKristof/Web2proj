<?php
//Sessiont el kell kezdenünk minden oldalon.
	session_start();
?>

<html>
<head>
</head>
<body>

<!--Regisztrációs űrlap-->
<form action="includes/signup.inc.php" method="post">
	<table>
	<tr><td><input type="text" name="uname" placeholder="Felhasználónév"></td></tr>
	<tr><td><input type="password" name="pwd" placeholder="Jelszó"></td></tr>
	<tr><td><input type="password" name="pwdRe" placeholder="Jelszó újra"></td></tr>
	<tr><td><input type="text" name="email" placeholder="E-mail"></td></tr>
	<tr><td><button type="submit" name="regSub">Regisztráció</button></td></tr>
	</table>
</form>

<br/>
<!--Bejelentkezés űrlap-->
<form action="includes/login.inc.php" method="post">
	<table>
	<tr><td><input type="text" name="uname" placeholder="Felhasználónév"></td></tr>
	<tr><td><input type="password" name="pwd" placeholder="Jelszó"></td></tr>
	<tr><td><button type="submit" name="logSub">Bejelentkezés</button></td></tr>
	</table>
</form>




</body>
</html>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);



//https://youtu.be/BaEm2Qv14oU?t=2501

?>