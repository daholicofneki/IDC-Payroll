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
<h2 id="method">Add New Employee</h2>
<?php echo form_open(uri_string(),array('id'=>'formid','class'=>'form'))?>

    <?php echo view_errors(); ?>
    <ul>
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
		<?php //echo form_radios('pi_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'),(@$data->pi_jenis_kelamin=='')?'L':@$data->pi_jenis_kelamin,'class="required"') ?>
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
		<?php //echo form_radios('pi_status_nikah',array ('L'=>'Lajang','M'=>'Menikah'),(@$data->pi_status_nikah=='')?'L':@$data->pi_status_nikah,'class="required"') ?>
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

	<div id="more_info">
		<ul>
			<li><a href="#info-1">Keluarga</a></li>
			<li><a href="#info-2">Pendidikan Formal</a></li>
			<li><a href="#info-3">Pendidikan Informal</a></li>
			<li><a href="#info-4">Bahasa</a></li>
			<li><a href="#info-5">Riwayat Pekerjaan</a></li>
		</ul>
		<div id="info-1">
			<table>
				<tr>
					<td>Nama</td>
					<td>Jenis Kelamin</td>
					<td>Umur</td>
					<td>Hubungan Keluarga</td>
					<td>Pendidikan</td>
					<td>Pekerjaan</td>
				</tr>
				<tr>
					<td><?php echo form_input('name="pi_1_nama"')?></td>
					<td><?php echo form_input('name="pi_1_jenis_kelamin"')?></td>
					<td><?php echo form_input('name="pi_1_umur"')?></td>
					<td><?php echo form_input('name="pi_1_hubungan"')?></td>
					<td><?php echo form_input('name="pi_1_pendidikan"')?></td>
					<td><?php echo form_input('name="pi_1_pekerjaan"')?></td>
				</tr>
			</table>
		</div>
		<div id="info-2">
			<table>
				<tr>
					<td>Tingkat</td>
					<td>Nama Sekolah</td>
					<td>Tanggal<br />Lulus</td>
					<td>Jurusan</td>
					<td>Sertifikat</td>
				</tr>
				<tr>
					<td><?php echo form_input('name="pi_2_tingkat"')?></td>
					<td><?php echo form_input('name="pi_2_nama_sekolah"')?></td>
					<td><?php echo form_input('name="pi_2_tanggal_lulus"')?></td>
					<td><?php echo form_input('name="pi_2_jurusan"')?></td>
					<td><?php echo form_input('name="pi_2_sertifikat"')?></td>
				</tr>
			</table>
		</div>
		<div id="info-3">
			<table>
				<tr>
					<td>Jenis Kursus</td>
					<td>Nama Lembaga</td>
					<td>Kualifikasi</td>
					<td>Tahun</td>
				</tr>
				<tr>
					<td><?php echo form_input('name="pi_3_jenis_kursus"')?></td>
					<td><?php echo form_input('name="pi_3_nama_lembaga"')?></td>
					<td><?php echo form_input('name="pi_3_kualifikasi"')?></td>
					<td><?php echo form_input('name="pi_3_tahun"')?></td>
				</tr>
			</table>
		</div>
		<div id="info-4">
			<table>
				<tr>
					<td>Bahasa</td>
					<td>Nilai Bicara</td>
					<td>Nilai Membaca</td>
					<td>Nilai Menulis</td>
				</tr>
				<tr>
					<td><?php echo form_input('name="pi_4_bahasa"')?></td>
					<td><?php echo form_input('name="pi_4_nilai_bicara"')?></td>
					<td><?php echo form_input('name="pi_4_nilai_membaca"')?></td>
					<td><?php echo form_input('name="pi_4_nilai_menulis"')?></td>
				</tr>
			</table>
		</div>
		<div id="info-5">
			<table>
				<tr>
					<td>Nama Perusahaan</td>
					<td>Dari</td>
					<td>Sampai</td>
					<td>Jabatan</td>
					<td>Tugas</td>
					<td>Gaji</td>
				</tr>
				<tr>
					<td><?php echo form_input('name="pi_5_nama_perusahaan"')?></td>
					<td><?php echo form_input('name="pi_5_bekerja_dari"')?></td>
					<td><?php echo form_input('name="pi_5_bekerja_sampai"')?></td>
					<td><?php echo form_input('name="pi_5_jabatan"')?></td>
					<td><?php echo form_input('name="pi_5_tugas"')?></td>
					<td><?php echo form_input('name="pi_5_gaji"')?></td>
				</tr>
			</table>
		</div>
	</div>

	<li class="form_handle">
            <?php echo form_submit('save','Save Data Employee', 'class="awesome medium blue"')?>
	    <?php echo anchor( $module.'/index','Cancel Save', 'class="awesome medium red"')?>
        </li>

    </ul>
<?php echo form_close()?>
