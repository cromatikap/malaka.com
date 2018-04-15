<?php

namespace Sql;

use PDO;
use Lib\Database;
use Lib\Secure;

class Cron extends AbstractSql{

	function __construct(){
		$this->tableName = 'cron';
	}

	public function getByFunction($function){
		$bdd = Database::$dbh->prepare('SELECT *
										FROM '.$this->tableName.'
										WHERE function = ?
										');
		$bdd->execute(array(Secure::text($function)));
		return $bdd->fetch();
	}
}
?>