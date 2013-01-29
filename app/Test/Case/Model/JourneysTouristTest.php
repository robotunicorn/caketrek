<?php
App::uses('JourneysTourist', 'Model');

/**
 * JourneysTourist Test Case
 *
 */
class JourneysTouristTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.journeys_tourist',
		'app.journey',
		'app.tourist',
		'app.media',
		'app.user',
		'app.badge',
		'app.badges_user',
		'app.guide',
		'app.friend',
		'app.tourists_friend',
		'app.track',
		'app.zone'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->JourneysTourist = ClassRegistry::init('JourneysTourist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JourneysTourist);

		parent::tearDown();
	}

}
