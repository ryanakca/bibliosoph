<div class="papers form">
<?php echo $form->create('Paper');?>
	<fieldset>
 		<legend><?php __('Add Paper');?></legend>
	<?php
		echo $form->input('tr-id');
		echo $form->input('title');
		echo $form->input('published_on');
		echo $form->input('update_on');
		echo $form->input('pdf');
		echo $form->input('ps');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Papers', true), array('action'=>'index'));?></li>
	</ul>
</div>
