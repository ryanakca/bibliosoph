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
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Aliases', true), array('action'=>'index'));?></li>
	</ul>
</div>
