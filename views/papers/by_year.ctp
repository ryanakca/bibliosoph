<div class="papers index">
<h2><?php __('Papers');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>Techreport ID</th>
	<th>Title</th>
	<th>Published in</th>
	<th>PDF</th>
	<th>PS</th>
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
                        <?php echo $paper['Alias'] ?>
                </td>
	</tr>
<?php endforeach; ?>
</table>
</div>
</div>
