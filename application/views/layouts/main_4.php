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
<header>
	<div class="container">
		<div class="span-14">
			<a href="#"><h3>HR &amp; Payroll Management System</h3></a>
		</div>
		<div class="span-10 last nq_status">
			Sign in as <a href="#">daholicofneki</a> | <a href="#">Sign Out</a>
		</div>
		<div class="span-24 last navbar">        
		    <ul class="nq_menu-nav">
			<li><a href="#">Setup</a></li>
			<li><a href="#">Sallary</a></li>
			<li><a href="#">Time &amp; Absence</a></li>
			<li><a href="#">Employee</a></li>
		    </ul>
		</div>
        </div>
</header>
<div class="container">
	<div class="span-24 last">
		<div class="nq_breadcumb"><?php echo $breadcrumbs?></div>
		<?php echo $content; ?>
	</div>
</div>
<footer>
	<div class="container">
		<div class="span-24 last">
			@2011 PT. Samudia Bahtera
		</div>
	</div>	
</footer>
</body>
</html>