<?php

class Comment extends AppModel {


	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'Comment.user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}