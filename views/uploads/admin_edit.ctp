<div class="uploads form">
<?php echo $form->create('Upload');?>
	<fieldset>
 		<legend><?php __('Edit Upload');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('paper_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Upload.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Upload.id'))); ?></li>
	</ul>
</div>
<?php echo $this->element('admin_bar'); ?>
