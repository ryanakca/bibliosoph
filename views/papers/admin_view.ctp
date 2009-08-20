<div class="papers view">
<h2><?php  __('Paper');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tr-id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['tr-id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published On'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['published_on']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated On'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pdf'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php if ($paper['Pdf']['name']) {
                            echo $html->link('PDF',
                                $html->webroot().'files/'.$paper['Pdf']['name']).'
                                ('.round($paper['Pdf']['size'] / 1024).' KB)';
                        } else {
                            echo "No PDF available";
                        } ?>
                        &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PS'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php if ($paper['Ps']['name']) {
                            echo $html->link('PS',
                                $html->webroot().'files/'.$paper['Ps']['name']).'
                                ('.round($paper['Ps']['size'] / 1024).' KB)';
                        } else {
                            echo "No PS available";
                        } ?>
                        &nbsp;
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Paper', true), array('action'=>'edit', $paper['Paper']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Paper', true), array('action'=>'delete', $paper['Paper']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paper['Paper']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Papers', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Paper', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
