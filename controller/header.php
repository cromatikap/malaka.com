<?php

use Lib\IO;
use Lib\Secure;
use Lib\Configuration;
use Model\Header;

try
{
	$header = new Header(Secure::getCurrentURI());

	include_once("view/header.view.php");
}
catch (Exception $e)
{
	IO::displayException($e);
}

?>

