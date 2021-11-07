<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
//signup database kapcsolattal
class submitV extends database{
	
	protected function postVelemeny($userid,$velemeny){

		$sql = ('INSERT INTO velemenyek (userid,velemeny) VALUES (?,?);');
		$stmt = $this->connect()->prepare($sql);
		
		//Ha hiba van a beküldéssel, kilép
		if(!$stmt->execute(array($userid,$velemeny))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		$stmt=null;
		
	}
	
	
}