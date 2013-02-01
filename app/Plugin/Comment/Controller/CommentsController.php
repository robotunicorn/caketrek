<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

	public function index() {
			
	}
	/**
 * add method
 *
 * @return void
 */


	public function add() {

		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));

			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
			return $this->redirect($this->referer());
		}
	}

	public function delete($id){
		$this->Comment->delete($id);
		$this->Session->setFlash(__('The comment has been deleted'));
		return $this->redirect($this->referer());
	}

}