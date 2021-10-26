<?php
/// "Fejléc fájl" , a különböző oldalak elérését és cimkéit itt állíthatjuk. Front controller alapja.
$ablakcim = array(
    'cim' => 'Web2 beadando',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
	'cim' => 'Web2beadando',
	'motto' => 'Web2 beadando feladat'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'web2'
);

$oldalak = array(
	'/' => array('fajl' => 'reg_log', 'szoveg' => 'Főoldal'),
	'secondpage' => array('fajl' => 'secondpage', 'szoveg' => 'Masodik'),
	'thirdpage' => array('fajl' => 'thirdpage', 'szoveg' => 'Harmadik'),
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>