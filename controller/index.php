<?php

use Lib\IO;
use Lib\Secure;
use Lib\Configuration;
use Model\Index;

try
{
	include_once("header.php");
	include_once(Configuration::$rootPath . "/view/index.view.php");
	include_once("footer.php");
}
catch (Exception $e)
{
	IO::displayException($e);
}

?>
