<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
//signup database kapcsolattal
class Signup extends database{
	
	protected function setUser($uname,$pwd,$email,$vname,$kname,){
		$sql = ('INSERT INTO users (username,password,email,vname,kname) VALUES (?,?,?,?,?);');
		$stmt = $this->connect()->prepare($sql);
		
		//jelszó kódolás
		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		
		//Ha hiba van a beküldéssel, kilép
		if(!$stmt->execute(array($uname,$hashedPwd,$email,$vname,$kname))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		$stmt=null;
		
	}	
	
	//Létezik-e már a felhasználó az adatbázisban.
	protected function userExists($uname,$email){
		$sql = 'SELECT username FROM users WHERE username = ? OR email =?;';
		$stmt = $this->connect()->prepare($sql);
		
		//Ha hiba van a beküldéssel, kilép
		if(!$stmt->execute(array($uname,$email))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		
		//Van-e ilyen user az adatbázisban.
		$resultCheck;
		if($stmt->rowCount() > 0){
			$resultCheck = false;
			
		}
		else{
			$resultCheck = true;
		}
		return $resultCheck;
	}
	
	
}


?>