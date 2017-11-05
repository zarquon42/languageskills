<?php
include('init.php');
include('functions.php');
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>language skills</title>	
	<link rel="stylesheet" type="text/css" href="style.css" title="Basic" />
</head>
<body>
	<?php include('header.php'); ?>
	<div id="menu"></div>
	<div id="content">
		<?php if (isset($main)) include($main.'.php'); ?>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>