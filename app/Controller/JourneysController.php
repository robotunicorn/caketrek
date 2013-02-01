
<?php
App::uses('AppController', 'Controller');
/**
 * Journeys Controller
 *
 * @property Journey $Journey
 */

	//echo $javascript->link('prototype');
	//echo $javascript->link('scriptaculous');

class JourneysController extends AppController {

	var $uses = array('Journey', 'Track', 'Zones'); 

	var $paginate = array(
        'limit' => 5,
        'order' => array(
            'Journey.created' => 'asc'
        )
    );
/**
 * index method
 *
 * @return void
 */
 
	public function index() {
	
		$this->Track->recursive = -1;
		$data = $this->paginate('Journey', array('Journey.public' => 1));
		$this->set('journeys', $data);
		$d['famous_tracks'] = $this->Track->find('all', array('order' => 'journey_count DESC'));
		$d['famous_tracks'] = $d['famous_tracks'];
		$this->set($d);
		
	}
	

/*
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


	public function view($id = null) {
		$this->Journey->id = $id;
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		$journey = $this->Journey->find('first', array(
			'conditions' => array('Journey.id' => $id)
		));
		$this->set('journey', $this->Journey->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Journey->create();
			if ($this->Journey->save($this->request->data)) {
				$this->Session->setFlash(__('The journey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journey could not be saved. Please, try again.'));
			}
		}
		$tracks = $this->Journey->Track->find('list');
		$zones = $this->Journey->Zone->find('list');
		$this->set(compact('tracks', 'zones'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Journey->id = $id;
		
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Journey->save($this->request->data)) {
				$this->Session->setFlash(__('The journey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journey could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Journey->read(null, $id);
		}
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
		$this->Journey->id = $id;
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		if ($this->Journey->delete()) {
			$this->Session->setFlash(__('Journey deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journey was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$data = $this->paginate('Journey', array('Journey.public LIKE' => 1));
		$this->set('journeys', $data);
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Journey->id = $id;
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		$this->set('journey', $this->Journey->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Journey->create();
			if ($this->Journey->save($this->request->data)) {
				$this->Session->setFlash(__('The journey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journey could not be saved. Please, try again.'));
			}
		}
		$tracks = $this->Journey->Track->find('list');
		$zones = $this->Journey->Zone->find('list');
		$this->set(compact('tracks', 'zones'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Journey->id = $id;
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Journey->save($this->request->data)) {
				$this->Session->setFlash(__('The journey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The journey could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Journey->read(null, $id);
		}
		$tracks = $this->Journey->Track->find('list');
		$zones = $this->Journey->Zone->find('list');
		$this->set(compact('tracks', 'zones'));
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
		$this->Journey->id = $id;
		if (!$this->Journey->exists()) {
			throw new NotFoundException(__('Invalid journey'));
		}
		if ($this->Journey->delete()) {
			$this->Session->setFlash(__('Journey deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Journey was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
