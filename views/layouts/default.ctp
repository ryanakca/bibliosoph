<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?php echo $title_for_layout ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $html->webroot ?>css/techreport.css" media="screen" />
</head>
<body>
<div id="header">
<h1 id="institution">YOUR INSTITUTION NAME</h1>
<!-- Insert your header here -->
</div>
<div id="content">
<?php echo $content_for_layout ?>
</div>
<div id="footer">
<!-- Insert your footer here -->
<div id="legal">
<p>Bibliosoph is Copyright &copy; 2009 Ryan Kavanagh and is distributed under
the terms of the GNU Affero General Public License version 3, or (at your
option) any later version. See this page <?php echo $html->link('for more
details', array('controller'=>'pages', 'action'=>'copyright'))?>.</p>
</div>
</div>
</body>
</html>
