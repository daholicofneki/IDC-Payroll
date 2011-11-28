<h2 id="method">Peraturan Pemerintah</h2>
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
<div class="info">Jamsostek &amp; JPK</div>
<table>
	<tr>
		<td colspan="2"><b>Jamsostek</b></td>
	</tr>
	<tr>
		<td>Jamsostek Yang Ditanggung Karyawan</td>
		<td><?php echo number_format(@$data->jamsostek_ditanggung_persen,2) ?> %   X   Gaji Pokok</td>
	</tr>
	<tr>
		<td>Jamsostek Dibayar Pemberi Kerja</td>
		<td><?php echo number_format(@$data->jamsostek_dibayar_persen,2) ?> %   X   Gaji Pokok</td>
	</tr>
	<tr>
		<td colspan="2"><br /><br /><b>JPK</b></td>
	</tr>
	<tr>
		<td>Bagi Peserta Lajang</td>
		<td><?php echo number_format(@$data->jpk_lajang_persen,2) ?> %   X   Rp. 1.000.000,-</td>
	</tr>
	<tr>
		<td>Bagi Peserta Berkeluarga</td>
		<td><?php echo number_format(@$data->jpk_berkeluarga_persen,2) ?> %   X   Rp. 1.000.000,-</td>
	</tr>
</table>
<div class="info">Biaya Jabatan</div>
<table>
	<tr>
		<td>Biaya Jabatan per bulan</td>
		<td>( Gaji Bruto  x <?php echo number_format(@$data->biaya_jabatan_1_persen,2 )?> % )   <  <?php echo number_format(@$data->biaya_jabatan_2) ?> )</td>
	</tr>
	<tr>
		<td>Biaya Jabatan Bonus & THR</td>
		<td><?php echo number_format(@$data->biaya_jabatan_3) ?> - Biaya Jabatan</td>
	</tr>
</table>