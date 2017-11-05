<?php
include 'inc/init.php';
include('inc/functions.php');
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>language skills</title>	
	<link rel="stylesheet" type="text/css" href="css/style.css" title="Basic" />
</head>
<body>
	<?php include 'inc/header.php'; ?>
	<div id="menu"></div>
	<div id="content">
		<?php if (isset($main)) include 'inc/'.$main.'.php'; ?>
	</div>
	<?php include 'inc/footer.php'; ?>
</body>
</html>