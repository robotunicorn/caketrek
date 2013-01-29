<?php
/**
 * JourneysTouristFixture
 *
 */
class JourneysTouristFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'journey_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tourist_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'journey_id' => 1,
			'tourist_id' => 1,
			'status' => 1
		),
	);

}
