<div class="aliases form">
<?php echo $form->create('Alias');?>
	<fieldset>
 		<legend><?php __('Edit Alias');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('id');
		echo $form->input('author_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Alias.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Alias.id'))); ?></li>
		<li><?php echo $html->link(__('List Aliases', true), array('action'=>'index'));?></li>
	</ul>
</div>
