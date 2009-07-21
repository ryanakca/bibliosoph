<div class="pages index">
<h2>Technical Report Meta-Index</h2>
You can search technical reports:
<ul>
<li> by year: <?php
$years = array();
foreach ($papers as $paper):
    $year = date('Y', strtotime($paper));
    if (!in_array($year, $years)) {
        $years[$year] = $html->link($year, array('controller'=>'papers', 'action'=>'by_year', $year));
    }
endforeach;
sort($years);
foreach ($years as $year):
    if ($year != end($years)) {
        print $year . ', ';
    } else {
        print $year . ';';
    }
endforeach;
?></li>
<li> by <?php echo $html->link('author', array('action'=>'index',
    'controller'=>'authors')); ?>;</li>
    <li> by browsing through <?php echo $html->link('all',
        array('controller'=>'papers', 'action'=>'index')); ?> of our papers.</li>
</ul>
</div>
