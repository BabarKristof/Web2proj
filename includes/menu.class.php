<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
include_once('./model/dbconn.classes.php');
 class Menu extends database{
    public function __construct() {
  
    } 
    
    private function MenuRekurziv($menupontID, $elotag, $melyseg) {
    
      $sql = "
        select *
        from menuk
        where oldal_alias<>''
          and oldal_felettes=$menupontID
          and aktiv=1 and
          pub_date<'".date('Y-m-d H:i:s',time())."'
          and unpub_date>'".date('Y-m-d H:i:s',time())."'
        order by oldal_sorrend
      ";
      $menupontok = $this->connect()->prepare($sql);
      $menupontok->execute();
		


      if ($menupontok->rowCount() != 0) {
     
        $ki = "<ul class=\"menu$melyseg\">";
        $menupont = $menupontok->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($menupont as $menu) {
	
		if(($menu['oldal_alias']!="reg_log" && !empty($_SESSION["User_name"])) || ($menu['oldal_alias']!="logout" && empty($_SESSION["User_name"]))){
          if ($melyseg == 1)
            $link = $menu["oldal_alias"];
          else
            $link = $elotag."/".$menu["oldal_alias"];
          $ki .= "<li class=\"menuitem\"><a href=\"?pid=$link\">".$menu["oldal_cim"]."</a>";
          $ki .= $this->MenuRekurziv($menu["id"], $link, $melyseg + 1);
          $ki .= "</li>";
		  
			}
        }
	
		if(!empty($_SESSION["User_name"])){
		$ki .= "<li><a>".$_SESSION["loggedUser"]."<a></li>";
		}
        $ki .= "</ul>";
		
		
        return $ki;
		  
      } else {
        return "";
      }
    }  
  
    public function MenuKeszit() {
   
      return $this->MenuRekurziv(0, "", 1);
    } 
    
    public function MenupontVisszakeres($menulink) {

      if ($menulink == "") {
        return 404;
      } else {
   
        $menudarabok = explode("/", $menulink);
        $felettes = 0;
        foreach ($menudarabok as $darab) {

          $sql = "
            select *
            from menuk
            where oldal_felettes=$felettes
              and oldal_alias='$darab'
              and aktiv=1
              and pub_date<'".date('Y-m-d H:i:s',time())."'
              and unpub_date>'".date('Y-m-d H:i:s',time())."'
          ";
          $menupontok = $this->connect()->prepare($sql);
          $menupontok->execute();
          if ($menupontok->rowCount() == 0) {
     
            return 404;
          } else {

            $menupont = $menupontok->fetch();
            $aktualis_oldal = $menupont["id"];
            $felettes = $aktualis_oldal;
          }

        }
        return $aktualis_oldal;
      }
    }  /
  }
?>
