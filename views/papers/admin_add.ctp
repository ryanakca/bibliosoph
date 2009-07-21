<div class="papers form">
<?php echo $form->create('Paper');?>
	<fieldset>
 		<legend><?php __('Add Paper');?></legend>
	<?php
		echo $form->input('tr-id');
		echo $form->input('title');
		echo $form->input('published_on', array('dateFormat' => 'DMY',
                    'timeFormat' => 'none', 'minYear'=>1950,
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
		<li><?php echo $html->link(__('List Papers', true), array('action'=>'index'));?></li>
	</ul>
</div>
