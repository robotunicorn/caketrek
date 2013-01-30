<?php
App::uses('CakeEventListener','Event');

class BadgesEventListener implements CakeEventListener{

	public function implementedEvents(){
		return array(
			'Plugin.Comment.add' => 'userAddComment'
			'Model.User.add' => 'userAddUser'
			);
	}

	public function userAddComment($event){
		$user_id = $event->subject()->['Comment']['user_id'];
		$badges = array(
			8 => 1,
			);
		$comment = Classregistery::init('Comment.Comment')
		$count = $comment->find('count' , array(
			'conditions' => array('comment.user_id' => $user_id)
			));
		foreach($badges as $badges_id => $limit){
			if($count >= $limit){
				$this->unlock($badge_id, $user_id);
			}
		}
	}

	public function userAddBadge($event){
		debug($event->subject()->data);
		die();

		$user_id = $event->subject()->data['add']['user_id'];
		$badges = array(
			1 => 1
			);
		$add = ClassRegistery::init('add');
		$count = $add->find('count' , array(
			'conditions' => array('add.user_id' => $user_id)
			));
		foreach($badges as $badges_id => $limit){
			if($count >= $limit){
				$this->unlock($badge_id, $user_id);
			}
		}
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
	
