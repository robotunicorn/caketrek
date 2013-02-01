<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 */
class NotificationsController extends AppController {

public $theme = "Bootstrap";
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$me['id'] = $this->Auth->user()['Tourist']['id'];
		$notif = $this->Notification->find('all', array('conditions' => array('tourist_id' => $me['id']),'order' => array('Notification.created DESC')));
		$this->set('notifications', $notif);
		$today = date("Y-m-d H:i:s");
	  	$todayParsed = date_parse($today);
		$yesterday = date("F j, Y", time() - 60 * 60 * 24);
		$yesterdayParsed = date_parse($yesterday); 
		$item = "";
		$this->set('notifications', $notif);
		$this->set('today', $today);
		$this->set('todayParsed', $todayParsed);
		$this->set('yesterday', $yesterday);
		$this->set('yesterdayParsed', $yesterdayParsed);
		$this->set('item', $item);		
	}
	public function delete() {
		$me['id'] = 1;
		//$this->Notification->deleteAll(array('Notification.tourist_id' => $me['id'], 'Notification.viewed' => 1));
		//$this->redirect(array('action'=>'index'));
		if ($this->Notification->deleteAll(array('Notification.tourist_id' => $me['id'], 'Notification.viewed' => 1),false)) {
			$this->Session->setFlash(__('User deleted'),'alert');
			$this->redirect(array('action' => 'index'));
		}
		$this->redirect(array('action' => 'index'));
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

}
?>