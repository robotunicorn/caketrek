<?php
App::uses('Journey', 'Model');

/**
 * Journey Test Case
 *
 */
class JourneyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.journey',
		'app.tourist',
		'app.user',
		'app.badge',
		'app.badges_user',
		'app.guide',
		'app.journeys_guide',
		'app.badge_object',
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
		$this->Journey = ClassRegistry::init('Journey');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Journey);

		parent::tearDown();
	}

}
