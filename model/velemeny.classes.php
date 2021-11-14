<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

//signup database kapcsolattal
class submitV extends database{
	
	protected function postVelemeny($userid,$velemeny){
		$datum = date("Y-m-d h:i:s");
		$sql = ('INSERT INTO velemenyek (userid,velemeny,datum) VALUES (?,?,?);');
		$stmt = $this->connect()->prepare($sql);
		
		//Ha hiba van a beküldéssel, kilép
		if(!$stmt->execute(array($userid,$velemeny,$datum))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		$stmt=null;
		
	}
	
	protected function reqVelemeny($userid,$velemeny){
		$sql = ('SELECT * FROM velemenyek order by datum DESC');
			$stmt = $this->connect()->prepare($sql);
					
				if(!$stmt->execute()){
				$stmt = null;
				header("location: ../index.php?error=stmtfailed");
				exit();
				}
				
				if($stmt->rowCount() == 0){
				$stmt = null;
				header("location: ../index.php?error=usernotfound");
				exit();
				}
				
			$velemenyList=$stmt->fetchAll(PDO::FETCH_ASSOC);

			//die();
			///Fetchelt felhasználó adatait lebontjuk azokra, amit ki szeretnénk iratni, vagy kezelni globálisan.
			$_SESSION['ALLvelemeny']=$velemenyList;
			
			
			
			/*foreach($velemenyList as $values) {
				var_dump($values);
				die();
				$_SESSION['ALLvelemeny'] += $values;
			}*/
		
	}
	
	
	
	
}