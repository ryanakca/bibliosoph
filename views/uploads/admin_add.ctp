<div class="uploads form">
<?php echo $form->create('Upload', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Add Upload');?></legend>
	<?php
                echo $form->input('paper_id', array('label' => 'Techreport ID'));
		echo $form->input('file', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Uploads', true), array('action'=>'index'));?></li>
	</ul>
</div>
