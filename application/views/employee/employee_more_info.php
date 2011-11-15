<script type="text/javascript">
	function submit_form ()
	{
		$('#ajax_form').ajaxSubmit({
		target : '#form_target',
		dataType : 'json',
		beforeSubmit    : show_loading,
		//error           : function (){alert("Error calling ajax");hide_loading();},
		success         : function (response){
		    if (response.status == 2 ){
			$('#form_target').html(response.text).addClass('error').fadeIn('slow');
		    }
		    else{
			$('#form_target').html(response.text).addClass('info').fadeIn('slow');
			tb_remove();
		    }
		    hide_loading();   
		}   
	    });
	    return false;
	}
	function show_loading ()
	{
	    setTimeout(function(){
		$('#loading-layer').show();
		$('#loading').show();
		
	    }, 100);
	}
	function hide_loading(){
	    setTimeout(function(){
		$('#loading-layer').hide();
		$('#loading').hide();
	       
	    }, 400);
	}
</script>
<?php if ($form == 1) { ?>
<div id="form_info-1">
<?php echo form_open($module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<ul>
	<li><?php echo form_input('pi1_nama','','placeholder="Nama Lengkap"')?></li>
	<li><?php echo form_dropdown('pi1_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'),'L','class="required"') ?></li>
	<li><?php echo form_input('pi1_umur','','placeholder="Umur" size="5px"')?></li>
	<li><?php echo form_input('pi1_hubungan','','placeholder="Hubungan Keluarga"')?></li>
	<li><?php echo form_input('pi1_pendidikan','','placeholder="Pendidikan" size="5"')?></li>
	<li><?php echo form_input('pi1_pekerjaan','','placeholder="Pekerjaan"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>
</div>
<?php } else if ($form == 2) { ?>
<div id="form_info-2">
<?php echo form_open($module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<ul>
	<li><?php echo form_input('pi2_tingkat','','placeholder="Tingkat" size="5"')?></li>
	<li><?php echo form_input('pi2_nama_instansi','','placeholder="Nama Instansi" class="required"') ?></li>
	<li><?php echo form_input('pi2_tahun_lulus','','placeholder="Tahun" size="5px"')?></li>
	<li><?php echo form_input('pi2_jurusan','','placeholder="Jurusan"')?></li>
	<li><?php echo form_input('pi2_sertifikasi','','placeholder="Sertifikasi"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>
</div>
<?php } else if ($form == 3) { ?>
<div id="form_info-3">
<?php echo form_open($module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<ul>
	<li><?php echo form_input('pi3_jenis_kursus','','placeholder="Jenis Kursus"')?></li>
	<li><?php echo form_input('pi3_nama_lembaga','','placeholder="Nama Lembaga" class="required"') ?></li>
	<li><?php echo form_input('pi3_kualifikasi','','placeholder="Kualifikasi"')?></li>
	<li><?php echo form_input('pi3_tahun','','placeholder="Tahun" size="5"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>
</div>
<?php } else if ($form == 4) { ?>
<div id="form_info-4">
<?php echo form_open($module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<ul>
	<li><?php echo form_input('pi4_bahasa','','placeholder="Nama Bahasa"')?></li>
	<li><?php echo form_label('Nilai Bicara')?><?php echo form_input_type('number','pi4_nilai_bicara','','min="0" max="5" style="width:50px"')?> dari 5</li>
	<li><?php echo form_label('Nilai Membaca')?><?php echo form_input_type('number','pi4_nilai_membaca','','min="0" max="5" style="width:50px"')?> dari 5</li>
	<li><?php echo form_label('Nilai Menulis')?><?php echo form_input_type('number','pi4_nilai_menulis','','min="0" max="5" style="width:50px"')?> dari 5</li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>
</div>
<?php } else if ($form == 5) { ?>
<div id="form_info-5">
<?php echo form_open($module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<ul>
	<li><?php echo form_input('pi5_nama_perusahaan','','placeholder="Nama Pekerjaan"')?></li>
	<li><?php echo form_input('pi5_dari','','placeholder="Dari" size="5px"')?></li>
	<li><?php echo form_input('pi5_sampai','','placeholder="Sampai" size="5px"')?></li>
	<li><?php echo form_input('pi5_jabatan','','placeholder="Jabatan"')?></li>
	<li><?php echo form_input('pi5_pekerjaan','','placeholder="Pekerjaan"')?></li>
	<li>Rp <?php echo form_input('pi5_gaji','','placeholder="Gaji"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>
</div>
<?php } ?>