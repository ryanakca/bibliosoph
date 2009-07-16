<div class="authors view">
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
<?php if (!empty($author['Alias'])):?>
	<h3><?php __('Related Papers');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
                <th><?php __('Papers'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($author['Alias'] as $alias):
                    foreach ($alias['Paper'] as $paper):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr>
                <td><?php echo $paper['tr-id']; ?></td>
                <td><?php echo $paper['title']; ?></td>
                </tr>

        <?php        endforeach;
                endforeach;
         ?>
	</table>
<?php endif; ?>
</div>
