<?php
class AuthorsController extends AppController {

	var $name = 'Authors';
	var $helpers = array('Html', 'Form');
        var $components = array('Auth');
        var $paginate = array('order' => array('last_name' => 'asc'));

        function beforeFilter() {
                $this->Auth->allow('index', 'view');
        }

	function index() {
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate());
	}

        function view($id = null) {
               // Thanks to Mark Story from #cakephp on irc.freenode.net for
               // contributing this code.
               $this->Author->Alias->AliasesPaper->recursive = 2;

               if (!$id) {
                    $this->Session->setFlash(__('Invalid Author.', true));
                    $this->redirect(array('action'=>'index'));
                }
                $author = $this->Author->read(null, $id);
                $aliasIds = Set::extract('/Alias/id', $author);
                $this->Author->Alias->AliasesPaper->bindModel(array(
                    'belongsTo' => array(
                        'Paper' => array(
                            'className' => 'Paper',
                            'foreignKey' => 'paper_id'
                        )
                    )
                ), false);
                $this->paginate['AliasesPaper']['conditions']['AliasesPaper.alias_id'] = $aliasIds;
                $this->paginate['AliasesPaper']['conditions']['Paper.display'] = 1;
                $this->set('papers', $this->paginate($this->Author->Alias->AliasesPaper));
                $this->set('author', $author);
        }

	function admin_index() {
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate());
	}

        function admin_search() {
                $this->Author->recursive = 0;
                $lastname = $this->data['Search']['last_name'];
		$this->paginate = array(
			'conditions' => array('Author.last_name LIKE' =>
					    str_replace('*', '%', $lastname)),
			'order' => array('Author.last_name' => 'asc')
		);
		$this->set('authors', $this->paginate());
                $this->set('title', 'Search results for lastname:' . $lastname);
                $this->render('admin_index');
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
		if ($this->Author->delete($id, $cascade = true)) {
			$this->Session->setFlash(__('Author deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
