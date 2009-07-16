<?php
class PapersController extends AppController {

	var $name = 'Papers';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Paper->recursive = 1;
		$this->set('papers', $this->paginate());
	}

        function by_year($year = null) {
            if (!$year) {
                $this->Session->setFlash(__('No year specified', true));
                $this->redirect(array('action'=>'index'));
            }
            $conditions = array('conditions' => array(
                'Paper.published_on >' => date('Y-m-d H:i:s', strtotime($year.'-01-01 00:00:00')),
                'Paper.published_on <' => date('Y-m-d H:i:s', strtotime($year.'-12-31 23:59:59'))
                ), 'contain' => array('Paper'));
            $this->set('papers', $this->Paper->find('all', $conditions));
        }

	function admin_index() {
		$this->Paper->recursive = 0;
		$this->set('papers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Paper.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('paper', $this->Paper->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Paper->create();
			if ($this->Paper->save($this->data)) {
				$this->Session->setFlash(__('The Paper has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Paper could not be saved. Please, try again.', true));
			}
		}
		$aliases = $this->Paper->Alias->find('list');
		$this->set(compact('aliases'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Paper', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Paper->save($this->data)) {
				$this->Session->setFlash(__('The Paper has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Paper could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Paper->read(null, $id);
		}
		$aliases = $this->Paper->Alias->find('list');
		$this->set(compact('aliases'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Paper', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Paper->del($id, $cascade = true)) {
			$this->Session->setFlash(__('Paper deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
