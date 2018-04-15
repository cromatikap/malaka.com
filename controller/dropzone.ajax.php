<?php

use Lib\IO;
use Lib\Secure;
use Lib\Configuration;

define('MAX_SIZE', 2500000);
define('TARGET', Configuration::$rootPath .'/view/img/tmp/');

try
{
	// A METTRE AU DEBUT DE CHAQUE FICHIER .ajax.php
	Secure::ajaxController();

	$err = false;

	if(!preg_match("#^image\/(.*)#", $_FILES['file']['type'][0]))
		$err = true;
	if(filesize($_FILES['file']['tmp_name'][0]) > MAX_SIZE)
		$err = true;

	if($err){
		echo "error";
		die;
	}
	else{
		$name_img = md5(uniqid()) .'.'. pathinfo($_FILES['file']['name'][0], PATHINFO_EXTENSION);

		if(move_uploaded_file($_FILES['file']['tmp_name'][0], TARGET.$name_img))
			echo $name_img;
		else
			echo 'error';
	}
}
catch (Exception $e)
{
	IO::displayException($e);
}
?>