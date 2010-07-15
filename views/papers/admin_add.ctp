<?php
// CSS for multiselector
$html->css('ui.multiselect', null, null, false);
// JS for multiselector

$javascript->link(array('jquery-1.4.2.min', 'jquery-ui-1.8.custom.min', 
    'plugins/localisation/jquery.localisation-min', 
    'plugins/tmpl/jquery.tmpl.1.1.1', 
    'plugins/blockUI/jquery.blockUI', 'ui.multiselect'), false);
?>
<div class="papers form">
<?php echo $form->create('Paper');?>
	<fieldset>
 		<legend><?php __('Add Paper');?></legend>
	<?php
		echo $form->input('tr-id');
		echo $form->input('title');
		echo $form->input('published_on', array('dateFormat' => 'DMY',
                    'timeFormat' => 'none', 'minYear'=>1970,
                    'maxYear'=>date('Y')));
                echo $form->input('pages');
                echo $form->input('Alias', array('type' => 'select', 'multiple'
                    => true, 'label' => 'Author(s)'));
                echo $form->input('display');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $this->element('admin_bar'); ?>
