<div class="papers form">
<?php echo $form->create('Paper');?>
	<fieldset>
 		<legend><?php __('Edit Paper');?></legend>
	<?php
                echo $form->input('tr-id');
                echo $form->input('title');
                echo $form->input('published_on', array('dateFormat'=>'DMY',
                    'timeFormat' => 'none', 'minYear'=>1970,
                    'maxYear'=>date('Y')));
                echo $form->input('pages');
                echo $form->input('Alias', array('type' => 'select', 'multiple'
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
