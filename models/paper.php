<?php
class Paper extends AppModel {

	var $name = 'Paper';
        var $displayField = 'tr-id';
	var $validate = array(
		'tr-id' => array('notempty'),
		'title' => array('notempty'),
                'pdf' => array('rule' => 'url',
                               'allowEmpty' => true),
		'ps' => array('rule' => 'url',
                              'allowEmpty' => true)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Alias' => array(
			'className' => 'Alias',
			'joinTable' => 'aliases_papers',
			'foreignKey' => 'paper_id',
			'associationForeignKey' => 'alias_id',
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
