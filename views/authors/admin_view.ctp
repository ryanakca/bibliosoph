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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated On'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Author', true), array('action'=>'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Author', true), array('action'=>'delete', $author['Author']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $author['Author']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Authors', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Author', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Aliases', true), array('controller'=> 'aliases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Alias', true), array('controller'=> 'aliases', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Aliases');?></h3>
	<?php if (!empty($author['Alias'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($author['Alias'] as $alias):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $alias['id'];?></td>
			<td><?php echo $html->link($alias['name'], array('action'=>'view', 'controller'=>'aliases', $alias['id']));?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'aliases', 'action'=>'view', $alias['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'aliases', 'action'=>'edit', $alias['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'aliases', 'action'=>'delete', $alias['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $alias['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Alias', true), array('controller'=> 'aliases', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
