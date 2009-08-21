<?php
class Paper extends AppModel {

	var $name = 'Paper';
        var $displayField = 'tr-id';
	var $validate = array(
                'tr-id' => array('rule' => 'isUnique',
                                'message' => 'Please use a unique Techreport ID.'),
		'title' => array('notempty'),
                'pages' => array ('rule' => 'numeric',
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

        var $hasOne = array(
                'Pdf' => array(
                        'className' => 'Pdf',
                        'foreignKey' => 'paper_id',
                        'dependent' => true,
                        'conditions' => array('Pdf.type' => 'application/pdf'),
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                ),
                'Ps' => array(
                        'className' => 'Ps',
                        'foreignKey' => 'paper_id',
                        'dependent' => true,
                        'conditions' => array('Ps.type' => array('application/ps', 'application/postscript')),
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
