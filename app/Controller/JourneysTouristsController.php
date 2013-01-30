<?php
App::uses('AppController', 'Controller');
/**
 * JourneysTourists Controller
 *
 * @property JourneysTourist $JourneysTourist
 */
class JourneysTouristsController extends AppController {

	public $status = array(0=>'invited', 1=>'accepted', 2=>'applied',3=>'rejected');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('status', $this->status);
		$this->JourneysTourist->recursive = 0;
		$this->set('journeysTourists', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('status', $this->status);
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		$this->set('journeysTourist', $this->JourneysTourist->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('status', $this->status);
		if ($this->request->is('post')) {
			$this->JourneysTourist->create();
			if ($this->JourneysTourist->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys tourist could not be saved. Please, try again.'));
			}
		}
		$journeys = $this->JourneysTourist->Journey->find('list');
		$tourists = $this->JourneysTourist->Tourist->find('list');
		$this->set(compact('journeys', 'tourists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('status', $this->status);
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JourneysTourist->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys tourist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->JourneysTourist->read(null, $id);
		}
		$journeys = $this->JourneysTourist->Journey->find('list');
		$tourists = $this->JourneysTourist->Tourist->find('list');
		$this->set(compact('journeys', 'tourists'));
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
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		if ($this->JourneysTourist->delete()) {
			$this->Session->setFlash(__('Journeys tourist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journeys tourist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->JourneysTourist->recursive = 0;
		$this->set('journeysTourists', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		$this->set('journeysTourist', $this->JourneysTourist->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->JourneysTourist->create();
			if ($this->JourneysTourist->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys tourist could not be saved. Please, try again.'));
			}
		}
		$journeys = $this->JourneysTourist->Journey->find('list');
		$tourists = $this->JourneysTourist->Tourist->find('list');
		$this->set(compact('journeys', 'tourists'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JourneysTourist->save($this->request->data)) {
				$this->Session->setFlash(__('The journeys tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journeys tourist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->JourneysTourist->read(null, $id);
		}
		$journeys = $this->JourneysTourist->Journey->find('list');
		$tourists = $this->JourneysTourist->Tourist->find('list');
		$this->set(compact('journeys', 'tourists'));
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
		$this->JourneysTourist->id = $id;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}
		if ($this->JourneysTourist->delete()) {
			$this->Session->setFlash(__('Journeys tourist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journeys tourist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function accepted($id = null) {
		$this->JourneysTourist->id = $id;
		$this->request->data['JourneysTourist']['status'] = 1;
		if (!$this->JourneysTourist->exists()) {
			throw new NotFoundException(__('Invalid journeys tourist'));
		}if($this->JourneysTourist->save($this->request->data)){
			$this->Session->setFlash(__('Welcome to the Journey')); // ,'succes'
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journeys tourist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

