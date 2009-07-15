<?php 
/* SVN FILE: $Id$ */
/* Alias Test cases generated on: 2009-07-15 11:07:39 : 1247671119*/
App::import('Model', 'Alias');

class AliasTestCase extends CakeTestCase {
	var $Alias = null;
	var $fixtures = array('app.alias', 'app.author');

	function startTest() {
		$this->Alias =& ClassRegistry::init('Alias');
	}

	function testAliasInstance() {
		$this->assertTrue(is_a($this->Alias, 'Alias'));
	}

	function testAliasFind() {
		$this->Alias->recursive = -1;
		$results = $this->Alias->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Alias' => array(
			'first_name'  => 'Lorem ipsum dolor sit amet',
			'initial'  => 'Lorem ipsum d',
			'last_name'  => 'Lorem ipsum dolor sit amet',
			'id'  => 1,
			'author_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>