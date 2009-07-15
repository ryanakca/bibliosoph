<div class="aliases form">
<?php echo $form->create('Alias');?>
	<fieldset>
 		<legend><?php __('Edit Alias');?></legend>
	<?php
		echo $form->input('first_name');
		echo $form->input('initial');
		echo $form->input('last_name');
		echo $form->input('id');
		echo $form->input('author_id');
		echo $form->input('Paper');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Alias.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Alias.id'))); ?></li>
		<li><?php echo $html->link(__('List Aliases', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Authors', true), array('controller'=> 'authors', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Author', true), array('controller'=> 'authors', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Papers', true), array('controller'=> 'papers', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Paper', true), array('controller'=> 'papers', 'action'=>'add')); ?> </li>
	</ul>
</div>
