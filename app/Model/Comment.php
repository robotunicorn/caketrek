<?php
class Comment extends AppModel{

	public function afterSave( $created ){
		if($created){
			$this->getEventManager()->dispatch(new CakeEvent('Model.Comment.add' , $this));
		}
	}
}