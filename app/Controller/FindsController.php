<?php

App::uses('AppController', 'Controller');
/**
* @author Rémi Rollet
*/

class FindsController extends AppController{

	// headless
	public $uses = array();

/**
*  Fonction de recherche find()
**/
	public function find(){
		$entry = $this->data;
		$entry = strtolower(current($entry));
		debug($entry);
		
		$this->loadModel('Tourist');	
				
	}


}
