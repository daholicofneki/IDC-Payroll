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
	<div class="span-6">
		<ul class="nq_menu-left">
		    <li>
			<h3 class="group">Personal Data</h3>
			<ul>
			    <li>
				<?php echo anchor('employee/employee/add_new_employee','Add New Employee')?>
			    </li>
			    <li class="current">
				<?php echo anchor('employee/employee/index','Employee Data')?>
			    </li>
			</ul>
		    </li>
		    <?php if ($module == 'employee'):?>
		    <li>
			<h3 class="group">Job History</h3>
			<ul>
			    <li>
				<?php echo anchor('employee/job_history/add_new_job','Add New Job')?>
			    </li>
			    <li>
				<?php echo anchor('employee/job_history/index','List')?>
			    </li>
			</ul>
		    </li>
		    <?php endif?>
		    <li>
			<h3 class="group">Work History</h3>
			<ul>
			    <li>
				<a title="Add new Employee" href="#">Add New</a>
			    </li>
			    <li>
				<a title="List Employee" href="#">List</a>
			    </li>
			    <li>
				<a title="Record History" href="#">Record</a>
			    </li>
			</ul>
		    </li>
		</ul>
	</div>
	<div class="span-18 last">
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