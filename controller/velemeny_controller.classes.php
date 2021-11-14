<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);

class VelemenyController extends submitV{
	private $userid;
	private $velemeny;


	public function __construct($userid,$velemeny){
		$this->userid = $userid; 
		$this->velemeny = $velemeny; 
	}
	//Regisztráció
	
	public function Velemenyez(){
		$this->postVelemeny($this->userid,$this->velemeny); 
	}

	public function VelemenyLista(){
		$this->reqVelemeny($this->userid,$this->velemeny); 
	}
		
}
	