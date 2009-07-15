<h1>Papers</h1>
<?php print_r($papers) ?>
<dl>
<?php foreach ($papers as $paper): ?>
<dt><strong><?php echo $paper['Paper']['tr-id']; ?></strong><?php if (strlen($paper['Paper']['pdf']) && strlen($paper['Paper']['pdf']))
{
    echo "available in <a href=\"".$paper['Paper']['pdf']."\">PDF</a> and <a href=\"".$paper ['Paper']['ps']."\">PS</a>.";
}
elseif (strlen($paper['Paper']['pdf']))
{
    echo 'available in <a href=\"'.$paper['Paper']['pdf'].'\">PDF</a>.';
}
elseif (strlen($paper['Paper']['ps']))
{
    echo 'available in <a href=\"'.$paper['Paper']['ps'].'\">PS</a>';
}
else
{
    echo 'unavailable for download.';
}
?>
</dt>
<dd>"<?php echo $paper['Paper']['title'] ?>", by </dd>
<?php endforeach; ?>
</dl>
