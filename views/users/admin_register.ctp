<?php
    $session->flash('auth');
    echo $form->create('User', array('action' => 'register'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->input('password_confirm', array('type'=>'password'));
    echo $form->end('Login');
?>
