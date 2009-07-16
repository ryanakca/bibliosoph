<div class="aliases view">
<h2><?php  __('Alias');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Author Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['author_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Alias', true), array('action'=>'edit', $alias['Alias']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Alias', true), array('action'=>'delete', $alias['Alias']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $alias['Alias']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Aliases', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Alias', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
