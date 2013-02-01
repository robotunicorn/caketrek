<?php
App::uses('AppModel', 'Model');
/**
 * Map Model
 *
 * @property Point $Point
 */
class Map extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'map';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Point' => array(
			'className' => 'Point',
			'foreignKey' => 'map_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
