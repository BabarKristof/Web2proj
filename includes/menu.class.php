<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
include_once('./model/dbconn.classes.php');
 class Menu extends database{
    public function __construct() {
      //a menü beolvasása
    }  //__construct
    
    private function MenuRekurziv($menupontID, $elotag, $melyseg) {
      //ez építi fel a menüt rekurzívan, azaz keresi az adott menü almenüit
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
        //csak akkor gyártjuk le az almenüt tartalmazó listát, ha van legalább
        //egy elérhető almenüpont
        $ki = "<ul class=\"menu$melyseg\">";
        $menupont = $menupontok->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($menupont as $menu) {
		// Megnézzük, hogy van-e vagy nincs bejelentkezett felhasználó, és ez alapján vagy a bejelentkezés, vagy a kilépés menüpont jelenik meg.
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
		///Ha a felhasználó belép, akkor extra menüelemképp kiírjuk a bejelentkezett felhasználó nevét a feladat ártal kért formátumban.
		if(!empty($_SESSION["User_name"])){
		$ki .= "<li><a>".$_SESSION["loggedUser"]."<a></li>";
		}
        $ki .= "</ul>";
		
		
        return $ki;
		  
      } else {
        return "";
      }
    }  //MneuRekurziv
  
    public function MenuKeszit() {
      //az a meghívható metódus, és ez fogja meghívni a rekurziót először
      return $this->MenuRekurziv(0, "", 1);
    }  //MenuKeszit
    
    public function MenupontVisszakeres($menulink) {
      //a link alapján visszakeressük az oldal id-jét;
      //ha nem létezik, vagy az elérési úton valami nem aktív vagy nem hozzáférhető, akkor 404
      if ($menulink == "") {
        return 404;
      } else {
        //a $menulink felvágása darabokra - a $menudarabok egy tömb lesz
        $menudarabok = explode("/", $menulink);
        $felettes = 0;
        foreach ($menudarabok as $darab) {
          //ellenőrizzük, hogy a $felettes almenüpontjai között van-e megfelelő
          //és az elérhető-e
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
            //ha nincs megfelelő nevű almenü, akkor hibaoldal
            return 404;
          } else {
            //ha van, akkor az lesz az aktuális, és folytatjuk az ellenőrzést
            $menupont = $menupontok->fetch();
            $aktualis_oldal = $menupont["id"];
            $felettes = $aktualis_oldal;
          }

        }
        return $aktualis_oldal;
      }
    }  //MenupontVisszakeres
  }
?>
