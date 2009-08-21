<?php 
/* SVN FILE: $Id$ */
/* Paper Test cases generated on: 2009-07-15 11:07:37 : 1247671297*/
App::import('Model', 'Paper');

class PaperTestCase extends CakeTestCase {
	var $Paper = null;
	var $fixtures = array('app.paper');

	function startTest() {
		$this->Paper =& ClassRegistry::init('Paper');
	}

	function testPaperInstance() {
		$this->assertTrue(is_a($this->Paper, 'Paper'));
	}

	function testPaperFind() {
		$this->Paper->recursive = -1;
		$results = $this->Paper->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Paper' => array(
			'id'  => 1,
			'tr-id'  => 'Lorem ipsum dolor sit amet',
			'title'  => 'Lorem ipsum dolor sit amet',
			'published_on'  => 'Lorem ipsum dolor sit amet',
			'update_on'  => 'Lorem ipsum dolor sit amet',
			'pdf'  => 'Lorem ipsum dolor sit amet',
			'ps'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>