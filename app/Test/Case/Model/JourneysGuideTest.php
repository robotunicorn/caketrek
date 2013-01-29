<?php
App::uses('JourneysGuide', 'Model');

/**
 * JourneysGuide Test Case
 *
 */
class JourneysGuideTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.journeys_guide',
		'app.journey',
		'app.tourist',
		'app.user',
		'app.badge',
		'app.badges_user',
		'app.guide',
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
		$this->JourneysGuide = ClassRegistry::init('JourneysGuide');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JourneysGuide);

		parent::tearDown();
	}

}
