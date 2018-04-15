<?php

namespace Sql;

use Exception;
use Lib\Database;
use Lib\Secure;

abstract class AbstractSql
{
    protected $tableName;
    private $data = array();

    //Pour reseter les datas une fois qu'une opération est terminée
    private function reset(){
    	$this->data = array();
    }

    public function set($index, $value){
		$this->data[$index] = $value;
	}

	public function update($where_i, $where_val){
		$stringData = '';

		$separator = '';
		foreach ($this->data as $index => $value) {
			$stringData .= $separator.$index.' = \''.$value.'\'';
			$separator = ', ';
		}

		$request = 'UPDATE '.$this->tableName.' 
					SET '. $stringData .'
					WHERE '.$where_i.' = \''.$where_val.'\'';
		$bdd = Database::$dbh->prepare($request);
		$bdd->execute();

		$this->reset();
	}

	public function insert(){
		$stringData = array("index" => "", "values" => "");

		$separator = '';
		foreach ($this->data as $index => $value) {
			$stringData["index"] .= $separator . $index;
			$stringData["values"] .= $separator . '\''. $value . '\'';
			$separator = ',';
		}

		$request = 'INSERT INTO ' . $this->tableName . '(' . $stringData["index"] . ') 
					VALUES (' . $stringData["values"] . ')';

		$bdd = Database::$dbh->prepare($request);
		$bdd->execute();

		$this->reset();

		return Database::$dbh->lastInsertId();
	}


	//////////// SELECT //////////////////

	public function getAll(){
		$bdd = Database::$dbh->prepare('SELECT * 
										FROM '.$this->tableName.'
										ORDER BY id
										');
		$bdd->execute();
		return $bdd->fetchAll();
	}

	public function getById($id){
		$bdd = Database::$dbh->prepare('SELECT * 
										FROM '.$this->tableName.'
										ORDER BY id
										');
		$bdd->execute(array(Secure::forceInt($id)));
		return $bdd->fetch();
	}
}
?>