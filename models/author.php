<?php
class Author extends AppModel {

	var $name = 'Author';
	var $validate = array(
		'first_name' => array('notempty'),
		'last_name' => array('notempty'),
		'email' => array('email'),
		'homepage' => array('url'),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Alias' => array(
			'className' => 'Alias',
			'foreignKey' => 'author_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
