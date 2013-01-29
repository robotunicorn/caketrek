<?php
App::uses('AppModel', 'Model');
/**
 * Journey Model
 *
 * @property Tourist $Tourist
 * @property Guide $Guide
 * @property Track $Track
 * @property Zone $Zone
 * @property Tourist $Tourist
 */
class Journey extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Leader' => array(
			'className' => 'Tourist',
			'foreignKey' => 'tourist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Guide' => array(
			'className' => 'Guide',
			'foreignKey' => 'guide_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'track_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Zone' => array(
			'className' => 'Zone',
			'foreignKey' => 'zone_id',
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
		'Tourist' => array(
			'className' => 'Tourist',
			'joinTable' => 'journeys_tourists',
			'foreignKey' => 'journey_id',
			'associationForeignKey' => 'tourist_id',
			'unique' => 'keepExisting',
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
