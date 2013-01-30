<?php

App::uses('AppController', 'Controller');
/**
* @author digithis
*/

class FindsController extends AppController{
	public $theme = "Bootstrap";
	
	public $tables = array(
		'Tourists'=>array(
			'infos'=>array('bio','first_name','last_name'),
			'displayfields' =>array('first_name')
		),
		'Users'=>array(
			'infos'=>array('username','email'),
			'displayfields' => array('username'),
			'show' => array(
				'name'=>'Tourists',
				'key'=>'user_id'
		)),
		'Journeys'=>array(
			'infos'=>array('name','about','body'),
			'displayfields' =>array('name','public')
		)
	);
	public $uses = array();
	public $total = 0;

/**
* 	Fonction index() => Traitement des données envoyées par le formulaire
**/	
	public function index(){
		
	}
	function ajaxProcess(){
	// Cas des requêtes AJAX
	        if ( $this->request->is( 'ajax' ) ){
				foreach($this->tables as $k=>$v):
					array_push($this->uses,$k);
				endforeach;
				$results = array();

				$entry = $this->request->query[ 'entry' ];
				$entry = strtolower($entry);

				foreach($this->tables as $k=>$v):
							$results=$this->getResults($k,$entry,$results,$v['infos'],$v['displayfields']);	
				endforeach;

				//$this->set($d);

	            // On encode au format JSON et on affiche directement ce résultat (pour le récupérer dans la vue)
	            echo json_encode($results);

	            // Il faut penser à terminer le script brutalement pour court-circuiter les mécanismes
	            // de CakePHP (méthodes de la classe mère AppController par exemple)
	            exit();
	        }
	        else {
	            // Code qui servirait dans le cas de requêtes http classiques (par opposition à AJAX)
	            // Pour nous dans cet exemple, c'est inutile...
	        }
	    }

/**
*  Fonction de comparaison des entrées dans les tables indiquées => getResults()
**/
	function getResults($table,$entry,$results,$columns,$displayfields){
		$conditions = array();
		foreach($columns as $v){
		    $conditions[] = array($table.'.'.$v.' LIKE' => '%'.$entry.'%');
		}
		// On recherche les correspondances dans la BDD
		$data = $this->$table->find('all', array( 
			'conditions' => array('OR' => $conditions)) 
		);
		// Si il y'a correspondance
		if(!empty($data)){
			//Si le type traité doit afficher un autre type (par exemple Users->show->Tourists)
			if(isset($this->tables[$table]['show'])){
				
				$show_name = $this->tables[$table]['show']['name'];
				$show_key  = $this->tables[$table]['show']['key'];
				$displayfields = $this->tables[$show_name]['displayfields'];
				
				foreach($data as $search_results): //On traites les données de la recherche dans un foreach
					$itexists = false;
					$search_results = current($search_results);
					$id = $search_results['id'];
					 // ID du résultat
					$show_data = $this->$show_name->find('all', array(
						'conditions' => array($show_name.'.'.$show_key => $id)
					));
					
					if(!empty($show_data)){ //S'il y'a correspondance entre les deux types (par exemple si Users est lié à Tourists)
						
					$show_data = current(current($show_data));
						if(!isset($results[$show_name])){ 
							$results[$show_name] = array();
						}
						foreach($results[$show_name] as $valeur){
							if($valeur['id']==$id){
								$itexists = true;
							}
						}	
						if(!$itexists){
							$show_data['displayfields']=$displayfields;
							$show_data['normal']='lol';
							array_push($results[$show_name],$show_data); // On ajoute les valeurs à notre array results		
						}
					}
				endforeach;						
			}
			else{
				if(!isset($results[$table])){
					$results[$table]=array();
				}
				foreach($data as $search_results):
					$itexists = false;
					$search_results=current($search_results);
					
						foreach($results[$table] as $valeur){
							if($valeur['id']==$search_results['id']){
								$itexists = true;
							}
						}
						if(!$itexists){
							$search_results['displayfields']=$displayfields;
							$search_results['normal']='normal';
							array_push($results[$table],$search_results);// On ajoute les valeurs à notre array results
						}
				endforeach;
			}
		}	
	return $results; //return array de résultats
	}	
}
