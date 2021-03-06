<?php
App::uses('AppModel', 'Model');
/**
 * Tourist Model
 *
 * @property User $User
 */
class Tourist extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed


/**
 * Display field
 * 
 * @doc http://book.cakephp.org/2.0/en/models/virtual-fields.html
 * @var string
 */


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'first_name';
	/*
		TODO try public $displayField = 'full_name';
	*/

	public $actsAs = array('Containable','Badge.Badge', 'Comment.Comment');
	

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Guide' => array(
			'className' => 'Guide',
			'foreignKey' => 'tourist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
	  'Following' => array(
	      'className' => 'Tourist',
	      'joinTable' => 'friends',
	      'foreignKey' => 'follower_id',
	      'associationForeignKey' => 'following_id',
	      'unique' => true,
	      'conditions' => '',
	      'fields' => '',
	      'order' => '',
	      'limit' => '',
	      'offset' => '',
	      'finderQuery' => '',
	      'deleteQuery' => '',
	      'insertQuery' => ''
	    ),
	  'Follower' => array(
	      'className' => 'Tourist',
	      'joinTable' => 'friends',
	      'foreignKey' => 'following_id',
	      'associationForeignKey' => 'follower_id',
	      'unique' => true,
	      'conditions' => '',
	      'fields' => '',
	      'order' => '',
	      'limit' => '',
	      'offset' => '',
	      'finderQuery' => '',
	      'deleteQuery' => '',
	      'insertQuery' => ''
	    )
	);
	
}
