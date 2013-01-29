<?php 
App::uses('CakeEventListener','Event');
class NotificationsEventListener implements CakeEventListener {
	public function implementedEvents (){
		return array(
			'message.add.aftersave' => 'notiMessage',
		);
	}
	
	public function notiMessage($event){
		$notification = ClassRegistry::init('Notification');
		$notification->save(array(
						'type'=>'message',
						'tourist_id' => $event->subject()->data['Message']['receiver_id']
						));
	}
}