View techreports by year: <?php
$years = array();
foreach ($papers as $paper):
    $year = date('Y', strtotime($paper));
    if (!in_array($year, $years)) {
        $years[$year] = $html->link($year, array('action'=>'by_year', $year));
    }
endforeach;
sort($years);
foreach ($years as $year):
    if ($year != end($years)) {
        print $year . ', ';
    } else {
        print $year . '.';
    }
endforeach;
?>
