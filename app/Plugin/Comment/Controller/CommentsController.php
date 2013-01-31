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
		//$this->Comment->Comment->addComment($model,$infos);

		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));

			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
	}

}