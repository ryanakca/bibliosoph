<?php 
/* SVN FILE: $Id$ */
/* Author Fixture generated on: 2009-07-15 11:07:07 : 1247671387*/

class AuthorFixture extends CakeTestFixture {
	var $name = 'Author';
	var $table = 'authors';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'first_name' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'initial' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 15),
		'last_name' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'email' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'homepage' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'updated_on' => array('type'=>'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'first_name'  => 'Lorem ipsum dolor sit amet',
		'initial'  => 'Lorem ipsum d',
		'last_name'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'homepage'  => 'Lorem ipsum dolor sit amet',
		'updated_on'  => 'Lorem ipsum dolor sit amet'
	));
}
?>