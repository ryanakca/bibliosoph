<div class="papers index">
<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<h2><?php __('Papers');?></h2>
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
			<?php echo $paper['Paper']['tr-id']; ?>
		</td>
		<td>
			<?php echo $paper['Paper']['title']; ?>
		</td>
		<td>
			<?php echo date('F Y',
                        strtotime($paper['Paper']['published_on'])); ?>
		</td>
		<td>
                        <?php if (strlen($paper['Paper']['pdf'])) {
                            echo $html->link('PDF', $paper['Paper']['pdf']);
                        } else {
                            echo "No PDF available";
                        } ?>
		</td>
                <td>
                        <?php if (strlen($paper['Paper']['ps'])) {
                            echo $html->link('PS', $paper['Paper']['ps']);
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
                        '/authors/view/'.$alias['author_id']) ?></li>
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
