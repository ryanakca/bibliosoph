<?php
class Paper extends AppModel {

	var $name = 'Paper';
        var $displayField = 'tr-id';
	var $validate = array(
                'tr-id' => array('rule' => 'isUnique',
                                'message' => 'Please use a unique Techreport ID.'),
		'title' => array('notempty'),
                'pages' => array ('rule' => 'numeric',
                                  'allowEmpty' => true),
                'display' => array('rule' => 'boolean')
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


	function compareTrId ($a, $b) {
                // 2010-02 < 2011-19 < 2011-100 < 2012-52
		$ya = substr($a, 0, 4);
		$yb = substr($b, 0, 4);
		$ida = substr($a, 5);
		$idb = substr($b, 5);
		if ($a == $b) {
			return 0;
                } elseif ($ya == $yb) {
                        return ($ida < $idb) ? -1 : 1;
                } else {
                        return ($ya < $yb) ? -1 : 1;
                }
	}

        function reverseCompareTrID ($a, $b) {
                return -1 * $this->compareTrId($a, $b);
        }

        function fetchAndSortByTrID() {
                $papers = $this->find('list');
                uasort($papers, array($this, 'compareTrID'));
                return $papers;
        }

        function fetchAndSortByReverseTrID() {
                $papers = $this->find('list');
                uasort($papers, array($this, 'reverseCompareTrID'));
                return $papers;
        }

}
?>
