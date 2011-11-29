<script src="<?php echo base_url()?>static/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/jquery.number.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>static/js/helper.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#perusahaan").tabs();
		$('#formid').validate();
		$('.num').priceFormat({
			clearPrefix: true,
			prefix: '',
			centsSeparator: '.',
			thousandsSeparator: ','
		});
		$('#supir_tunj_makan_malam_dari').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});
		$('#supir_ot_reguler_sampai').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});
		$('#supir_ot_malam_dari').timepicker({
			hourGrid: 4,
			minuteGrid: 10
		});
	});
</script>
<h2 id="method">Peraturan Perusahaan</h2>
<?php echo form_open(uri_string(),array('id'=>'formid','class'=>'form'))?>
<?php echo view_errors()?>
<div id="perusahaan">
        <ul>
                <li><a href="#umum">Umum</a></li>
                <li><a href="#staff">Staff</a></li>
                <li><a href="#supir">Supir</a></li>
                <li><a href="#spg">SPG</a></li>
        </ul>
        <div id="umum">
                <div class="info">Tunjangan Jabatan</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Level</th>
                                <th>Tunjangan</th>
                                <th width="20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
                                <td><?php echo form_input('tunj_jabatan_supervisor',number_format(@$data->tunj_jabatan_supervisor,2),'class="required num" id="tunj_jabatan_supervisor" size="15"')?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
                                <td><?php echo form_input('tunj_jabatan_ass_manager',number_format(@$data->tunj_jabatan_ass_manager,2),'class="required num" id="tunj_jabatan_ass_manager" size="15"')?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
				<td><?php echo form_input('tunj_jabatan_manager',number_format(@$data->tunj_jabatan_manager,2),'class="required num" id="tunj_jabatan_manager" size="15"')?></td>
                                <td></td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Tunjangan Pengobatan</div>
                <p align="center">(
			<?php echo form_input('tunj_pengobatan_1',number_format(@$data->tunj_pengobatan_1,2),'class="required num" id="tunj_pengobatan_1" size="5"')?> Gaji Pokok +
			<?php echo form_input('tunj_pengobatan_2',number_format(@$data->tunj_pengobatan_2,2),'class="required num" id="tunj_pengobatan_2" size="5"')?> Tunjangan Jabatan x
			<?php echo form_input('tunj_pengobatan_3_persen',number_format(@$data->tunj_pengobatan_3_persen,2),'class="required num" id="tunj_pengobatan_3_persen" size="5"')?> %)
		</p>
        </div>
        <div id="staff">
                <div class="info">Overtime Kantor</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Jam ke-</th>
                                <th>Peraturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>0 - 1</td>
                                <td>
					( Gaji Pokok / 
					<?php echo form_input('staff_ot_kantor_1_1',number_format(@$data->staff_ot_kantor_1_1,0),'class="required" id="staff_ot_kantor_1_1" size="7"')?> x
					<?php echo form_input('staff_ot_kantor_1_2',number_format(@$data->staff_ot_kantor_1_2,2),'class="required num" id="staff_ot_kantor_1_2" size="5"')?>
				</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>> 1</td>
				<td>
					( Gaji Pokok / 
					<?php echo form_input('staff_ot_kantor_2_1',number_format(@$data->staff_ot_kantor_2_1,0),'class="required" id="staff_ot_kantor_2_1" size="7"')?> x
					<?php echo form_input('staff_ot_kantor_2_2',number_format(@$data->staff_ot_kantor_2_2,2),'class="required num" id="staff_ot_kantor_2_2" size="5"')?>
				</td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Event Sabtu</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Level</th>
                                <th>Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Staff</td>
                                <td>Rp. <?php echo form_input('staff_event_sabtu_staff',number_format(@$data->staff_event_sabtu_staff,2),'class="required num" id="staff_event_sabtu_staff" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
				<td>Rp. <?php echo form_input('staff_event_sabtu_supervisor',number_format(@$data->staff_event_sabtu_supervisor,2),'class="required num" id="staff_event_sabtu_supervisor" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
				<td>Rp. <?php echo form_input('staff_event_sabtu_ass_manager',number_format(@$data->staff_event_sabtu_ass_manager,2),'class="required num" id="staff_event_sabtu_ass_manager" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
				<td>Rp. <?php echo form_input('staff_event_sabtu_manager',number_format(@$data->staff_event_sabtu_manager,2),'class="required num" id="staff_event_sabtu_manager" size="15"')?> x Total hari</td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Event Minggu &amp; Hari Libur</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Level</th>
                                <th>Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Staff</td>
				<td>Rp. <?php echo form_input('staff_event_libur_staff',number_format(@$data->staff_event_libur_staff,2),'class="required num" id="staff_event_libur_staff" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
				<td>Rp. <?php echo form_input('staff_event_libur_supervisor',number_format(@$data->staff_event_libur_supervisor,2),'class="required num" id="staff_event_libur_supervisor" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
				<td>Rp. <?php echo form_input('staff_event_libur_ass_manager',number_format(@$data->staff_event_libur_ass_manager,2),'class="required num" id="staff_event_libur_ass_manager" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
				<td>Rp. <?php echo form_input('staff_event_libur_manager',number_format(@$data->staff_event_libur_manager,2),'class="required num" id="staff_event_libur_manager" size="15"')?> x Total hari</td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Tunjangan Luar Kota</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Level</th>
                                <th>Malam ke-1</th>
                                <th>Malam selanjutnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Staff</td>
				<td>Rp. <?php echo form_input('staff_tunj_luarkota_staff_1',number_format(@$data->staff_tunj_luarkota_staff_1,2),'class="required num" id="staff_tunj_luarkota_staff_1" size="15"')?></td>
                                <td>Rp. <?php echo form_input('staff_tunj_luarkota_staff_2',number_format(@$data->staff_tunj_luarkota_staff_2,2),'class="required num" id="staff_tunj_luarkota_staff_2" size="15"')?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
				<td>Rp. <?php echo form_input('staff_tunj_luarkota_supervisor_1',number_format(@$data->staff_tunj_luarkota_supervisor_1,2),'class="required num" id="staff_tunj_luarkota_supervisor_1" size="15"')?></td>
                                <td>Rp. <?php echo form_input('staff_tunj_luarkota_supervisor_2',number_format(@$data->staff_tunj_luarkota_supervisor_2,2),'class="required num" id="staff_tunj_luarkota_supervisor_2" size="15"')?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
				<td>Rp. <?php echo form_input('staff_tunj_luarkota_ass_manager_1',number_format(@$data->staff_tunj_luarkota_ass_manager_1,2),'class="required num" id="staff_tunj_luarkota_ass_manager_1" size="15"')?></td>
                                <td>Rp. <?php echo form_input('staff_tunj_luarkota_ass_manager_2',number_format(@$data->staff_tunj_luarkota_ass_manager_2,2),'class="required num" id="staff_tunj_luarkota_ass_manager_2" size="15"')?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
				<td>Rp. <?php echo form_input('staff_tunj_luarkota_manager_1',number_format(@$data->staff_tunj_luarkota_manager_1,2),'class="required num" id="staff_tunj_luarkota_manager_1" size="15"')?></td>
                                <td>Rp. <?php echo form_input('staff_tunj_luarkota_manager_2',number_format(@$data->staff_tunj_luarkota_manager_2,2),'class="required num" id="staff_tunj_luarkota_manager_2" size="15"')?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Director</td>
				<td>Rp. <?php echo form_input('staff_tunj_luarkota_director_1',number_format(@$data->staff_tunj_luarkota_director_1,2),'class="required num" id="staff_tunj_luarkota_director_1" size="15"')?></td>
                                <td>Rp. <?php echo form_input('staff_tunj_luarkota_director_2',number_format(@$data->staff_tunj_luarkota_director_2,2),'class="required num" id="staff_tunj_luarkota_director_2" size="15"')?></td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Peraturan ketidakhadiran</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Ketidakhadiran</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan Makan</th>
                                <th>Tunjangan Transport</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Cuti tahunan</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Cuti melahirkan</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Sakit</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Bolos</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                    </tbody> 
                </table>
        </div>
        <div id="supir">
                <div class="info">Tunjangan Makan Siang</div>
                <p align="center"><?php echo form_input('supir_tunj_makan_siang',number_format(@$data->supir_tunj_makan_siang,2),'class="required num" id="supir_tunj_makan_siang" size="15"')?> x Jumlah hari kehadiran</p>

                <div class="info">Tunjangan Luar Kota</div>
		<p style="padding-left:150px">
			Menginap : <?php echo form_input('supir_tunj_luarkota_menginap',number_format(@$data->supir_tunj_luarkota_menginap,2),'class="required num" id="supir_tunj_luarkota_menginap" size="15"')?> x Total Malam<br />
			Tidak Menginap : <?php echo form_input('supir_tunj_luarkota_tidak_menginap',number_format(@$data->supir_tunj_luarkota_tidak_menginap,2),'class="required num" id="supir_tunj_luarkota_tidak_menginap" size="15"')?> x Total Hari
		</p>

                <div class="info">Tunjangan Makan Malam</div>
                <p align="center">Berlaku mulai <?php echo form_input('supir_tunj_makan_malam_dari',date('H:i', strtotime(@$data->supir_tunj_makan_malam_dari)),'class="required" id="supir_tunj_makan_malam_dari" size="7"')?> : <?php echo form_input('supir_tunj_makan_malam',number_format(@$data->supir_tunj_makan_malam,2),'class="required num" id="supir_tunj_makan_malam" size="15"')?> x Total Hari</p>

                <div class="info">Overtime Reguler</div>
                <p align="center">Berlaku sampai <?php echo form_input('supir_ot_reguler_sampai',date('H:i', strtotime(@$data->supir_ot_reguler_sampai)),'class="required" id="supir_ot_reguler_sampai" size="7"')?>  : <?php echo form_input('supir_ot_reguler',number_format(@$data->supir_ot_reguler,2),'class="required num" id="supir_ot_reguler" size="15"')?> x Total Jam Overtime</p>

		<div class="info">Overtime Malam</div>
                <p align="center">Berlaku mulai <?php echo form_input('supir_ot_malam_dari',date('H:i', strtotime(@$data->supir_ot_malam_dari)),'class="required" id="supir_ot_malam_dari" size="7"')?> : <?php echo form_input('supir_ot_malam',number_format(@$data->supir_ot_malam,2),'class="required num" id="supir_ot_malam" size="15"')?> x Total Hari</p>

		<div class="info">Overtime Hari Libur</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Jam ke-</th>
                                <th>Peraturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td> 0 - 9 </td>
                                <td><?php echo form_input('supir_ot_libur',number_format(@$data->supir_ot_libur,2),'class="required num" id="supir_ot_libur" size="15"')?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td> > 9 </td>
                                <td>O/T reguler + O/T malam</td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Peraturan ketidakhadiran</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Ketidakhadiran</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan Makan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Cuti tahunan</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Sakit</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                                <td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Bolos</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                                <td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                    </tbody> 
                </table>
        </div>
        <div id="spg">
		<div class="info">Tunjangan Lembur</div>
		<p align="center">
			SPG Tetap : Gaji Total / <?php echo form_input('spg_ot_tetap_hari',number_format(@$data->spg_ot_tetap_hari,0),'class="required" id="spg_ot_tetap_hari" size="5"')?> x Total Hari<br />
			SPG Kontrak : <?php echo form_input('spg_ot_kontrak',number_format(@$data->spg_ot_kontrak,0),'class="required" id="spg_ot_kontrak" size="5"')?> x Total Hari
		</p>

                <div class="info">Overtime Event</div>
		<table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Jam ke-</th>
                                <th>Peraturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td> 0 - 8 </td>
                                <td>Transport hari kerja atau Tunjangan lembur</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td> > 8 </td>
                                <td><?php echo form_input('spg_event_1',number_format(@$data->spg_event_1,2),'class="required num" id="spg_event_1" size="15"')?> / Jam</td>
                        </tr>
                    </tbody> 
                </table>

		<div class="info">Tunjangan Pulsa</div>
		<p align="center"><?php echo form_input('spg_tunj_pulsa',number_format(@$data->spg_tunj_pulsa,2),'class="required num" id="spg_tunj_pulsa" size="15"')?> / Bulan</p>

                <div class="info">Tunjangan Transport Luar Kota</div>
		<p align="center"><?php echo form_input('spg_tunj_luarkota',number_format(@$data->spg_tunj_luarkota,2),'class="required num" id="spg_tunj_luarkota" size="15"')?> x Total Hari</p>

                <div class="info">Peraturan ketidakhadiran</div>
                <table>
                    <thead>
                        <tr>
                                <th width="20%"></th>
                                <th>Ketidakhadiran</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan Transport</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td></td>
                                <td>Cuti tahunan</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Cuti melahirkan</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Sakit</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Bolos</td>
                                <td><img src="<?php echo base_url()."static/image/bullet_tick.png" ?>"></td>
				<td><img src="<?php echo base_url()."static/image/bullet_cross.png" ?>"></td>
                        </tr>
                    </tbody> 
                </table>
        </div>
</div>
<ul>
	<li class="form_handle">
		<?php echo form_submit('save','Save Regulation', 'class="awesome medium blue"')?>
		<?php echo anchor($module[0].'/perusahaan','Cancel', 'class="awesome medium red"')?>
	</li>
</ul>
<?php echo form_close()?>