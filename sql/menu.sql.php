<?php

namespace Sql;

use PDO;
use Lib\Database;

class Menu extends AbstractSql{
	function __construct(){
		$this->tableName = 'menu';
	}
}
?>