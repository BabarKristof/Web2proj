<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
//login database kapcsolattal
class Login extends database{
	
	protected function getUser($uname,$pwd){
		$sql = ('SELECT password FROM users WHERE username = ?;');
		$stmt = $this->connect()->prepare($sql);
		

		//Ha hiba van a beküldéssel, kilép
		if(!$stmt->execute(array($uname))){
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		
		}
		
		
		if($stmt->rowCount() == 0){
			$stmt = null;
			header("location: ../index.php?error=usernotfound");
			exit();
		}
		//jelszó kiválasztás és dekódolás
		$hashedPwd = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		$chechPwd = password_verify($pwd,$hashedPwd[0]["password"]);
		
		
		if($chechPwd == false){
			$stmt = null;
			header("location: ../index.php?error=wrongpassword"); 
			exit();
		//LOGIN
		}elseif($chechPwd == true){
			$sqlLog = ('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');
			$stmt = $this->connect()->prepare($sqlLog);
					
				if(!$stmt->execute(array($uname,$uname,$pwd))){
				$stmt = null;
				header("location: ../index.php?error=stmtfailed");
				exit();
				}
				
				if($stmt->rowCount() == 0){
				$stmt = null;
				header("location: ../index.php?error=usernotfound");
				exit();
				}
				
			$user=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
			///Fetchelt felhasználó adatait lebontjuk azokra, amit ki szeretnénk iratni, vagy kezelni globálisan.
			$_SESSION["userid"] = $user[0]["id"];
			$_SESSION["User_name"] = $user[0]["username"];
			$_SESSION["loggedUser"] = $user[0]["VName"]." ".$user[0]["KName"]." (".$user[0]["username"].")";
		
			$stmt = null;
		
		}
	
	}	
}


?>