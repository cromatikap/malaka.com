<?php

namespace Lib;

use Lib\Configuration;


class Mail
{
	public static function send($mail, $objet, $message, $mailSender = NULL)
	{
		if(!$mailSender)
			$mailSender = Configuration::$mailKWAM;

		preg_match("/(.+)@/", $mailSender, $sender);

		/*************************************
    			FIN DU CONTENU DU MESSAGE
    	**************************************/
		$ip           = $_SERVER["REMOTE_ADDR"];
    	$hostname     = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		$message     .= "\n\nAdresse IP de l'expéditeur : " . $ip . "\r\n";
    	$message     .= "DLSAM : " . $hostname;


    	/*************************************
    					HEADER
    	**************************************/

    	$headers  = "From: \"$sender[1]\"<". $mailSender .">\r\n";
    	$headers .= "Reply-to: \"$sender[1]\" <". $mailSender .">\r\n";
		$headers .= "CC: " . $mailSender . " \r\n"; // ici l'expediteur du mail
	    $headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed \r\n";
	    $headers .= "Content-Disposition: inline \r\n";
	    $headers .= "Content-Transfer-Encoding: 7bit \r\n";
	    $headers .= "MIME-Version: 1.0";

		return mail($mail, $objet, $message, $headers, "-r $mailSender");

	}
}
?>