<?php
App::uses('AppController', 'Controller');
/**
 * Points Controller
 *
 * @property Point $Point
 */
class PointsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Point->recursive = 0;
		$this->set('points', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		$this->set('point', $this->Point->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id) {
		$this->request->data['Point']['map_id'] = $id;
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->save($this->request->data)) {
				$this->Session->setFlash(__('The point has been saved'));
				$this->redirect(array('action' => 'add',$id));
			} else {
				$this->Session->setFlash(__('The point could not be saved. Please, try again.'));
			}
		}
		$maps = $this->Point->Map->find('list');
		$this->set(compact('maps'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->save($this->request->data)) {
				$this->Session->setFlash(__('The point has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The point could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Point->read(null, $id);
		}
		$maps = $this->Point->Map->find('list');
		$this->set(compact('maps'));
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
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		if ($this->Point->delete()) {
			$this->Session->setFlash(__('Point deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Point was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Point->recursive = 0;
		$this->set('points', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		$this->set('point', $this->Point->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->save($this->request->data)) {
				$this->Session->setFlash(__('The point has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The point could not be saved. Please, try again.'));
			}
		}
		$maps = $this->Point->Map->find('list');
		$this->set(compact('maps'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->save($this->request->data)) {
				$this->Session->setFlash(__('The point has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The point could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Point->read(null, $id);
		}
		$maps = $this->Point->Map->find('list');
		$this->set(compact('maps'));
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
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__('Invalid point'));
		}
		if ($this->Point->delete()) {
			$this->Session->setFlash(__('Point deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Point was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
