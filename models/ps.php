<?php
class Ps extends AppModel {

	var $name = 'Ps';
        var $useTable = 'uploads';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Paper' => array('className' => 'Paper',
					 'foreignKey' => 'paper_id',
		      			 'conditions' => '',
			    		 'fields' => '',
					 'order' => ''
			)
	);
	}
?>
