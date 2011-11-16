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
<h2 id="method">Input Data Pegawai</h2>
<?php echo form_open(uri_string(),array('id'=>'formid','class'=>'form'))?>

    <?php echo view_errors(); ?>
    <ul>
    	<li>
		<?php echo form_label('NIK','', array('class'=>'description'))?>
		<?php echo form_input('pi_no',@$data->pi_no, 'size="8" readOnly')?> 
				
        </li>
	<li>
		<?php echo form_label('Nama, Nickname','', array('class'=>'description'))?>
		<?php echo form_input('pi_nama_lengkap', '', 'size="40" class="required"')?>, &nbsp;
		<?php echo form_input('pi_nama_kecil', '', 'size="20" class="required"')?>
	</li>
    	<li>
		<?php echo form_label($labels->pi_jenis_kelamin,'', array('class'=>'description'))?>
		<?php echo form_dropdown('pi_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'), 'L','class="required"') ?>
        </li>
        <li>
	        <?php echo form_label('Tempat, Tanggal Lahir','', array('class'=>'description', 'size'=>'32'))?>
		<?php echo form_input('pi_tempat_lahir','', 'size="32" placeholder="Tempat Lahir" class="required"')?>, 
		<?php echo form_input('pi_tanggal_lahir','',' size="12" id="dob" placeholder="yyyy/mm/dd" class="required datepicker"')?>
        </li>
        <li>
		<?php echo form_label('No Telepon','', array('class'=>'description'))?>
		<?php echo form_input('pi_no_telepon1','', 'size="24" placeholder="Masukkan no telepon" onkeyup="validate(this, \'num\')" class="required number"')?>, &nbsp;
		<?php echo form_input('pi_no_telepon2','', 'size="24" placeholder="Masukkan no telepon" onkeyup="validate(this, \'num\')"')?>
        </li>
        <li>
		<?php echo form_label($labels->pi_email,'', array('class'=>'description'))?>
		<?php echo form_input('pi_email','', 'size="32" placeholder="contoh : name@name.com" class="required email"')?>
        </li>
        <li>
		<?php echo form_label('Alamat','', array('class'=>'description'))?>
		<textarea cols="50" rows="3" name="pi_alamat" class="required"></textarea>
        </li>
    	<li>
		<?php echo form_label('Status Pernikahan','', array('class'=>'description'))?>
		<?php echo form_dropdown('pi_status_nikah',array ('L'=>'Lajang','M'=>'Menikah'),'L','class="required"') ?>
	</li>
	<li>
		<?php echo form_label($labels->pi_jumlah_anak,'', array('class'=>'description'))?>
		<?php echo form_input('pi_jumlah_anak','0', 'size="5" max="2" class="required number"')?>
        </li>
    	<li>
		<?php echo form_label('Status Pajak, NPWP','', array('class'=>'description'))?>
		<?php echo form_dropdown('pi_status_pajak',array ('K0'=>'K0','TK0'=>'TK0','TK1'=>'TK1','TK2'=>'TK2'),'K0','class="required"') ?> &nbsp;
		<?php echo form_input('pi_npwp','', 'size="24" class="required"')?>
        </li>
	<li>
		<?php echo form_label($labels->pi_kewarganegaraan,'', array('class'=>'description'))?>
		<?php echo form_input('pi_kewarganegaraan','', 'size="24" class="required"')?>
        </li>
	<li>
		<?php echo form_label($labels->pi_suku,'', array('class'=>'description'))?>
		<?php echo form_input('pi_suku','', 'size="24" class="required"')?>
        </li>
	<li>
		<?php echo form_label($labels->pi_no_ktp,'', array('class'=>'description'))?>
		<?php echo form_input('pi_no_ktp','', 'size="24" class="required"')?>
        </li>
	<li>
		<?php echo form_label($labels->pi_no_sim,'', array('class'=>'description'))?>
		<?php echo form_input('pi_no_sim','', 'size="24"')?>
        </li>
	<li>
		<?php echo form_label($labels->pi_no_jamsostek,'', array('class'=>'description'))?>
		<?php echo form_input('pi_no_jamsostek','', 'size="24"')?>
        </li>
	<li>
		<?php echo form_label('Foto','', array('class'=>'description'))?>
		<?php echo form_input('pi_foto','', 'style="width:70%"')?>
        </li>

	<li class="form_handle">
            <?php echo form_submit('save','Save Data Employee', 'class="awesome medium blue"')?>
	    <?php echo anchor('employee/'. $module.'/index','Cancel Save', 'class="awesome medium red"')?>
        </li>

    </ul>
<?php echo form_close()?>
