
<h2>Különböző MNB devizanemek értéke HUF-ban</h2>

<pre>
<form action="includes/mnbsoap.inc.php" method="post">
<select name="valutanem">
<?php
include_once("./controller/mnbsoap.controller.php");
	  $soaplist = new MNBSoap();
      echo $soaplist->Arfolyam();
      
?>
</select>
<tr><td><button type="submit" name="valSub">Választás</button></td></tr>
</form>
</pre>

<?php
if(!empty($_SESSION['valutanem'])){
echo $_SESSION['valutanem'];
}
?>
