<?php
class PagesController extends AppController {

        var $name = 'Pages';
        var $uses = array('Paper');

        function index() {
            $this->pageTitle = 'Technical Reports Home';
            $this->Paper->recursive = 1;
            $this->set('papers', $this->Paper->find('list', array('fields'=>array('id', 'published_on'))));
        }
}
?>
