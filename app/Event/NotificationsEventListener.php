<?php 
App::uses('CakeEventListener','Event');
class NotificationsEventListener implements CakeEventListener {
	public function implementedEvents (){
		return array(
			'message.add.aftersave' => 'notiMessage',
			'comment.add.aftersave' => 'notiComment',
		);
	}
	public function notiComment($event){
		debug($event);
	}
	public function notiMessage($event){
		$tourist = ClassRegistry::init('Tourist');
		$sender = $tourist->find('all', array('conditions' => array('Tourist.id' => $event->subject()->data['Message']['sender_id'])));
		
		$notification = ClassRegistry::init('Notification');
		$link = "http://".$_SERVER['HTTP_HOST']."/caketrek/messages/view/".$event->subject()->data['Message']['id'];
		$notification->save(array(
			'type'=>'Vous avez un nouveau message de '.$sender[0]['Tourist']['first_name'].' '.$sender[0]['Tourist']['last_name'].'!',
			'tourist_id' => $event->subject()->data['Message']['receiver_id'],
			'link' => $link			
		));
	}
}