<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {

/**
 * index method
 *
 * @return void
*
*Affiche tout les messages d'un utilisateur (inbox)
 */
	
	public function index() {
	 	$me['id']=1;

		$conversations = $this->Message->find('all', array(
				'conditions' => array(
					'or' => array('receiver_id' => $me['id'], 'sender_id' => $me['id'])
				),
				'group'=>'Receiver.id, Sender.id',
				
    			'order' => array('date DESC')
		));

		$this->set('conversations', $conversations);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	 	$me['id']=1;

		$conversation = $this->Message->find('all', array(
				'conditions' => array(
					'OR' => array(
						array('AND' => array('receiver_id' => $me['id'], 'sender_id' => $id )),
						array('AND' => array('receiver_id' => $id, 'sender_id' => $me['id'] ))
				),
				
    			// 'order' => array('date DESC')

		)));




		$this->set('conversation', $conversation);
	}


	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		}
		$senders = $this->Message->Sender->find('list');
		$receivers = $this->Message->Receiver->find('list');
		$this->set(compact('senders', 'receivers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
		}
		$senders = $this->Message->Sender->find('list');
		$receivers = $this->Message->Receiver->find('list');
		$this->set(compact('senders', 'receivers'));
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
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('Message deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Message was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
