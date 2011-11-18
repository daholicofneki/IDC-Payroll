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
<?php echo $content; ?>
</body>
<script type="text/javascript" src="<?php echo base_url()?>static/js/thickbox.js"></script>
<link href='<?php echo base_url()?>static/css/thickbox.css' rel='stylesheet' type='text/css' />
</html>