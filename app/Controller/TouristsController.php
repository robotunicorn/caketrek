<?php
App::uses('AppController', 'Controller');
/**
 * Tourists Controller
 *
 * @property Tourist $Tourist
 */
class TouristsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tourist->recursive = 0;
		$this->Tourist->contain('User','Guide','Badge');
		$this->set('tourists', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tourist->id = $id;
		$this->Tourist->recursive = 0;
		$this->Tourist->contain('User','Guide','Badge');
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		$tourist = $this->Tourist->find('first', array(
			'conditions' => array('Tourist.id' => $id)
		));
		$this->set('tourist', $tourist);
		
	}
/**
 * Follow method
 *
 * @throws NotFoundException
 * @param string $to_follow_id
 * @return void
 */
	public function follow($to_follow_id) {
		$me['id'] = 1;
		$data['Friends']['follower_id'] = $me['id']; // Ici on prend l'id du user connecté dans la session du component Auth
		$data['Friends']['following_id'] = $to_follow_id;
		$this->Tourist->bindModel(array('hasOne'=>array('Friends')),false);
		if ($this->Tourist->Friends->save($data)) {
			$this->Session->setFlash(__('Tourist Followed'));
			$this->redirect(array('action' => 'index'));
		}
		else {
		  	$this->Session->setFlash(__('You already follow that tourist'));
			$this->redirect(array('action' => 'index'));
		}
	}

	public function followlist() {
		$me['id'] = 1;
		$this->Tourist->contain('Following');

		$following = $this->Tourist->find('all', array('conditions' => array('Tourist.id' => $me['id'])));
		$this->set('followings', $following);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tourist->create();
			if ($this->Tourist->save($this->request->data)) {
				$this->Session->setFlash(__('The tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tourist could not be saved. Please, try again.'));
			}
		}
		$users = $this->Tourist->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		$this->Tourist->recursive = 0;
		$this->Tourist->contain('User','Guide','Badge');
		
		$this->Tourist->id = $id;
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tourist->save($this->request->data)) {
				$this->Session->setFlash(__('The tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tourist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tourist->read(null, $id);
		}
		$badges = $this->Tourist->Badge->find('list');

		$users = $this->Tourist->User->find('list');
		$this->set(compact('users','badges'));
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
		$this->Tourist->id = $id;
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		if ($this->Tourist->delete()) {
			$this->Session->setFlash(__('Tourist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tourist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tourist->recursive = 0;
		$this->set('tourists', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Tourist->id = $id;
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		$this->set('tourist', $this->Tourist->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tourist->create();
			if ($this->Tourist->save($this->request->data)) {
				$this->Session->setFlash(__('The tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tourist could not be saved. Please, try again.'));
			}
		}
		$users = $this->Tourist->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Tourist->id = $id;
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tourist->save($this->request->data)) {
				$this->Session->setFlash(__('The tourist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tourist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tourist->read(null, $id);
		}
		$users = $this->Tourist->User->find('list');
		$this->set(compact('users'));
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
		$this->Tourist->id = $id;
		if (!$this->Tourist->exists()) {
			throw new NotFoundException(__('Invalid tourist'));
		}
		if ($this->Tourist->delete()) {
			$this->Session->setFlash(__('Tourist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tourist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
