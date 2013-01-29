<?php
/**
 * JourneysGuideFixture
 *
 */
class JourneysGuideFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'journey_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'guide_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'budget' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
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
			'guide_id' => 1,
			'budget' => 1,
			'status' => 1
		),
	);

}
