<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Badge $Badge
 */
class Notification extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tourist' => array(
			'className' => 'Tourist',
			'foreignKey' => 'tourist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
