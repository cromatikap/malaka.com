<?php

namespace Lib;

use Exception;

class IO
{
    public static function displayException(Exception $e)
    {
        $message =  sprintf(
            "%s on file %s on line %d.\n",
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );

    	Log::write($message);
        echo $message;
    }
}