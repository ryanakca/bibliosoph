<?php
class UploadsController extends AppController {

	var $name = 'Uploads';
	var $helpers = array('Html', 'Form');
	var $components = array('Auth', 'FileUpload.FileUpload');

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
                        /* We don't want to upload a new PDF for the paper if we already have 
                         * one. */
                        if (($this->FileUpload->uploadedFile['type'] == 'application/pdf') && isset($paper['Paper']['pdf_id'])) {
                                $this->Session->setFlash(__('This paper already has a PDF, please delete it first.', true));
                                $this->redirect(array('action'=>'index'));
                        /* Same with PS */
                        } elseif ((in_array($this->FileUpload->uploadedFile['type'], 
                                    array('application/postscript', 'application/ps')) && isset($paper['Paper']['ps_id']))) {
                                $this->Session->setFlash(__('This paper already has a PS, please delete it first.', true));
                                $this->redirect(array('action'=>'index'));
                        } else {
                                $this->FileUpload->fileName = $paper['Paper']['tr-id']. '.' . $this->FileUpload->_ext();
                                $this->FileUpload->processFile();
                                if ($this->FileUpload->uploadedFile['type'] == 'application/pdf') {
                                    $paper['Paper']['pdf_id'] = $this->FileUpload->uploadId;
                                } else {
                                    $paper['Paper']['ps_id'] = $this->FileUpload->uploadId;
                                }
                                if ($this->FileUpload->success && $this->Upload->Paper->save($paper)) {
                                        $this->Session->setFlash(__('The file has been uploaded.', true));
                                        $this->redirect(array('action'=>'index'));
                                } else {
                                        $this->Session->setFlash($this->FileUpload->showErrors());
                                }
                        }
		}
		$papers = $this->Upload->Paper->fetchAndSortByTrID();
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
                if ($file['Upload']['type'] == 'application/pdf') {
                    $paper = $this->Upload->Paper->find('first', array('Paper.pdf_id' => $id));
                    unset($paper['Paper']['pdf_id']);
                } else {
                    $paper = $this->Upload->Paper->find('first', array('Paper.ps_id' => $id));
                    unset($paper['Paper']['ps_id']);
                }
		if ($this->FileUpload->removeFile($file['Upload']['name'])) {
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
