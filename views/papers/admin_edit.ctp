<div class="papers form">
<?php echo $form->create('Paper');?>
	<fieldset>
 		<legend><?php __('Edit Paper');?></legend>
	<?php
                echo $form->input('tr-id');
                echo $form->input('title');
                echo $form->input('published_on', array('dateFormat' => 'MY',
                    'timeFormat' => 'none'));
                echo $form->input('update_on');
                echo $form->input('pdf');
                echo $form->input('ps');
                echo $form->input('pages');
                echo $form->input('alias', array('type' => 'select', 'multiple'
                    => true, 'label' => 'Author(s)'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Paper.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Paper.id'))); ?></li>
		<li><?php echo $html->link(__('List Papers', true), array('action'=>'index'));?></li>
	</ul>
</div>
