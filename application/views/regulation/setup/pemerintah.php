<script type="text/javascript">
	$(document).ready(function(){
               $( "#accordion" ).accordion({
                        //active: 0            -- default active accordion
                });
	});
</script>

<h2 id="method">Peraturan Pemerintah</h2>
<div id="accordion">
	<h3><a href="#ptkp">PTKP (Penghasilan Tidak Kena Pajak)</a></h3>
	<div>
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
                                <td>Rp. <?php echo number_format(@$data->ptkp_tk0) ?></td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_tk0*12) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>K0</td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k0) ?></td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k0*12) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>K1</td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k1) ?></td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k1*12) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>K2</td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k2) ?></td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k2*12) ?></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>K3</td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k3) ?></td>
                                <td>Rp. <?php echo number_format(@$data->ptkp_k3*12) ?></td>
                        </tr>
                    </tbody>
                </table>
	</div>
	<h3><a href="#pph21">PPH 21</a></h3>
	<div>
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
                                <td><?php echo number_format(@$data->pph21_1_dari) ?></td>
                                <td><?php echo number_format(@$data->pph21_1_sampai) ?></td>
                                <td><?php echo number_format(@$data->pph21_1_persen) ?> %</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td><?php echo number_format(@$data->pph21_2_dari) ?></td>
                                <td><?php echo number_format(@$data->pph21_2_sampai) ?></td>
                                <td><?php echo number_format(@$data->pph21_2_persen) ?> %</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td><?php echo number_format(@$data->pph21_3_dari) ?></td>
                                <td><?php echo number_format(@$data->pph21_3_sampai) ?></td>
                                <td><?php echo number_format(@$data->pph21_3_persen) ?> %</td>
                        </tr>
                        <tr>
                                <td></td>
                                <td><?php echo number_format(@$data->pph21_4_dari) ?></td>
                                <td>-- Unlimited --</td>
                                <td><?php echo number_format(@$data->pph21_4_persen) ?> %</td>
                        </tr>
                    </tbody>
                </table>
	</div>
	<h3><a href="#jamsostek">Jamsostek &amp; JPK</a></h3>
	<div>
                <b>Jamsostek</b>
                <p>Jamsostek Yang Ditanggung Karyawan</p>
                        <div align="center"><?php echo number_format(@$data->jamsostek_ditanggung_persen) ?> %   X   Gaji Pokok</div>
                <p>Jamsostek Dibayar Pemberi Kerja</p>
		        <div align="center"><?php echo number_format(@$data->jamsostek_dibayar_persen,2) ?> %   X   Gaji Pokok</div>
                <b>JPK</b>
                <p>Bagi Peserta Lajang</p>
		<div>
                        <div align="center"><?php echo number_format(@$data->jpk_lajang_persen) ?> %   X   Rp. 1.000.000,-</div>
		</div>
                <p>Bagi Peserta Berkeluarga</p>
		<div>
		        <div align="center"><?php echo number_format(@$data->jpk_berkeluarga_persen) ?> %   X   Rp. 1.000.000,-</div>
		</div>
	</div>
	<h3><a href="#jabaran">Biaya Jabatan</a></h3>
	<div>
                <p>Biaya Jabatan per bulan</p>
		<div>( Gaji Bruto  X <?php echo number_format(@$data->biaya_jabatan_1_persen) ?> % )   <  <?php echo number_format(@$data->biaya_jabatan_2) ?> % )</div>
                <p>Biaya Jabatan Bonus & THR</p>
		<div><?php echo number_format(@$data->biaya_jabatan_3) ?> - Biaya Jabatan</div>
	</div>
</div>