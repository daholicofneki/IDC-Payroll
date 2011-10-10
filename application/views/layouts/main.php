<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<?php echo $meta_tags; ?>
	<title><?php echo $title; ?></title>
	<?php echo $stylesheets; ?>
	<?php echo $javascripts; ?>
</head>
<body>
<?php
require_once("template/header.php");
require_once("template/navbar.php");
require_once("template/tpl_1_3.php");
require_once("template/footer.php");
?>
</body>
</html>