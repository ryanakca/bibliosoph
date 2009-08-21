<?php 
/* SVN FILE: $Id$ */
/* UploadsController Test cases generated on: 2009-07-17 12:07:41 : 1247849861*/
App::import('Controller', 'Uploads');

class TestUploads extends UploadsController {
	var $autoRender = false;
}

class UploadsControllerTest extends CakeTestCase {
	var $Uploads = null;

	function setUp() {
		$this->Uploads = new TestUploads();
		$this->Uploads->constructClasses();
	}

	function testUploadsControllerInstance() {
		$this->assertTrue(is_a($this->Uploads, 'UploadsController'));
	}

	function tearDown() {
		unset($this->Uploads);
	}
}
?>