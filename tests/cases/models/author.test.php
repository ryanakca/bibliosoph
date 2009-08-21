<?php 
/* SVN FILE: $Id$ */
/* Author Test cases generated on: 2009-07-15 11:07:09 : 1247671389*/
App::import('Model', 'Author');

class AuthorTestCase extends CakeTestCase {
	var $Author = null;
	var $fixtures = array('app.author', 'app.alias');

	function startTest() {
		$this->Author =& ClassRegistry::init('Author');
	}

	function testAuthorInstance() {
		$this->assertTrue(is_a($this->Author, 'Author'));
	}

	function testAuthorFind() {
		$this->Author->recursive = -1;
		$results = $this->Author->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Author' => array(
			'id'  => 1,
			'first_name'  => 'Lorem ipsum dolor sit amet',
			'initial'  => 'Lorem ipsum d',
			'last_name'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'homepage'  => 'Lorem ipsum dolor sit amet',
			'updated_on'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>