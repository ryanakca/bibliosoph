<div class="papers view">
<h2><?php  __('Paper');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TR-id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['tr-id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published in'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo date('F Y',
                            strtotime($paper['Paper']['published_on'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PDF'); ?></dt>
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
		</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pages'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paper['Paper']['pages']; ?>
                        &nbsp;
                </dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Authors');?></dt>
                <dd>
                    <ul>
                        <?php foreach ($paper['Alias'] as $alias): ?>
                        <li><?php echo $html->link($alias['name'],
                        array('controller'=>'authors', 'action'=>'view', $alias['author_id'])); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </dd>
	</dl>
</div>
