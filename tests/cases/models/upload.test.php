<?php 
/* SVN FILE: $Id$ */
/* Upload Test cases generated on: 2009-07-17 12:07:19 : 1247849839*/
App::import('Model', 'Upload');

class TestUpload extends Upload {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class UploadTestCase extends CakeTestCase {
	var $Upload = null;
	var $fixtures = array('app.upload', 'app.paper');

	function start() {
		parent::start();
		$this->Upload = new TestUpload();
	}

	function testUploadInstance() {
		$this->assertTrue(is_a($this->Upload, 'Upload'));
	}

	function testUploadFind() {
		$this->Upload->recursive = -1;
		$results = $this->Upload->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Upload' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'type'  => 'Lorem ipsum dolor sit amet',
			'size'  => 1,
			'created'  => '2009-07-17 12:57:19',
			'modified'  => '2009-07-17 12:57:19',
			'paper_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>