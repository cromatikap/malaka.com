<?php

use Lib\Secure;
use Model\Erreur;

try
{
	$_GET['erreur'] = (isset($_GET['erreur'])) ? $_GET['erreur'] : 404;
	
	$err = new Erreur(Secure::forceInt($_GET['erreur']));

	$erreur = array("libelle" 	=> $err->get(),
					"id" 		=> Secure::forceInt($_GET['erreur'])
					);

   	include_once("header.php");
   	include_once("view/erreur.view.php");
   	include_once("footer.php");
}
catch (Exception $e)
{
   IO::displayException($e);
}
?>
