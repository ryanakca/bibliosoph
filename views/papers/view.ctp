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
                                $html->webroot.'files/'.$paper['Pdf']['name']).'
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
                                $html->webroot.'files/'.$paper['Ps']['name']).'
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
                <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('BibTex entry'); ?></dt>
                <dd>
                <pre class="bibtex">
<?php $authors = "";
    foreach ($paper['Alias'] as $alias):
        if ($alias != end($paper['Alias'])) {
            $authors .= $alias['name'] . " and ";
        } else {
            $authors .= $alias['name'];
        }
    endforeach;

    $url = "http";
    if (array_key_exists("HTTPS", $_SERVER)) {
        $url .= "s";
    }
    $url .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    if ($paper['Paper']['pages'] != 0) {
        $pages = $paper['Paper']['pages'];
    } else {
        $pages = '';
    }

echo '' .
"@TECHREPORT{" . $paper['Paper']['tr-id'] . ',
    author = "' . $authors . '",
    title = {' . $paper['Paper']['title'] . '},
    number = {' . $paper['Paper']['tr-id'] . '},
    institution = {' . Configure::read('BibliosophSettings.Institution') . '},
    address = {' . Configure::read('BibliosophSettings.Address') . '},
    month = "' . date('F', strtotime($paper['Paper']['published_on'])) . '",
    year = "' . date('Y', strtotime($paper['Paper']['published_on'])) . '",
    pages = {' . $pages . '},
    url = "' . $url . '"
}';

?>
                </pre>
                </dd>
	</dl>
</div>
