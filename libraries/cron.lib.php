<?php
use Sql\Cron;

namespace Lib;

use Lib\Configuration;

class Cron{
	private $sqlCron;
	private $crons = array();

	function __construct(){
		$this->sqlCron = new \Sql\Cron;
	}

	public function start(){
		foreach ($this->crons as $cron) {
			$d = $this->sqlCron->getByFunction($cron["function"])["date"];

			if(time() - strtotime($d) > $cron["interval_min"]){
				$this->$cron["function"]();

				//$update = $this->sqlCron->initRequest();
				$this->sqlCron->set("date", date('Y-m-d H-i-s'));
				$this->sqlCron->update("function", $cron["function"]);
			}
		}
	}

	public function set($interval_min, $function){
		array_push($this->crons, array(
					"interval_min" => $interval_min, 
					"function" =>$function));
	}

	//clean le dossier img/tmp/ pour virer les images temporaires qui sont là depuis trop longtemps
	private function tmp_clean(){
		$duree_vie_min = 60;

		$path = Configuration::$rootPath.'/view/img/tmp';
		$dossier = opendir($path);

		while ($fichier = readdir($dossier)) {
			if(!is_file($path.'/'.$fichier) || $fichier = 'index.html')
				continue;

			if(time() - filemtime($path.'/'.$fichier) > $duree_vie_min*60)
				unlink($path.'/'.$fichier);
		}
	}
}
?>