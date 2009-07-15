<div class="aliases view">
<h2><?php  __('Alias');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Initial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['initial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $alias['Alias']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Author'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($alias['Author']['id'], array('controller'=> 'authors', 'action'=>'view', $alias['Author']['id'])); ?>
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
		<li><?php echo $html->link(__('List Authors', true), array('controller'=> 'authors', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Author', true), array('controller'=> 'authors', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Papers', true), array('controller'=> 'papers', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Paper', true), array('controller'=> 'papers', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Papers');?></h3>
	<?php if (!empty($alias['Paper'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tr-id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Published On'); ?></th>
		<th><?php __('Update On'); ?></th>
		<th><?php __('Pdf'); ?></th>
		<th><?php __('Ps'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($alias['Paper'] as $paper):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $paper['id'];?></td>
			<td><?php echo $paper['tr-id'];?></td>
			<td><?php echo $paper['title'];?></td>
			<td><?php echo $paper['published_on'];?></td>
			<td><?php echo $paper['update_on'];?></td>
			<td><?php echo $paper['pdf'];?></td>
			<td><?php echo $paper['ps'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'papers', 'action'=>'view', $paper['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'papers', 'action'=>'edit', $paper['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'papers', 'action'=>'delete', $paper['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paper['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Paper', true), array('controller'=> 'papers', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
