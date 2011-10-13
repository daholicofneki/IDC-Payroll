<script src="<?php echo base_url()?>static/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#dob").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: '-100y',
			maxDate: '-15y',
			showAnim: 'fold'
		});
		$("#more_info").tabs();
		$("#formid").validate();
	});
</script>
<?php
// Explode data
$replace = array('{','}','"');
$var = array(@$data->pi_keluarga,@$data->pi_pendidikan_formal,@$data->pi_pendidikan_informal,@$data->pi_bahasa,@$data->pi_riwayat_pekerjaan);
for($i=0; $i<count($var); $i++) {
	$var[$i] = explode("},{", substr($var[$i],1,-1));
	for($j=0; $j<count($var[$i]);$j++) {
		$var[$i][$j] = explode(',',$var[$i][$j]);
		$var[$i][$j] = str_replace($replace, "", $var[$i][$j]);
	}
}
?>
<div id="more_info">
	<ul>
		<li><a href="#info-1">Personal</a></li>
		<li><a href="#info-2">Keluarga</a></li>
		<li><a href="#info-3">Formal</a></li>
		<li><a href="#info-4">Informal</a></li>
		<li><a href="#info-5">Bahasa</a></li>
		<li><a href="#info-6">Riwayat Pekerjaan</a></li>
	</ul>
	<div id="info-1">
	<?php echo form_open(uri_string(),array('id'=>'formid','class'=>'form'))?>
	<?php echo view_errors(); ?>
	<ul>
		<h3 id="method">Edit Data Pegawai</h3>
		<li>
			<?php echo form_label('NIK','', array('class'=>'description'))?>
			<?php echo form_input('pi_no',@$data->pi_no, 'size="8" readOnly')?> 
		</li>
		<li>
			<?php echo form_label('Nama, Nickname','', array('class'=>'description'))?>
			<?php echo form_input('pi_nama_lengkap',@$data->pi_nama_lengkap, 'size="40" class="required"')?>, &nbsp;
			<?php echo form_input('pi_nama_kecil',@$data->pi_nama_kecil, 'size="20" class="required"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_jenis_kelamin,'', array('class'=>'description'))?>
			<?php echo form_dropdown('pi_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'),(@$data->pi_jenis_kelamin=='')?'L':@$data->pi_jenis_kelamin,'class="required"') ?>
		</li>
		<li>
			<?php echo form_label('Tempat, Tanggal Lahir','', array('class'=>'description', 'size'=>'32'))?>
			<?php echo form_input('pi_tempat_lahir',@$data->pi_tempat_lahir, 'size="32" placeholder="Tempat Lahir" class="required"')?>, 
			<?php echo form_input('pi_tanggal_lahir',@$data->pi_tanggal_lahir,' size="12" id="dob" placeholder="yyyy/mm/dd" class="required datepicker"')?>
		</li>
		<li>
			<?php echo form_label('No Telepon','', array('class'=>'description'))?>
			<?php echo form_input('pi_no_telepon1',@$data->pi_no_telepon1, 'size="24" placeholder="Masukkan no telepon" onkeyup="validate(this, \'num\')" class="required number"')?>, &nbsp;
			<?php echo form_input('pi_no_telepon2',@$data->pi_no_telepon2, 'size="24" placeholder="Masukkan no telepon" onkeyup="validate(this, \'num\')"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_email,'', array('class'=>'description'))?>
			<?php echo form_input('pi_email',@$data->pi_email, 'size="32" placeholder="contoh : name@name.com" class="required email"')?>
		</li>
		<li>
			<?php echo form_label('Alamat','', array('class'=>'description'))?>
			<textarea cols="50" rows="3" name="pi_alamat" class="required"><?php echo @$data->pi_alamat?></textarea>
		</li>
		<li>
			<?php echo form_label('Status Pernikahan','', array('class'=>'description'))?>
			<?php echo form_dropdown('pi_status_nikah',array ('L'=>'Lajang','M'=>'Menikah'),(@$data->pi_status_nikah=='')?'L':@$data->pi_status_nikah,'class="required"') ?>
		</li>
		<li>
			<?php echo form_label($labels->pi_jumlah_anak,'', array('class'=>'description'))?>
			<?php echo form_input('pi_jumlah_anak',(@$data->pi_jumlah_anak=='')?'0':@$data->pi_jumlah_anak, 'size="5" max="2" class="required number"')?>
		</li>
		<li>
			<?php echo form_label('Status Pajak, NPWP','', array('class'=>'description'))?>
			<?php echo form_dropdown('pi_status_pajak',array ('K0'=>'K0','TK0'=>'TK0','TK1'=>'TK1','TK2'=>'TK2'),(@$data->pi_status_pajak=='')?'K0':@$data->pi_status_pajak,'class="required"') ?> &nbsp;
			<?php echo form_input('pi_npwp',@$data->pi_npwp, 'size="24" class="required"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_kewarganegaraan,'', array('class'=>'description'))?>
			<?php echo form_input('pi_kewarganegaraan',@$data->pi_kewarganegaraan, 'size="24" class="required"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_suku,'', array('class'=>'description'))?>
			<?php echo form_input('pi_suku',@$data->pi_suku, 'size="24" class="required"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_no_ktp,'', array('class'=>'description'))?>
			<?php echo form_input('pi_no_ktp',@$data->pi_no_ktp, 'size="24" class="required"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_no_sim,'', array('class'=>'description'))?>
			<?php echo form_input('pi_no_sim',@$data->pi_no_sim, 'size="24"')?>
		</li>
		<li>
			<?php echo form_label($labels->pi_no_jamsostek,'', array('class'=>'description'))?>
			<?php echo form_input('pi_no_jamsostek',@$data->pi_no_jamsostek, 'size="24"')?>
		</li>
		<li>
			<?php echo form_label('Foto','', array('class'=>'description'))?>
			<?php echo form_input('pi_foto',@$data->pi_foto, 'style="width:70%"')?>
		</li>

		<li class="form_handle">
			<?php echo form_submit('save','Save Data Employee', 'class="awesome medium blue"')?>
			<?php echo anchor( 'employee/' . $module.'/index','Cancel Save', 'class="awesome medium red"')?>
		</li>

	</ul>
	<?php echo form_close()?>
	</div>
	<div id="info-2">
		<h3>Informasi Keluarga</h3>
		<table>
			<thead>
			<tr>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Umur</th>
				<th>Hubungan</th>
				<th>Pendidikan</th>
				<th>Pekerjaan</th>
				<th width="10px"><?php echo anchor('employee/employee/more_info?height=400&width=320&form=1','+', 'class="thickbox" title="Informasi Keluarga"')?></th>
			</tr>
			</thead>
			<tbody>
			<?php if($var[0][0][0]!='' && $var[0][0][1] != '') { for($i=0; $i<count($var[0]); $i++) { ?>
			<tr>
				<td><?php echo $var[0][$i][0]?></td>
				<td><?php echo $var[0][$i][1]?></td>
				<td><?php echo $var[0][$i][2]?></td>
				<td><?php echo $var[0][$i][3]?></td>
				<td><?php echo $var[0][$i][4]?></td>
				<td><?php echo $var[0][$i][5]?></td>
				<td>v</td>
			</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<div id="info-3">
		<h3 id="method">Informasi Pendidikan Formal</h3>
		<table>
			<thead>
			<tr>
				<th>Tingkat</th>
				<th>Nama Sekolah</th>
				<th>Tahun Lulus</th>
				<th>Jurusan</th>
				<th>Sertifikat</th>
				<th width="10px"><?php echo anchor('employee/employee/more_info?height=400&width=320&form=2','+', 'class="thickbox" title="Informasi Pendidikan Formal"')?></th>
			</tr>
			</thead>
			<tbody>
			<?php if($var[1][0][0]!='' && $var[1][0][1] != '') { for($i=0; $i<count($var[1]); $i++) { ?>
			<tr>
				<td><?php echo $var[1][$i][0]?></td>
				<td><?php echo $var[1][$i][1]?></td>
				<td><?php echo $var[1][$i][2]?></td>
				<td><?php echo $var[1][$i][3]?></td>
				<td><?php echo $var[1][$i][4]?></td>
				<td>v</td>
			</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<div id="info-4">
		<h3 id="method">Informasi Pendidikan Informal</h3>
		<table>
			<thead>
			<tr>
				<th>Jenis Kursus</th>
				<th>Lembaga</th>
				<th>Kualifikasi</th>
				<th>Tahun</th>
				<th width="10px"><?php echo anchor('employee/employee/more_info?height=400&width=320&form=3','+', 'class="thickbox" title="Informasi Pendidikan Informal"')?></th>
			</tr>
			</thead>
			<tbody>
			<?php if($var[2][0][0]!='' && $var[2][0][1] != '') { for($i=0; $i<count($var[2]); $i++) { ?>
			<tr>
				<td><?php echo $var[2][$i][0]?></td>
				<td><?php echo $var[2][$i][1]?></td>
				<td><?php echo $var[2][$i][2]?></td>
				<td><?php echo $var[2][$i][3]?></td>
				<td>v</td>
			</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<div id="info-5">
		<h3 id="method">Informasi Bahasa</h3>
		<table>
			<thead>
			<tr>
				<th>Bahasa</th>
				<th>Nilai Bicara</th>
				<th>Nilai Membaca</th>
				<th>Nilai Menulis</th>
				<th width="10px"><?php echo anchor('employee/employee/more_info?height=400&width=320&form=4','+', 'class="thickbox" title="Informasi Bahasa"')?></th>
			</tr>
			</thead>
			<tbody>
			<?php if($var[3][0][0]!='' && $var[3][0][1] != '') { for($i=0; $i<count($var[3]); $i++) { ?>
			<tr>
				<td><?php echo $var[3][$i][0]?></td>
				<td><?php echo $var[3][$i][1]?></td>
				<td><?php echo $var[3][$i][2]?></td>
				<td><?php echo $var[3][$i][3]?></td>
				<td>v</td>
			</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<div id="info-6">
		<h3 id="method">Informasi Riwayat Pekerjaan</h3>
		<table>
			<thead>
			<tr>
				<th>Nama Perusahaan</th>
				<th>Dari</th>
				<th>Sampai</th>
				<th>Jabatan</th>
				<th>Pekerjaan</th>
				<th>Gaji</th>
				<th width="10px"><?php echo anchor('employee/employee/more_info?height=400&width=320&form=5','+', 'class="thickbox" title="Informasi Riwayat Pekerjaan"')?></th>
			</tr>
			</thead>
			<tbody>
			<?php if($var[4][0][0]!='' && $var[4][0][1] != '') { for($i=0; $i<count($var[4]); $i++) { ?>
			<tr>
				<td><?php echo $var[4][$i][0]?></td>
				<td><?php echo $var[4][$i][1]?></td>
				<td><?php echo $var[4][$i][2]?></td>
				<td><?php echo $var[4][$i][3]?></td>
				<td><?php echo $var[4][$i][4]?></td>
				<td>Rp. <?php echo number_format($var[4][$i][5])?></td>
				<td>v</td>
			</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
</div>