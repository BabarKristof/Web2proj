<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
//Regisztráció controller osztály
class SignupController extends Signup{
	private $uname;
	private $pwd;
	private $pwdRe;
	private $email;
	private $vname;
	private $kname;
	

	public function __construct($uname, $pwd, $pwdRe, $email,$vname,$kname){
		$this->uname = $uname; 
		$this->pwd = $pwd;
		$this->pwdRe = $pwdRe ;
		$this->email = $email; 
		$this->vname = $vname; 
		$this->kname = $kname; 
		
	}
	
	//Regisztráció
	
	public function Register(){
		if($this->InputEmpty() == false ){
			header("location: ../index.php?error=empty_input");
			exit();
		}
		if($this->pwdMatching() == false ){
			header("location: ../index.php?error=pwd_not_matching");
			exit();
		}
		if($this->UserExistsErr() == false ){
			header("location: ../index.php?error=user_already_exists");
			exit();
		}
		
		$this->setUser($this->uname,$this->pwd,$this->email,$this->vname,$this->kname); 
	}
		
	
	
	
	//Error handling függvények
	
	private function InputEmpty(){
		$result;
		if(empty($this->uname) || empty($this->pwd) || 
		   empty($this->pwdRe) || empty($this->email) || empty($this->vname) || empty($this->kname))
		{
			$result = false;  	
		}
		else{
			$result = true;
		}
		return $result;
	}
	
	private function pwdMatching(){
		$result;
		if($this->pwd !== $this->pwdRe)
		{
			$result = false;  	
		}
		else{
			$result = true;
		}
		return $result;
	}
		
	
	
	private function UserExistsErr(){
		$result;
		if(!$this->userExists($this->uname,$this->email))
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