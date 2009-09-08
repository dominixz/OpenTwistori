<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title>ทวิตโทริ</title>
	<base href="<?=base_url()?>"/>
	<link href="public/css/main.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="public/javascript/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="public/javascript/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript" src="public/javascript/jquery.serialScroll-1.2.2-min.js"></script>
	<script type="text/javascript" src="public/javascript/jquery.timers.js"></script>
	<script type="text/javascript" src="public/javascript/twistori.js"></script>
</head>
<body>
<div id="sidebar">
<?php foreach($words as $word): ?>
	<h2 id="word-id-<?=$word->id?>" title="<?=$word->id?>" style="color:<?=$word->color?>"><?=$word->title?></h2>
<?php endforeach; ?>
</div>
<ul id="tweets">
	<li></li>
</ul>
</body>
</html>