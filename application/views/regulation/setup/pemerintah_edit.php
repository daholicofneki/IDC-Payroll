<script src="<?php echo base_url()?>static/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/jquery.number.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/helper.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#formid').validate();
		$('.num').priceFormat({
			clearPrefix: true,
			prefix: '',
			centsSeparator: '.',
			thousandsSeparator: ','
		});
		
		$("#ptkp_tk0_bulan").blur(function(){
			if ($("#ptkp_tk0_bulan").val() !="" || $("#ptkp_tk0_bulan").val()==null)
			{
				var val = $("#ptkp_tk0_bulan").val();
				var string1 = val.replace(".00","");
				var string2 = string1.replace(/[,]+/g,"");
//alert(addcomma(parseFloat(string2)*12)+".00")
				$("#ptkp_tk0_tahun").val(addcomma(parseFloat(string2)*12)+".00");
			}
			else
			{
				$("#ptkp_tk0_tahun").val();
			}
		});
	});
</script>
<h2 id="method">Peraturan Pemerintah</h2>
<?php echo form_open(uri_string(),array('id'=>'formid','class'=>'form'))?>
<?php echo view_errors()?>
<div class="info">PTKP (Penghasilan Tidak Kena Pajak)</div>
<table>
    <thead>
	<tr>
		<th width="20%"></th>
		<th>STATUS</th>
		<th>PTPKP<br />(Bulan)</th>
		<th>PTPKP<br />(Tahun)</th>
	</tr>
    </thead>
    <tbody>
	<tr>
		<td></td>
		<td>TK 0</td>
		<td><?php echo form_input('ptkp_tk0',number_format(@$data->ptkp_tk0,2),'class="required num" id="ptkp_tk0_bulan" size="15"')?></td>
		<td><?php echo form_input('ptkp_tk0',number_format(@$data->ptkp_tk0*12,2),'class="required num" id="ptkp_tk0_tahun" size="15" readonly="readonly"')?></td>
	</tr>
	<tr>
		<td></td>
		<td>K0</td>
		<td><?php echo form_input('ptkp_k0',number_format(@$data->ptkp_k0,2),'class="required num" id="ptkp_k0_bulan" size="15"')?></td>
		<td><?php echo form_input('ptkp_k0',number_format(@$data->ptkp_k0*12,2),'class="required num" id="ptkp_k0_tahun" size="15" readonly="readonly"')?></td>
	</tr>
	<tr>
		<td></td>
		<td>K1</td>
		<td><?php echo form_input('ptkp_k1',number_format(@$data->ptkp_k1,2),'class="required num" id="ptkp_k1_bulan" size="15"')?></td>
		<td><?php echo form_input('ptkp_k1',number_format(@$data->ptkp_k1*12,2),'class="required num" id="ptkp_k1_tahun" size="15" readonly="readonly"')?></td>
	</tr>
	<tr>
		<td></td>
		<td>K2</td>
		<td><?php echo form_input('ptkp_k2',number_format(@$data->ptkp_k2,2),'class="required num" id="ptkp_k2_bulan" size="15"')?></td>
		<td><?php echo form_input('ptkp_k2',number_format(@$data->ptkp_k2*12,2),'class="required num" id="ptkp_k2_tahun" size="15" readonly="readonly"')?></td>
	</tr>
	<tr>
		<td></td>
		<td>K3</td>
		<td><?php echo form_input('ptkp_k3',number_format(@$data->ptkp_k3,2),'class="required num" id="ptkp_k3_bulan" size="15"')?></td>
		<td><?php echo form_input('ptkp_k3',number_format(@$data->ptkp_k3*12,2),'class="required num" id="ptkp_k3_tahun" size="15" readonly="readonly"')?></td>
	</tr>
    </tbody>
