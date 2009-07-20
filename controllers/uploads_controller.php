<?php
class UploadsController extends AppController {

	var $name = 'Uploads';
	var $helpers = array('Html', 'Form');
	var $components = array('FileUpload');

	function admin_index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Upload.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
                        $paper = $this->Upload->Paper->find('first', array('id' => $this->data['Upload']['paper_id']));
                        $this->FileUpload->fileName = $paper['Paper']['tr-id'].$this->FileUpload->_ext();
                        $this->FileUpload->processFile();
			if ($this->FileUpload->success) {
				$this->Session->setFlash(__('The file has been uploaded.', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash($this->FileUpload->showErrors());
			}
		}
		$papers = $this->Upload->Paper->find('list');
		$this->set(compact('papers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Upload', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The Upload has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Upload could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Upload->read(null, $id);
		}
		$papers = $this->Upload->Paper->find('list');
		$this->set(compact('papers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Upload', true));
			$this->redirect(array('action'=>'index'));
                }
                $file = $this->Upload->find('first', array('Upload.id' => $id));
		if ($this->FileUpload->removeFile($file['Upload']['name'])) {
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
