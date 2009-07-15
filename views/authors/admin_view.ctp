<div class="authors view">
<h2><?php  __('Author');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Initial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['initial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Homepage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['homepage']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated On'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $author['Author']['updated_on']; ?>
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
		<th><?php __('First Name'); ?></th>
		<th><?php __('Initial'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Id'); ?></th>
		<th><?php __('Author Id'); ?></th>
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
			<td><?php echo $alias['first_name'];?></td>
			<td><?php echo $alias['initial'];?></td>
			<td><?php echo $alias['last_name'];?></td>
			<td><?php echo $alias['id'];?></td>
			<td><?php echo $alias['author_id'];?></td>
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
