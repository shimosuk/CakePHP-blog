<?php
App::uses('Post', 'Model');

/**
 * Post Test Case
 *
 */
class PostTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.post');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}

        public function testタイトルは必須入力である() {
            $this->Post->create(array('Post'=>array('title'=>'')));   // (a)
            $this->assertFalse($this->Post->validates());      // (b)
            $this->assertArrayHasKey('title', $this->Post->validationErrors); // (c)
        }
}
