<?php 
/* SVN FILE: $Id$ */
/* Alias Fixture generated on: 2009-07-15 11:07:39 : 1247671119*/

class AliasFixture extends CakeTestFixture {
	var $name = 'Alias';
	var $table = 'aliases';
	var $fields = array(
		'first_name' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'initial' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 15),
		'last_name' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'author_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'author_id' => array('column' => 'author_id', 'unique' => 0))
	);
	var $records = array(array(
		'first_name'  => 'Lorem ipsum dolor sit amet',
		'initial'  => 'Lorem ipsum d',
		'last_name'  => 'Lorem ipsum dolor sit amet',
		'id'  => 1,
		'author_id'  => 1
	));
}
?>