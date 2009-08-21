<?php
class Pdf extends AppModel {

	var $name = 'Pdf';
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
