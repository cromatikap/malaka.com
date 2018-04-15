<?php
header( 'content-type: text/html; charset=utf-8' );

use Lib\Configuration;
use Lib\Database;
use Lib\Cron;

////////////////////////////////////////////////
//				main includes 				  //
////////////////////////////////////////////////

include_once("libraries/configuration.lib.php");
include_once("libraries/database.lib.php");
include_once("libraries/io.lib.php");
include_once("libraries/log.lib.php");
include_once("libraries/secure.lib.php");
include_once("libraries/mail.lib.php");
include_once("libraries/cron.lib.php");

include_once("sql/abstract.sql.php");
include_once("sql/cron.sql.php");

include_once("model/abstract.model.php");
include_once("model/erreur.model.php");
include_once("model/header.model.php");
include_once("model/footer.model.php");
include_once("model/index.model.php");

////////////////////////////////////////////////
//				specific includes 			  //
////////////////////////////////////////////////

include_once("sql/menu.sql.php");

//Initialisation
Configuration::initialize();
Database::connect();

//Ouverture de session
session_set_cookie_params(900);
session_start();

if(empty($_SESSION)){
	$_SESSION["login"] = NULL;
	$_SESSION["id"] = NULL;
}


// crons
/*
$cron = new Cron;
$cron->set(60, "tmp_clean");
$cron->start();
*/

//URL rewriting handler
if(empty($_GET['file'])){
	//echo 'ok';
	include_once('controller/index.php');
}
elseif(file_exists(Configuration::$rootPath . "/controller/".$_GET['file'].".php"))
{
	//echo 'file exist';
	include_once("controller/".$_GET['file'].".php");
}
else{
	header('Location: http://'.Configuration::$rootURL.'/erreur.php?erreur=404');
}

?>
