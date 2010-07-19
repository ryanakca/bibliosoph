<div class="uploads form">
<?php echo $form->create('Upload', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Add Upload');?></legend>
	<?php
                echo $form->input('paper_id', array('label' => 'Techreport ID'));
		echo $fileUpload->input();
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $this->element('admin_bar'); ?>
