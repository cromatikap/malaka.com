<?php

namespace Lib;

use PDO;

class Database
{
    /**
     * @var PDO
     */
    public static $dbh;

    public static function connect()
    {
        /*
        self::$dbh = new PDO(
            Configuration::getDSN(),
            Configuration::$databaseUser,
            Configuration::$databasePassword
        );

        self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$dbh->exec("SET NAMES 'UTF8'");
        */
    }
}