<?php

App::uses('AppController', 'Controller');
/**
* @author Rémi Rollet
*/

class FindsController extends AppController{
	public $tables = array(
		'Users'=>array('username','email'),
		'Guides'=>array('slogan')
	);
	public $uses = array();

/**
*  Fonction de recherche find()
**/		
		
		public function find(){
		foreach($this->tables as $k=>$v){
			array_push($this->uses,$k);
		}
		if(empty($this->data)){
			
		}
		else{
			$results = array();
			$entry = $this->data;
			$entry = strtolower(current($entry['Find']));
			
			foreach($this->tables as $k=>$v):
				
			$results=$this->getResults($k,$entry,$results,$v);
			
			endforeach;
			debug($results);		
		}
	}
	
	function getResults($table,$entry,$results,$columns){
		foreach($columns as $v){
			$results[$table][$v]=array();
			$data = $this->$table->find('all', array( 
				'conditions' => array($table.'.'.$v.' LIKE' => '%'.$entry.'%') 
			));
	
			if(!empty($data)){
				foreach($data as $v2){
					array_push($results[$table][$v],current($v2));
				}
			}
			else{
				$results[$table][$v] = "Pas de résultat dans cette column";
			}
		}

		return $results;
	}
		

}
