<?php


namespace Model;

use Lib\Configuration;
use Lib\Secure;
use Sql\Menu;

class Header{
	private $sqlMenu;
	private $currentUri;

   	function __construct($uri){
   		$this->currentUri = $uri;
   		$this->sqlMenu = new Menu;
   	}

   	public function getMenu(){
		$menu = $this->sqlMenu->getAll();
		$menu_final = array("menu0" => array());

		$key_exept=0;

		//retrouve quel lien pourrait être activé en fonction de la page où l'on se situe
		foreach ($menu as $i => $m) {
			if (preg_match("#".$m["uri"]."#", Secure::getCurrentURI())) {
				$libelle = str_replace("-", "", $menu[$i]["libelle"]);			
				if (array_search($libelle, array_column($menu, "libelle", "uri")) != NULL) {
					$key_exept = array_search($libelle, array_column($menu, "libelle"));	
				}
			}
		}

		//met au bon endroit le marqueur d'activation
		foreach ($menu as $i => $m) {
			if((preg_match("#".$m["uri"]."#", Secure::getCurrentURI())) || (Secure::getCurrentURI() == "" && $m["uri"] == "index.php") || $i == $key_exept)
				$menu[$i]["actif"] = "menu_active";
			else
				$menu[$i]["actif"] = "";
		}

		//Range les types de menu
		$j = 0;

		foreach ($menu as $i => $m) {
			if(!isset($menu_final["menu".$m["id_menu"]]))
				$menu_final["menu".$m["id_menu"]] = array();
			array_push($menu_final["menu".$m["id_menu"]], $m);
		}

		return $menu_final;
	}

	public function getJavascriptTag(){
		$root = 'http://'.Configuration::$rootURL;

		switch ($this->currentUri) {
			case 'contact.php':
				return array($root."/view/js/contact.ajax.js");
				break;
				
			case 'admin/ajoutermannequin.php':
				return array($root."/view/js/lib/dropzone.js", $root."/view/js/ajoutermannequin.js");
				break;

			case 'login.php' : 
				return array($root.'/view/js/admin_login.js');
				break;

			default:
				return array();
				break;
		}
	}
}
?>
