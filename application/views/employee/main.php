<h2 id="method">Employee Data and Information</h2> 
<div>
	<?php echo form_input('search','','class="small right" size="40" placeholder="Search Employee and Hit enter"')?>
</div>
<p>
	<table>
		<thead>
			<tr>
				<th>NIP</th>
				<th>Name</th>
				<th>Age</th>
				<th>Sex / Marital</th>
				<th>Phone</th>
				<th>Action</th>
				<th>Job and Sall</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($data):?>
			<?php foreach ($data as $item):?>
			<tr>
				<td><?php echo $item->emp_idx?></td>
				<td><?php echo anchor($module.'/edit_employee/'.$item->emp_idx,$item->emp_name)?></td>
				<td><?php echo $item->emp_dob?></td>
				<td><?php echo $item->emp_sex.' / '.$item->emp_marital_status?></td>
				<td><?php echo $item->emp_phone?></td>
				<td><?php echo anchor($module.'/delete_employee/'.$item->emp_idx,'Delete')?></td>
				<td><?php echo anchor('job_sallary/index/'.$item->emp_idx,'Info')?></td>
			</tr>
			<?php endforeach;?>
			<?php else:?>
			<tr>
				<td colspan="7"> There is nothing </td>
			</tr>
			<?php endif;?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="7">
					<div class="pagination">
						Page 1 of 6 
						<a href="">Next</a>
						<a href="">1</a> <a href="">2</a> <a href="">3</a> <a href="">4</a> <a href="">6</a>
						<a href="">Prev</a>
					</div>
				</th>
			</tr>
		</tfoot>
	</table>
</p>