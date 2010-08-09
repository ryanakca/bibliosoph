<?php
class PapersController extends AppController {

	var $name = 'Papers';
	var $helpers = array('Html', 'Form');
        var $components = array('Auth');
        var $paginate = array('order' => array('`Paper`.`tr-id`' => 'desc'));

        function beforeFilter() {
            $this->Auth->allow('index', 'by_year', 'view');
        }

	function index() {
                $this->pageTitle = 'Technical Reports';
		$this->Paper->recursive = 1;
                $this->paginate['Paper']['conditions']['Paper.display'] = '1';
		$this->paginate['Paper']['order']['`Paper`.`tr-id`'] = 'asc';
		$this->set('papers', $this->paginate('Paper'));
	}

        function by_year($year = null) {
            if (!$year) {
                $this->Session->setFlash(__('No year specified', true));
                $this->redirect(array('action'=>'index'));
            }
            $this->pageTitle = 'Technical reports for the year ' . $year;
            $this->paginate = array(
                'conditions' => array(
                    'YEAR(Paper.published_on)' => $year,
                    'Paper.display' => '1'),
                //'contain' => array('Paper')
            );
            $this->set('papers', $this->paginate('Paper'));
        }

        function view($tr_id = null) {
		if (!$tr_id) {
			$this->Session->setFlash(__('Invalid Paper.', true));
			$this->redirect(array('action'=>'index'));
		}
                $this->set('paper', $this->Paper->find('first', array(
                    'conditions' => array('`Paper`.`tr-id`' => $tr_id))));
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
		if ($this->Paper->delete($id, $cascade = true)) {
			$this->Session->setFlash(__('Paper deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
