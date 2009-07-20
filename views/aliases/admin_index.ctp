<div class="aliases index">
<h2><?php __('Aliases');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('author_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($aliases as $alias):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $alias['Alias']['id']; ?>
		</td>
		<td>
			<?php echo $alias['Alias']['name']; ?>
		</td>
		<td>
			<?php echo $html->link($alias['Author']['last_name'].', '.$alias['Author']['first_name'].'
                        '.$alias['Author']['initial'],
                        array('controller'=>'authors', 'action'=>'view',
                            $alias['Author']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $alias['Alias']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $alias['Alias']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $alias['Alias']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $alias['Alias']['id'])); ?>
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
		<li><?php echo $html->link(__('New Alias', true), array('action'=>'add')); ?></li>
	</ul>
</div>
