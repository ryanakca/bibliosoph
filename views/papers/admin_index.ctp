<div class="papers index">
<h2><?php __('Papers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('tr-id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('published_on');?></th>
	<th><?php echo $paginator->sort('updated');?></th>
	<th>PDF</th>
	<th>PS</th>
        <th><?php echo $paginator->sort('pages');?></th>
        <th><?php echo $paginator->sort('display');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($papers as $paper):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $paper['Paper']['id']; ?>
		</td>
		<td>
			<?php echo $paper['Paper']['tr-id']; ?>
		</td>
		<td>
			<?php echo $paper['Paper']['title']; ?>
		</td>
		<td>
			<?php echo $paper['Paper']['published_on']; ?>
		</td>
		<td>
			<?php echo $paper['Paper']['updated']; ?>
		</td>
                <td>
                        <?php if (strlen($paper['Pdf']['name'])) {
                            echo $html->link('PDF',
                                $html->webroot.'files/'.$paper['Pdf']['name']).'
                                ('.round($paper['Pdf']['size'] / 1024).' KB)';
                        } else {
                            echo "No PDF available";
                        } ?>
                </td>
                <td>
                        <?php if (strlen($paper['Ps']['name'])) {
                            echo $html->link('PS',
                                $html->webroot.'files/'.$paper['Ps']['name']).'
                                ('.round($paper['Ps']['size'] / 1024).' KB)';
                        } else {
                            echo "No PS available";
                        } ?>
                </td>
                <td>
                        <?php echo $paper['Paper']['pages']; ?>
                </td>
                <td>
                        <?php if ($paper['Paper']['display'] == 1) {
                            echo 'True';
                        } else {
                            echo 'False';
                        } ?>
                </td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $paper['Paper']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $paper['Paper']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $paper['Paper']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paper['Paper']['id'])); ?>
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
