<div class="authors index">
<h2><?php __('Authors');?></h2>
<div id="search">
<?php echo $form->create('Author', array('action'=>'search', 'admin'=>true)); ?>
    <fieldset>
        <legend><?php __('Find Author'); ?></legend>
        <?php
        echo $form->input('Search.last_name');
        echo $form->submit('Search');
        ?>
    </fieldset>
<?php echo $form->end(); ?>
</div>

<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('first_name');?></th>
	<th><?php echo $paginator->sort('initial');?></th>
	<th><?php echo $paginator->sort('last_name');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th>Homepage</th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($authors as $author):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $author['Author']['id']; ?>
		</td>
		<td>
			<?php echo $author['Author']['first_name']; ?>
		</td>
		<td>
			<?php echo $author['Author']['initial']; ?>
		</td>
		<td>
			<?php echo $author['Author']['last_name']; ?>
		</td>
		<td>
			<?php echo $html->link($author['Author']['email'],
                        'mailto:'.$author['Author']['email']); ?>
		</td>
		<td>
			<?php echo $html->link('Homepage',
                        $author['Author']['homepage']); ?>
		</td>
		<td>
			<?php echo $author['Author']['updated']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $author['Author']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $author['Author']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $author['Author']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $author['Author']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Author', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Aliases', true), array('controller'=> 'aliases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Alias', true), array('controller'=> 'aliases', 'action'=>'add')); ?> </li>
                <li><?php echo $html->link(__('Papers', true),
                    array('controller'=>'papers', 'action'=>'index')); ?></li>
                <li><?php echo $html->link(__('Uploads', true),
                    array('controller'=>'uploads', 'action'=>'index')); ?></li>
                <li><?php echo $html->link(__('Users', true),
                    array('controller'=>'users', 'action'=>'index')); ?></li>
                <li><?php echo $html->link(__('Logout', true),
                    array('controller'=>'users', 'action'=>'logout')); ?></li>
	</ul>
</div>
