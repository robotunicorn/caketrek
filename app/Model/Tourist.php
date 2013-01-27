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
 * @var string
 */
	public $displayField = 'first_name';
	
	
/**
 * Display field
 * 
 * @doc http://book.cakephp.org/2.0/en/models/virtual-fields.html
 * @var string
 */
public $virtualFields = array(
	'name' => 'CONCAT(Tourist.first_name, " ", Tourist.last_name)'
);
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
}