</table>
<div class="info">PPH 21</div>
<table>
    <thead>
	<tr>
		<th width="20%"></th>
		<th colspan="2">PKP Per Tahun</th>
		<th rowspan="2">PPH 21</th>
	</tr>
	<tr>
		<th></th>
		<th>Mulai</th>
		<th>Sampai</th>
	</tr>
    </thead>
    <tbody>
	<tr>
		<td></td>
		<td><?php echo form_input('pph21_1_dari',number_format(@$data->pph21_1_dari,2),'class="required num" id="pph21_1_dari" size="15"')?></td>
		<td><?php echo form_input('pph21_1_sampai',number_format(@$data->pph21_1_sampai,2),'class="required num" id="pph21_1_sampai" size="15"')?></td>
		<td><?php echo form_input('pph21_1_persen',number_format(@$data->pph21_1_persen,2),'class="required num" id="pph21_1_persen" size="5"')?> %</td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_input('pph21_2_dari',number_format(@$data->pph21_2_dari,2),'class="required num" id="pph21_2_dari" size="15"')?></td>
		<td><?php echo form_input('pph21_2_sampai',number_format(@$data->pph21_2_sampai,2),'class="required num" id="pph21_2_sampai" size="15"')?></td>
		<td><?php echo form_input('pph21_2_persen',number_format(@$data->pph21_2_persen,2),'class="required num" id="pph21_2_persen" size="5"')?> %</td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_input('pph21_3_dari',number_format(@$data->pph21_3_dari,2),'class="required num" id="pph21_3_dari" size="15"')?></td>
		<td><?php echo form_input('pph21_3_sampai',number_format(@$data->pph21_3_sampai,2),'class="required num" id="pph21_3_sampai" size="15"')?></td>
		<td><?php echo form_input('pph21_3_persen',number_format(@$data->pph21_3_persen,2),'class="required num" id="pph21_3_persen" size="5"')?> %</td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_input('pph21_4_dari',number_format(@$data->pph21_4_dari,2),'class="required num" id="pph21_4_dari" size="15"')?></td>
		<td>-- Unlimited --</td>
		<td><?php echo form_input('pph21_4_persen',number_format(@$data->pph21_4_persen,2),'class="required num" id="pph21_4_persen" size="5"')?> %</td>
	</tr>
    </tbody>
</table>
<div class="info">Jamsostek &amp; JPK</div>
<table>
	<tr>
		<td colspan="2"><b>Jamsostek</b></td>
	</tr>
	<tr>
		<td>Jamsostek Yang Ditanggung Karyawan</td>
		<td><?php echo form_input('jamsostek_ditanggung_persen',number_format(@$data->jamsostek_ditanggung_persen,2),'class="required num" id="pph21_4_dari" size="5"')?> %   X   Gaji Pokok</td>
	</tr>
	<tr>
		<td>Jamsostek Dibayar Pemberi Kerja</td>
		<td><?php echo form_input('jamsostek_dibayar_persen',number_format(@$data->jamsostek_dibayar_persen,2),'class="required num" id="pph21_4_dari" size="5"')?> %   X   Gaji Pokok</td>
	</tr>
	<tr>
		<td colspan="2"><br /><br /><b>JPK</b></td>
	</tr>
	<tr>
		<td>Bagi Peserta Lajang</td>
		<td><?php echo form_input('jpk_lajang_persen',number_format(@$data->jpk_lajang_persen,2),'class="required num" id="jpk_lajang_persen" size="5"')?> %   X   Rp. 1.000.000,-</td>
	</tr>
	<tr>
		<td>Bagi Peserta Berkeluarga</td>
		<td><?php echo form_input('jpk_berkeluarga_persen',number_format(@$data->jpk_berkeluarga_persen,2),'class="required num" id="jpk_berkeluarga_persen" size="5"')?> %   X   Rp. 1.000.000,-</td>
	</tr>
</table>
<div class="info">Biaya Jabatan</div>
<table>
	<tr>
		<td>Biaya Jabatan per bulan</td>
		<td>( Gaji Bruto  x <?php echo form_input('biaya_jabatan_1_persen',number_format(@$data->biaya_jabatan_1_persen,2),'class="required num" id="biaya_jabatan_1_persen" size="5"')?> % )   <  <?php echo form_input('biaya_jabatan_2',number_format(@$data->biaya_jabatan_2,2),'class="required num" id="biaya_jabatan_2" size="15"')?> )</td>
	</tr>
	<tr>
		<td>Biaya Jabatan Bonus & THR</td>
		<td><?php echo form_input('biaya_jabatan_3',number_format(@$data->biaya_jabatan_3,2),'class="required num" id="biaya_jabatan_3" size="15"')?> - Biaya Jabatan</td>
	</tr>
</table>
<ul>
	<li class="form_handle">
		<?php echo form_submit('save','Save Regulation', 'class="awesome medium blue"')?>
		<?php echo anchor($module[0].'/pemerintah','Cancel', 'class="awesome medium red"')?>
	</li>
</ul>
<?php echo form_close()?>