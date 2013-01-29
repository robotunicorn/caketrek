<?php

App::uses('AppController', 'Controller');
/**
* @author digithis
*/

class FindsController extends AppController{
	
	public $tables = array(
		'Users'	  => array('username','email'),
		'Journeys'  =>array('about','name','body'),
		'Tourists'=>array('bio','first_name','last_name')
	);
	public $uses = array();
	public $total_results = 0;

/**
* 	Fonction index() => Traitement des données envoyées par le formulaire
**/	
	public function index(){

	foreach($this->tables as $k=>$v){
		array_push($this->uses,$k);
	}
	if(empty($this->data)){
		//todo
	}
	else{
		$results = array();
			
		$entry = $this->data;
		$entry = strtolower(current($entry['Find']));
	
		foreach($this->tables as $k=>$v):
			
			$results=$this->getResults($k,$entry,$results,$v);
			
		endforeach;
		debug($results); //debug des results		
		}
	}

/**
*  Fonction de comparaison des entrées dans les tables indiquées => getResults()
**/
	function getResults($table,$entry,$results,$columns){
	foreach($columns as $v){
		$data = $this->$table->find('all', array( 
			'conditions' => array($table.'.'.$v.' LIKE' => '%'.$entry.'%') 
		));
	
		if(!empty($data)){
			$results[$table]=array();
			foreach($data as $v2){
				array_push($results[$table],current($v2));
				$this->total_results++;
			}
		}

	}
	return $results; //return array de résultats
	}

}
