<?php
class Upload extends AppModel {

	var $name = 'Upload';
        var $actsAs = array(
                'FileUpload.FileUpload' => array(
                'uploadDir' => 'files',
                'forceWebroot' => true,
                'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size'),
                'allowedTypes' => array('pdf' => array('application/pdf'),
                                        'ps' => array('application/ps', 'applications/postscript')),
                'required' => false, 
                'maxFileSize' => false,
                'unique' => true,
                'fileNameFunction' => 'false'
            )
        );


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
