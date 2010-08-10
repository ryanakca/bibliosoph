<?php
class UploadsController extends AppController {

	var $name = 'Uploads';
	var $helpers = array('Html', 'Form', 'FileUpload.FileUpload');
	var $components = array('Auth', 'FileUpload.FileUpload');

	function beforeFilter() {
		parent::beforeFilter();
		$this->FileUpload->automatic(false);
		$this->FileUpload->allowedTypes(array('pdf' => array('application/pdf'),
                                        'ps' => array('application/ps', 'application/postscript')));
	}

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
                        $paper = $this->Upload->Paper->read(null, $this->data['Paper']['paper_id']);
                        // Modify file object in place.
                        foreach ($this->FileUpload->uploadedFiles as &$file) {
                            /* We don't want to upload a new PDF for the paper
                             * if we already have one. If we don't have a PDF
                             * for the paper, set its filename to tr-id.pdf  */
                            if (($file['file']['type'] == 'application/pdf')) {
                                if (isset($paper['Paper']['pdf_id'])) {
                                    $this->Session->setFlash(__('This paper already has a PDF, please delete it first.', true));
                                    $this->redirect(array('action'=>'index'));
                                } else {
                                    $file['file']['name'] = $paper['Paper']['tr-id'] . '.pdf';
                                }
                            /* Same with PS */
                            } elseif (in_array($file['file']['type'], array('application/postscript', 'application/ps'))) {
                                if (isset($paper['Paper']['ps_id'])) {
                                    $this->Session->setFlash(__('This paper already has a PS, please delete it first.', true));
                                    $this->redirect(array('action'=>'index'));
                                } else {
                                    $file['file']['name'] = $paper['Paper']['tr-id'] . '.ps';
                                }
                            }
                        }
                        unset($file); // We need to unset file because we were modifying it in place.
                        /* It would be nice to be able to set the uploadId in
                            * the above loop, but this can't be done until
                            * processAllFiles(); is called. */
                        $this->FileUpload->processAllFiles();
                        foreach ($this->FileUpload->uploadIds as $uploadId) {
                            $upload = $this->Upload->read(null, $uploadId);
                            $upload['Upload']['paper_id'] = $paper['Paper']['id'];
                            $this->Upload->save($upload);
                        }
                        if ($this->FileUpload->success) {
                                $this->Session->setFlash(__('The file has been uploaded.', true));
                                $this->redirect(array('action'=>'index'));
                        } else {
                                $this->Session->setFlash($this->FileUpload->showErrors());
                        }
		}
		$papers = $this->Upload->Paper->fetchAndSortByReverseTrID();
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
		if ($this->FileUpload->removeFileById($id) && $this->Upload->delete($id)) {
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('An error occured while deleting the Upload', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
