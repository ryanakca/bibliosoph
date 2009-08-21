<?php 
/* SVN FILE: $Id$ */
/* AliasesController Test cases generated on: 2009-07-16 11:07:26 : 1247756606*/
App::import('Controller', 'Aliases');

class TestAliases extends AliasesController {
	var $autoRender = false;
}

class AliasesControllerTest extends CakeTestCase {
	var $Aliases = null;

	function setUp() {
		$this->Aliases = new TestAliases();
		$this->Aliases->constructClasses();
	}

	function testAliasesControllerInstance() {
		$this->assertTrue(is_a($this->Aliases, 'AliasesController'));
	}

	function tearDown() {
		unset($this->Aliases);
	}
}
?>