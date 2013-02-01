<?php
App::uses('AppController', 'Controller');
/**
 * JourneysGuides Controller
 *
 * @property JourneysGuide $JourneysGuide
 */
class JourneysGuidesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$guideid = 3;
		$touristid = 8;
		if(isset($guideid)){
			$jg =$this->JourneysGuide->find('all', array('conditions' => array('JourneysGuide.guide_id' => $guideid)));
			$this->set('journeysGuides', $jg);
		}else{
			$jg = $this->JourneysGuide->find('all', array('conditions' => array('Journey.tourist_id' => $touristid)));
			$this->set('journeysGuides', $jg);
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->JourneysGuide->id = $id;
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		$this->set('journeysGuide', $this->JourneysGuide->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// $guideid = 17;
		if ($this->request->is('post')) {
			$this->JourneysGuide->create();
			//Si c'est un guide, c'est une requête (donc status = 1)
			if(isset($guideid)){
			$this->request->data['JourneysGuide']['status'] = 1;
			}else{
			//Si ce n'est pas un guide, c'est donc l'organisateur, et c'est une invitation (status = 0)	
				$this->request->data['JourneysGuide']['status'] = 0;
			};
			debug($this->request->data);
			if ($this->JourneysGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys guide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys guide could not be saved. Please, try again.'));
			}
		}
		$journeys = $this->JourneysGuide->Journey->find('list');
		$guides = $this->JourneysGuide->Guide->find('list');
		$this->set(compact('journeys', 'guides'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$guideid = 2;
		$this->JourneysGuide->id = $id;
		if(isset($guideid)){
			$this->request->data['JourneysGuide']['status'] = 1;
		};
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JourneysGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys guide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys guide could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->JourneysGuide->read(null, $id);
		}
		$journeys = $this->JourneysGuide->Journey->find('list');
		$guides = $this->JourneysGuide->Guide->find('list');
		$this->set(compact('journeys', 'guides'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->JourneysGuide->id = $id;
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		if ($this->JourneysGuide->delete()) {
			$this->Session->setFlash(__('Journeys guide deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journeys guide was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->JourneysGuide->recursive = 0;
		$this->set('journeysGuides', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->JourneysGuide->id = $id;
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		$this->set('journeysGuide', $this->JourneysGuide->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->JourneysGuide->create();
			if ($this->JourneysGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys guide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys guide could not be saved. Please, try again.'));
			}
		}
		$journeys = $this->JourneysGuide->Journey->find('list');
		$guides = $this->JourneysGuide->Guide->find('list');
		$this->set(compact('journeys', 'guides'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->JourneysGuide->id = $id;
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JourneysGuide->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys guide has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys guide could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->JourneysGuide->read(null, $id);
		}
		$journeys = $this->JourneysGuide->Journey->find('list');
		$guides = $this->JourneysGuide->Guide->find('list');
		$this->set(compact('journeys', 'guides'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->JourneysGuide->id = $id;
		if (!$this->JourneysGuide->exists()) {
			throw new NotFoundException(__('Invalid journeys guide'));
		}
		if ($this->JourneysGuide->delete()) {
			$this->Session->setFlash(__('Journeys guide deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journeys guide was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * accept Method 
 *
 * Fonction lorsque l'organisateur accepte la proposition du guide
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function accept($id = null) {

			$j = $this->JourneysGuide->find('first',array(
				'conditions'=>array('JourneysGuide.id'=>$id)
			));

			$this->loadModel('Journey');
			$this->Journey->id = $j['JourneysGuide']['journey_id'];
			$this->request->data['Journey']['guide_id'] = $j['JourneysGuide']['guide_id'];
			if($this->Journey->save($this->request->data)){
				if(	$this->JourneysGuide->deleteAll(array('JourneysGuide.journey_id'=>$j['JourneysGuide']['journey_id']), false))
				{
					$this->Session->setFlash(__('Le guide a bien été validé'));
					$this->redirect(array('action' => 'index'));
				}
			}
			$this->redirect(array('action' => 'index'));
	}
}