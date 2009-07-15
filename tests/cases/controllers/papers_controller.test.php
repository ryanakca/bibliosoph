<?php 
/* SVN FILE: $Id$ */
/* PapersController Test cases generated on: 2009-07-15 11:07:20 : 1247671820*/
App::import('Controller', 'Papers');

class TestPapers extends PapersController {
	var $autoRender = false;
}

class PapersControllerTest extends CakeTestCase {
	var $Papers = null;

	function startTest() {
		$this->Papers = new TestPapers();
		$this->Papers->constructClasses();
	}

	function testPapersControllerInstance() {
		$this->assertTrue(is_a($this->Papers, 'PapersController'));
	}

	function endTest() {
		unset($this->Papers);
	}
}
?>