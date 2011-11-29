<script type="text/javascript">
	$(document).ready(function(){
		$("#perusahaan").tabs();
	});
</script>
<h2 id="method">Peraturan Perusahaan</h2>
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
                                <td>Rp. <?php echo number_format(@$data->tunj_jabatan_supervisor) ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
                                <td>Rp. <?php echo number_format(@$data->tunj_jabatan_ass_manager) ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
                                <td>Rp. <?php echo number_format(@$data->tunj_jabatan_manager) ?></td>
                                <td></td>
                        </tr>
                    </tbody> 
                </table>
                <div class="info">Tunjangan Pengobatan</div>
                <p align="center">(<?php echo number_format(@$data->tunj_pengobatan_1) ?> Gaji Pokok + <?php echo number_format(@$data->tunj_pengobatan_2) ?> Tunjangan Jabatan x <?php echo number_format(@$data->tunj_pengobatan_3_persen) ?> %)</p>
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
                                <td>( Gaji Pokok / <?php echo number_format(@$data->staff_ot_kantor_1_1) ?> ) x <?php echo number_format(@$data->staff_ot_kantor_1_2,2) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>> 1</td>
                                <td>( Gaji Pokok / <?php echo number_format(@$data->staff_ot_kantor_2_1) ?> ) x <?php echo number_format(@$data->staff_ot_kantor_2_2) ?></td>
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
                                <td><?php echo number_format(@$data->staff_event_sabtu_staff) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
                                <td><?php echo number_format(@$data->staff_event_sabtu_supervisor) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
                                <td><?php echo number_format(@$data->staff_event_sabtu_ass_manager) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
                                <td><?php echo number_format(@$data->staff_event_sabtu_manager) ?> x Total hari</td>
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
                                <td><?php echo number_format(@$data->staff_event_libur_staff) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
                                <td><?php echo number_format(@$data->staff_event_libur_supervisor) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
                                <td><?php echo number_format(@$data->staff_event_libur_ass_manager) ?> x Total hari</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
                                <td><?php echo number_format(@$data->staff_event_libur_manager) ?> x Total hari</td>
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
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_staff_1) ?></td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_staff_2) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Supervisor</td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_supervisor_1) ?></td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_supervisor_2) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Ass. Manager</td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_ass_manager_1) ?></td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_ass_manager_2) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Manager</td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_manager_1) ?></td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_manager_2) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>Director</td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_director_1) ?></td>
                                <td><?php echo number_format(@$data->staff_tunj_luarkota_director_2) ?></td>
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
                <p align="center"><?php echo number_format(@$data->supir_tunj_makan_siang) ?> x Jumlah hari kehadiran</p>

                <div class="info">Tunjangan Luar Kota</div>
		<p style="padding-left:150px">
			Menginap : <?php echo number_format(@$data->supir_tunj_luarkota_menginap) ?> x Total Malam<br />
			Tidak Menginap : <?php echo number_format(@$data->supir_tunj_luarkota_tidak_menginap) ?> x Total Hari
		</p>

                <div class="info">Tunjangan Makan Malam</div>
                <p align="center">Berlaku mulai <?php echo @$data->supir_tunj_makan_malam_dari ?> : <?php echo number_format(@$data->supir_tunj_makan_malam) ?>  x Total Hari</p>

                <div class="info">Overtime Reguler</div>
                <p align="center">Berlaku sampai <?php echo @$data->supir_ot_reguler_sampai ?> : <?php echo number_format(@$data->supir_ot_reguler) ?>  x Total Jam Overtime</p>

		<div class="info">Overtime Malam</div>
                <p align="center">Berlaku mulai <?php echo @$data->supir_ot_malam_dari ?> : <?php echo number_format(@$data->supir_ot_malam) ?>  x Total Hari</p>

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
                                <td><?php echo number_format(@$data->supir_ot_libur) ?> x Total hari</td>
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
			SPG Tetap : Gaji Total / <?php echo number_format(@$data->spg_ot_tetap_hari) ?> x Total Hari<br />
			SPG Kontrak : <?php echo number_format(@$data->spg_ot_kontrak) ?> x Total Hari
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
                                <td><?php echo number_format(@$data->spg_event_1) ?> / Jam</td>
                        </tr>
                    </tbody> 
                </table>

		<div class="info">Tunjangan Pulsa</div>
		<p align="center"><?php echo number_format(@$data->spg_tunj_pulsa) ?> / Bulan</p>

                <div class="info">Tunjangan Transport Luar Kota</div>
		<p align="center"><?php echo number_format(@$data->spg_tunj_luarkota) ?> x Total Hari</p>

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
</div><br />
<?php echo anchor($module[0].'/perusahaan_edit','Edit', 'class="awesome orange"')?>