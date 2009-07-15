<?php
class Alias extends AppModel {

	var $name = 'Alias';
	var $validate = array(
		'first_name' => array('alphanumeric'),
		'last_name' => array('alphanumeric'),
		'author_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Author' => array(
			'className' => 'Author',
			'foreignKey' => 'author_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Paper' => array(
			'className' => 'Paper',
			'joinTable' => 'aliases_papers',
			'foreignKey' => 'alias_id',
			'associationForeignKey' => 'paper_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>
