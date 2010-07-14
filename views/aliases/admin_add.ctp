<div class="aliases form">
<?php echo $form->create('Alias');?>
	<fieldset>
 		<legend><?php __('Add Alias');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('author_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $this->element('admin_bar'); ?>
