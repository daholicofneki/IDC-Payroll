<div class="container">
	<div class="span-6">
		<ul class="nq_menu-left">
		    <li>
			<h3 class="group">Personal Data</h3>
			<ul>
			    <li>
				<?php echo anchor('employee/add_new_employee','Add New Employee','class="vcard-add"')?>
			    </li>
			    <li class="current">
				<?php echo anchor('employee/index','Employee Data','class="vcard"')?>
			    </li>
			</ul>
		    </li>
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