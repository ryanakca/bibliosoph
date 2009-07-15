<?php 
/* SVN FILE: $Id$ */
/* Paper Fixture generated on: 2009-07-15 11:07:37 : 1247671297*/

class PaperFixture extends CakeTestFixture {
	var $name = 'Paper';
	var $table = 'papers';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'tr-id' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'title' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 500),
		'published_on' => array('type'=>'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'update_on' => array('type'=>'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'pdf' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'ps' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'tr-id'  => 'Lorem ipsum dolor sit amet',
		'title'  => 'Lorem ipsum dolor sit amet',
		'published_on'  => 'Lorem ipsum dolor sit amet',
		'update_on'  => 'Lorem ipsum dolor sit amet',
		'pdf'  => 'Lorem ipsum dolor sit amet',
		'ps'  => 'Lorem ipsum dolor sit amet'
	));
}
?>