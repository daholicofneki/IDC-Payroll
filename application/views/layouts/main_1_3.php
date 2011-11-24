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
			<li><?php echo anchor('regulation/setup','Regulation')?></li>
			<li><a href="#">Sallary</a></li>
			<li><a href="#">Time &amp; Absence</a></li>
			<li><?php echo anchor('employee/employee','Employee')?></li>
		    </ul>
		</div>
        </div>
</header>
<div class="container">
	<div class="span-6">
		<ul class="nq_menu-left">
		    <li>
			<h3 class="group">Data Personal</h3>
			<ul>
			    <li>
				<?php echo anchor('employee/employee/add_new_employee','Tambah Pegawai')?>
			    </li>
			    <li class="current">
				<?php echo anchor('employee/employee/index','Daftar')?>
			    </li>
			</ul>
		    </li>
		    <li>
			<h3 class="group">Riwayat Pekerjaan</h3>
			<ul>
			    <li>
				<?php echo anchor('employee/job_history_add','Tambah Pekerjaan')?>
			    </li>
			    <li>
				<?php echo anchor('employee/job_history','Daftar')?>
			    </li>
			</ul>
		    </li>
		    
		    <li>
			<h3 class="group">Peraturan Pemerintah</h3>
			<ul>
			    <li>
				<?php echo anchor('regulation/setup/pemerintah','Pemerintah')?>
			    </li>
			</ul>
		    </li>
		    <li>
			<h3 class="group">Peraturan Perusahaan</h3>
			<ul>
			    <li>
				<?php echo anchor('regulation/setup/perusahaan#umum','Umum')?>
			    </li>
			    <li>
				<?php echo anchor('regulation/setup/perusahaan#staff','Staff')?>
			    </li>
			    <li>
				<?php echo anchor('regulation/setup/perusahaan#supir','Supir')?>
			    </li>
			    <li>
				<?php echo anchor('regulation/setup/perusahaan#spg','SPG')?>
			    </li>
			</ul>
		    </li>
		</ul>
	</div>
	<div class="span-18 last">
		<div class="nq_breadcumb"><?php echo $breadcrumbs?></div>
		<?php echo $content; ?>
	</div>
	<hr class="space">
</div>
<footer>
	<div class="container">
		<div class="span-24 last">
			@2011 PT. Samudia Bahtera
		</div>
	</div>	
</footer>

<script type="text/javascript" src="<?php echo base_url()?>static/js/thickbox.js"></script>
<link href="<?php echo base_url()?>static/css/thickbox.css" rel='stylesheet' type='text/css' />
</body>
</html>