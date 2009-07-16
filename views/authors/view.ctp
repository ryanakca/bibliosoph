<div class="authors view">
<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<h2><?php  __('Author');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['last_name'].',
                        '.$author['Author']['first_name'].'
                        '.$author['Author']['initial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($author['Author']['email'],
                            'mailto:'.$author['Author']['email']); ?>
&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Homepage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link('Website',
                        $author['Author']['homepage']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
<?php if (!empty($papers)):?>
	<h3><?php __('Related Papers');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo $paginator->sort('Techreport ID', 'tr-id'); ?></th>
                <th><?php echo $paginator->sort('Title', 'title') ?></th>
                <th><?php echo $paginator->sort('Published in', 'published_on') ?></th>
                <th>PDF</th>
                <th>PS</th>
                <th><?php echo $paginator->sort('Pages', 'pages') ?></th>
	</tr>
	<?php
		$i = 0;
                foreach ($papers as $paper):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr>
                <td><?php echo $html->link($paper['Paper']['tr-id'], '/papers/view/'.$paper['Paper']['tr-id']); ?></td>
                <td><?php echo $paper['Paper']['title']; ?></td>
                <td>
                    <?php echo date('F Y',
                    strtotime($paper['Paper']['published_on'])); ?>
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
                <td><?php echo $paper['Paper']['pages'] ?></td>
                </tr>
        <?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
