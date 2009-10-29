<?php
class Author extends AppModel {

	var $name = 'Author';
        var $displayField = 'last_name';
	var $validate = array(
		'first_name' => array('notempty'),
		'last_name' => array('notempty'),
                'email' => array('rule'=>'email',
                                 'required'=>false,
                                 'allowEmpty'=>true),
                'homepage' => array('rule'=>'url',
                                    'required'=>false,
                                    'allowEmpty'=>true),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Alias' => array(
			'className' => 'Alias',
			'foreignKey' => 'author_id',
			'dependent' => true,
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
