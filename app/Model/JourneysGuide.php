<?php
App::uses('AppModel', 'Model');
/**
 * JourneysGuide Model
 *
 * @property Journey $Journey
 * @property Guide $Guide
 */
class JourneysGuide extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'guide_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Journey' => array(
			'className' => 'Journey',
			'foreignKey' => 'journey_id',
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
		)
	);
}
