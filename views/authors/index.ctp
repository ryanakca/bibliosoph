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
        <th><?php echo $paginator->sort('Name'/*'Last name'*/, 'last_name')/*.',&nbsp;'.$paginator->sort('First name',
            'first_name').' '.$paginator->sort('Initial', 'initial')*/;?></th>
	<th><?php echo $paginator->sort('email');?></th>
        <th><?php __('Homepage'); ?></th>
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
			<?php echo $html->link($author['Author']['last_name'].',
                        '.$author['Author']['first_name'].'
                        '.$author['Author']['initial'],
                        '/authors/view/'.$author['Author']['id']); ?>
		</td>
		<td>
			<?php echo $html->link($author['Author']['email'],
                        'mailto:'.$author['Author']['email']) ?>
		</td>
		<td>
			<?php echo $html->link('Homepage', $author['Author']['homepage']); ?>
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
