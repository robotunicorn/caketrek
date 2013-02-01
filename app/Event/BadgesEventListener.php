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
		$user_id = $event->subject()->data['journeys']['user_id'];
		$badges = array(
			9 => 1,
			3 => 10,
		);
		$journey = classRegistry::init('journeys.journeys');
		$count = $journey->find('count', array(
			'conditions' => array('journeys.user_id' => $user_id)
			)
		);
		foreach($badges as $badge_id => $limit){
			if($count >= $limit){
				$this->unlock($badge_id, $user_id);
			}
		}
		die();
	}

	public function userAddComment($event){
		$user_id = $event->subject()->data['Comment']['user_id'];
		$badges = array(
			8 => 1,
		);
		$comment = classRegistry::init('Comment.Comment');
		$count = $comment->find('count', array(
			'conditions' => array('Comment.user_id' => $user_id)
			)
		);
		foreach($badges as $badge_id => $limit){
			if($count >= $limit){
				$this->unlock($badge_id, $user_id);
			}
		}
	}

	public function userAddUser($event){

	}

	public function unlock($badge_id, $user_id){
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
	
