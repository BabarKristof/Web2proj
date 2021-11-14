 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

//Soap MNB árfolyamokhoz.
class MNBSoap{

public function Arfolyam()
{	
 try {
   $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

  $tomb1 = (array)simplexml_load_string($client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult);
  $tomb2 = (array)simplexml_load_string($client->GetCurrencies()->GetCurrenciesResult);
 
 
	  $rates=(array)$tomb1['Day']->Rate;
	  // Leszedjük az első felesleges sort a tömbünlől 
	  array_shift($rates);

	  $currencies=(array)$tomb2['Currencies']->Curr;
	  // Leszedjük az első két felesleges sort a tömbünlől 
	  array_shift($currencies);
	  array_shift($currencies);
	  //Levágjuk a felesleges sorokat, hogy elfogadja az array_combine() a párosítást
	  $currencies=array_slice($currencies,0,count($rates));

	  // Egymás kombinálnjuk a tömböket.
	  $tomb=array_combine($currencies,$rates);
	  
		foreach ($tomb as $key => $values) {
			echo "<option value=$values>$key - $values HUF</option>\n";
			}
	
	} catch (SoapFault $e) {
        var_dump($e);
    }

 
 }

public function PickedOne($valutanem){
	$_SESSION['valutanem'] = "Válaszott pénznem értéke Forintban: ".$valutanem;
	
} 
 
 
 
 
}

  
?>