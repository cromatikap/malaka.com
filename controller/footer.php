<?php

use Lib\IO;

try
{
	include_once("view/footer.view.php");
}
catch (Exception $e)
{
	IO::displayException($e);
}

?>