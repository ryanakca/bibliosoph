<?php 
/* SVN FILE: $Id$ */
/* Upload Fixture generated on: 2009-07-17 12:07:19 : 1247849839*/

class UploadFixture extends CakeTestFixture {
	var $name = 'Upload';
	var $table = 'uploads';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
			'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 200),
			'size' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'paper_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'type'  => 'Lorem ipsum dolor sit amet',
			'size'  => 1,
			'created'  => '2009-07-17 12:57:19',
			'modified'  => '2009-07-17 12:57:19',
			'paper_id'  => 1
			));
}
?>