<?php
class AuthorsController extends AppController {

	var $name = 'Authors';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate());
	}

	function view($id = null) {
                $this->Author->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Author.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('author', $this->Author->read(null, $id));
                $this->set('papers', $this->paginate($this->Author->Alias->Paper));
	}

	function admin_index() {
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Author.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('author', $this->Author->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Author->create();
			if ($this->Author->save($this->data)) {
				$this->Session->setFlash(__('The Author has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Author could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Author', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Author->save($this->data)) {
				$this->Session->setFlash(__('The Author has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Author could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Author->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Author', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Author->del($id, $cascade = true)) {
			$this->Session->setFlash(__('Author deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
