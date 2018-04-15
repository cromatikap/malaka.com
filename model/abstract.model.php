<?php

namespace Model;

abstract class AbstractModel {
	protected $data = array();
	protected $errors = array();

	function __construct($data = NULL){
		if($data)
			$this->data = $data;		
	}

	public function setData($data){
    	$this->data = $data;
	}
}
?>