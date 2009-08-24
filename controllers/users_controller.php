<?php
class UsersController extends AppController {
    var $name = 'Users';
    var $components = array('Auth');
    function beforeFilter() {
        $this->Auth->loginRedirect = array('action'=>'index', 'controller'=>'papers', 'admin'=>true);
        $this->Auth->logoutRedirect = array('action'=>'index', 'controller'=>'pages', 'admin'=>false);
    }

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
