<?php
App::uses('TouristsFriend', 'Model');

/**
 * TouristsFriend Test Case
 *
 */
class TouristsFriendTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tourists_friend'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TouristsFriend = ClassRegistry::init('TouristsFriend');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TouristsFriend);

		parent::tearDown();
	}

}
