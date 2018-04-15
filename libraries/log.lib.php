<?php

namespace Lib;

use Lib\Configuration;

class Log
{
	public static function write($message)
	{
		$date = time();
		$message = "\n" . date("[H:i:s]",$date) . " " . $message;

		$log = fopen(Configuration::$rootPath . "/log/" . date("y_m_d", $date) . ".txt", "a+");
		fputs($log, $message);
		fclose($log);
	}
}
?>