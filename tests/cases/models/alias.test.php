<?php 
/* SVN FILE: $Id$ */
/* Alias Test cases generated on: 2009-07-16 11:07:59 : 1247756579*/
App::import('Model', 'Alias');

class TestAlias extends Alias {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class AliasTestCase extends CakeTestCase {
	var $Alias = null;
	var $fixtures = array('app.alias', 'app.author');

	function start() {
		parent::start();
		$this->Alias = new TestAlias();
	}

	function testAliasInstance() {
		$this->assertTrue(is_a($this->Alias, 'Alias'));
	}

	function testAliasFind() {
		$this->Alias->recursive = -1;
		$results = $this->Alias->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Alias' => array(
			'name'  => 'Lorem ipsum dolor sit amet',
			'id'  => 1,
			'author_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>