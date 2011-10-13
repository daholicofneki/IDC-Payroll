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
<?php echo form_open('employee/' . $module.'/form_handle',array('class'=>'form','id'=>'ajax_form','onSubmit'=>'return submit_form();'))?>
<div id="form_target"></div>
<ul>
	<li><?php echo form_input('pi1_nama','','placeholder="Isi nama"')?></li>
	<li><?php echo form_dropdown('pi1_jenis_kelamin',array ('L'=>'Laki-laki','P'=>'Perempuan'),'L','class="required"') ?></li>
	<li><?php echo form_input('pi1_umur','','placeholder="Umur" size="5px"')?></li>
	<li><?php echo form_input('pi1_hubungan','','placeholder="Hubungan Keluarga"')?></li>
	<li><?php echo form_input('pi1_pendidikan','','placeholder="Pendidikan"')?></li>
	<li><?php echo form_input('pi1_pekerjaan','','placeholder="Pekerjaan"')?></li>
	<li class="form_handle"><?php echo form_submit('save','Save Data', 'class="awesome medium blue"')?></li>
</ul>
<?php echo form_close()?>