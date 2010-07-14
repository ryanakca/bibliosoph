<div class="uploads index">
<h2><?php __('Uploads');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('size');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('paper_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($uploads as $upload):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $upload['Upload']['id']; ?>
		</td>
		<td>
			<?php echo $upload['Upload']['name']; ?>
		</td>
		<td>
			<?php echo $upload['Upload']['type']; ?>
		</td>
		<td>
			<?php echo $upload['Upload']['size']; ?>
		</td>
		<td>
			<?php echo $upload['Upload']['created']; ?>
		</td>
		<td>
			<?php echo $upload['Upload']['modified']; ?>
		</td>
		<td>
			<?php echo $upload['Paper']['tr-id']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $upload['Upload']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $upload['Upload']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $upload['Upload']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $upload['Upload']['id'])); ?>
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
<?php echo $this->element('admin_bar'); ?>
