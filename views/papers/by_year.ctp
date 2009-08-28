<div class="papers index">
<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<h2><?php __('Papers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $paginator->sort('Techreport ID', 'tr-id') ?></th>
        <th><?php echo $paginator->sort('Title', 'title') ?></th>
        <th><?php echo $paginator->sort('Published in', 'published_on') ?></th>
	<th>PDF</th>
	<th>PS</th>
        <th><?php echo $paginator->sort('Pages', 'pages') ?></th>
        <th>Authors</th>
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
			<?php echo $html->link($paper['Paper']['tr-id'],
                        array('action'=>'view', $paper['Paper']['tr-id'])); ?>
		</td>
		<td>
			<?php echo $paper['Paper']['title']; ?>
		</td>
		<td>
			<?php echo date('F Y',
                        strtotime($paper['Paper']['published_on'])); ?>
		</td>
                <td>
                        <?php if ($paper['Pdf']['name']) {
                            echo $html->link('PDF',
                                $html->webroot.'files/'.$paper['Pdf']['name']).'
                                ('.round($paper['Pdf']['size'] / 1024).' KB)';
                        } else {
                            echo "No PDF available";
                        } ?>
                </td>
                <td>
                        <?php if ($paper['Ps']['name']) {
                            echo $html->link('PS',
                                $html->webroot.'files/'.$paper['Ps']['name']).'
                                ('.round($paper['Ps']['size'] / 1024).' KB)';
                        } else {
                            echo "No PS available";
                        } ?>
                </td>
		<td>
                        <?php echo $paper['Paper']['pages'] ?>
                </td>
                <td>
                        <?php if ($paper['Alias']): ?>
                        <ul>
                        <?php foreach ($paper['Alias'] as $alias): ?>
                        <li> <?php echo $html->link($alias['name'],
                        array('controller'=>'authors', 'action'=>'view', $alias['author_id'])) ?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                </td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging">
        <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
</div>
