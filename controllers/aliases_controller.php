<?php
class AliasesController extends AppController {

	var $name = 'Aliases';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Alias->recursive = 0;
		$this->set('aliases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Alias.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('alias', $this->Alias->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Alias->create();
			if ($this->Alias->save($this->data)) {
				$this->Session->setFlash(__('The Alias has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Alias could not be saved. Please, try again.', true));
			}
		}
		$papers = $this->Alias->Paper->find('list');
		$authors = $this->Alias->Author->find('list');
		$this->set(compact('papers', 'authors'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Alias', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Alias->save($this->data)) {
				$this->Session->setFlash(__('The Alias has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Alias could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Alias->read(null, $id);
		}
		$papers = $this->Alias->Paper->find('list');
		$authors = $this->Alias->Author->find('list');
		$this->set(compact('papers','authors'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Alias', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Alias->del($id)) {
			$this->Session->setFlash(__('Alias deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Alias->recursive = 0;
		$this->set('aliases', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Alias.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('alias', $this->Alias->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Alias->create();
			if ($this->Alias->save($this->data)) {
				$this->Session->setFlash(__('The Alias has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Alias could not be saved. Please, try again.', true));
			}
		}
		$papers = $this->Alias->Paper->find('list');
		$authors = $this->Alias->Author->find('list');
		$this->set(compact('papers', 'authors'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Alias', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Alias->save($this->data)) {
				$this->Session->setFlash(__('The Alias has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Alias could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Alias->read(null, $id);
		}
		$papers = $this->Alias->Paper->find('list');
		$authors = $this->Alias->Author->find('list');
		$this->set(compact('papers','authors'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Alias', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Alias->del($id)) {
			$this->Session->setFlash(__('Alias deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>