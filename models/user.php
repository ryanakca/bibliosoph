<?php
class User extends AppModel {

	var $name = 'User';
        var $validate = array(
            'username' => array('rule' => 'isUnique',
                                'message' => 'Please use a unique username'),
            );

}
?>
