<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 */
class NotificationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$me['id'] = 1;
		$notif = $this->Notification->find('all', array('conditions' => array('tourist_id' => $me['id'])));
		$this->set('notifications', $notif);
		
	}
	
	function afterFilter(){
		$me['id'] = 1;
		$counterNoti = ($this->Notification->find('count', array('conditions' => array('tourist_id' => $me['id'], 'viewed' => 0))))-1;
		$myNoti = $this->Notification->find('all', array('conditions' => array('tourist_id' => $me['id'], 'viewed' => 0)));
		
		$i = 0;
		while ($i <= $counterNoti) {
			$this->Notification->read('id', $myNoti[$i]['Notification']['id']);	
			$this->Notification->set('viewed', 1);
			$this->Notification->save();
		    $i++;
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
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->set('notification', $this->Notification->read(null, $id));
	}

}
