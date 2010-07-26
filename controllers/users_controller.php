<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
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

	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_add() {
                if (!empty($this->data)) {
                        if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
                                $this->User->create();
                                if ($this->User->save($this->data)) {
                                        $this->Session->setFlash(__('Created the user', true));
                                        $this->redirect(array('action'=>'index'));
                                } else {
                                        $this->Session->setflash(__('The User could not be saved. Please, try again.', true));
                                }
                        } else {
                                $this->Session->setFlash('Your passwords do not match.');
                        }
                }
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
                            if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
                                    $this->Session->setFlash(__('The User has been saved', true));
                                    $this->redirect(array('action'=>'index'));
                            }
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
