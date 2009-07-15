<?php
class PapersController extends AppController
{
    var $name = 'Papers';
    function index () {
        $this->set('papers', $this->Paper->find('all'));
    }
}
?>
