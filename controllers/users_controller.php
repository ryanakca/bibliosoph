<?php
class UsersController extends AppController {
    var $name = 'Users';
    var $components = array('Auth');
/*    function beforeFilter() {
        $this->Auth->allow('admin_register');
}*/

    function admin_login() {
    }
    function admin_logout() {
        $this->redirect($this->Auth->logout());
    }
    function admin_register() {
        if ($this->data) {
            if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
                $this->User->create();
                $this->User->save($this->data);
                $this->Session->setFlash('Created the user');
                $this->redirect(array('action'=>'login'));
            } else {
                $this->Session->setFlash('Your passwords do not match');
            }
        }
    }
}
?>
