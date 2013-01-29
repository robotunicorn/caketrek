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
		$link = "http://".$_SERVER['HTTP_HOST']."/caketrek/messages/view/".$event->subject()->data['Message']['id'];
		$notification->save(array(
						'type'=>'Vous avez un nouveau message!',
						'tourist_id' => $event->subject()->data['Message']['receiver_id'],
						'link' => $link,
						));
	}
}