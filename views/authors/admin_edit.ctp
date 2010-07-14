<div class="authors form">
<?php echo $form->create('Author');?>
	<fieldset>
 		<legend><?php __('Edit Author');?></legend>
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
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Author.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Author.id'))); ?></li>
	</ul>
</div>
<?php echo $this->element('admin_bar'); ?>
