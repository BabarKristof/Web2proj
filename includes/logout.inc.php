<?php
/// Session változókat teljesen kiürítjük, majd visszatérünk a főoldalra.
session_start();
session_unset();
session_destroy();

header("location: ../index.php?error=none");


?>