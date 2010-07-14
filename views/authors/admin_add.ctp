<div class="authors form">
<?php echo $form->create('Author');?>
	<fieldset>
 		<legend><?php __('Add Author');?></legend>
	<?php
		echo $form->input('first_name');
		echo $form->input('initial');
		echo $form->input('last_name');
		echo $form->input('email');
		echo $form->input('homepage');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $this->element('admin_bar'); ?>
