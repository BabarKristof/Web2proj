<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
//Regisztráció controller osztály
class LoginController extends Login{
	private $uname;
	private $pwd;


	public function __construct($uname,$pwd){
		$this->uname = $uname; 
		$this->pwd = $pwd;
	}
	

	//Error handling függvények
	
	public function UserLogin(){
		if($this->InputEmpty() == false ){
			header("location: ../index.php?error=empty_login_imput");
			exit();

		}	
	$this->getUser($this->uname,$this->pwd);
	
	}
		

	
	private function InputEmpty(){
		$result;
		if(empty($this->uname) || empty($this->pwd))
		{
			$result = false;  	
		}
		else{
			$result = true;
		}
		return $result;
	}
	

	
	
	
}
?>
