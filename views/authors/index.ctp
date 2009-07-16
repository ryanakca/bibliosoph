<div class="authors index">
<h2><?php __('Authors');?></h2>
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
	<th><?php echo $paginator->sort('homepage');?></th>
	<th><?php echo $paginator->sort('updated_on');?></th>
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
			<?php echo $author['Author']['email']; ?>
		</td>
		<td>
			<?php echo $author['Author']['homepage']; ?>
		</td>
		<td>
			<?php echo $author['Author']['updated_on']; ?>
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
