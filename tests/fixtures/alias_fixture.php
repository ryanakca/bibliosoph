<?php 
/* SVN FILE: $Id$ */
/* Alias Fixture generated on: 2009-07-16 11:07:58 : 1247756578*/

class AliasFixture extends CakeTestFixture {
	var $name = 'Alias';
	var $table = 'aliases';
	var $fields = array(
			'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'author_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'author_id' => array('column' => 'author_id', 'unique' => 0))
			);
	var $records = array(array(
			'name'  => 'Lorem ipsum dolor sit amet',
			'id'  => 1,
			'author_id'  => 1
			));
}
?>