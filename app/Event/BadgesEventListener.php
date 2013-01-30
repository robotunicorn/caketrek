<?php
App::uses('CakeEventListener','Event');

class BadgesEventListener implements CakeEventListener{

	public function implementedEvents(){
		return array(
			'Plugin.Comment.add' => 'userAddComment',
			'Model.User.add' => 'userAddUser',
			'Model.Journey.add' => 'userAddJourney'
			);
	}

	public function userAddJourney($event){
		var_dump($event);
		die();
	}

	public function userAddComment($event){

	}

	public function userAddUser($event){

	}

	public function unlock($badges_id, $user_id){
		$badgesUser = Classregistery::init('badgesUser');
		$badge = $badgesUser->find('first', array(
			'conditions' => array('badgesUser.badge_id' => $badge_id, 'badgesUser.user_id' =>
				$user_id)
			));
		if(empty($badge)){
			$badgesUser->create();
			$badgesUser->save(array(
				'badge_id' => $badge_id,
				'user_id' => $user_id
				));
			SessionComponent::setFlash('Vous avez débloqué un badge !!');
		}
	}
}	
	
