/*
DROP DATABASE db_payroll;

CREATE DATABASE db_payroll
  WITH OWNER = neki
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'English_United States.1252'
       LC_CTYPE = 'English_United States.1252'
       CONNECTION LIMIT = -1;
*/
CREATE TABLE tb_pegawai
(
	pi_no character(6) NOT NULL,
	pi_nama_lengkap character varying(64) NOT NULL,
	pi_nama_kecil character varying(12) NOT NULL,

	pi_jenis_kelamin char(1) NOT NULL,
	pi_tempat_lahir character varying(24) NOT NULL,
	pi_tanggal_lahir date NOT NULL,
	pi_no_telepon1 character varying(16),
	pi_no_telepon2 character varying(16),
	pi_email character varying(24) NOT NULL,
	pi_alamat text,
	
	pi_status_nikah char(1) NOT NULL DEFAULT 'S',
	pi_jumlah_anak smallint NOT NULL DEFAULT 0,
	pi_kewarganegaraan character varying(16),
	pi_suku character varying(16),
	
	pi_no_ktp character varying(24),
	pi_no_sim character varying(24),
	pi_no_jamsostek character varying(24),

	pi_status_pajak char(3) NOT NULL DEFAULT 'K0',
	pi_npwp character varying(16),
	pi_foto character varying(64),

        pi_keluarga text ARRAY,
        pi_pendidikan_formal text ARRAY,
        pi_pendidikan_informal text ARRAY,
        pi_bahasa text ARRAY,
        pi_riwayat_pekerjaan text ARRAY,

	pi_lastupdated_by_account character varying(16) NOT NULL,
	pi_lastupdated_timestamp timestamp without time zone NOT NULL DEFAULT now(),

	CONSTRAINT tb_pegawai_pi_no_pk PRIMARY KEY (pi_no)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE tb_pegawai OWNER TO neki;

CREATE INDEX tb_pegawai_pi_no_idx ON tb_pegawai USING hash (upper(pi_no::text));
CREATE INDEX tb_pegawai_pi_nama_lengkap_idx ON tb_pegawai USING btree (upper(pi_nama_lengkap::text));

CREATE TABLE tb_pegawai_info_keluarga
(
	pi1_idx SERIAL NOT NULL,
	pi_no character(6) NOT NULL,
	pi1_nama character varying(24) NOT NULL,
	pi1_umur smallint,
	pi1_jenis_kelamin char(1) NOT NULL,
	pi1_hubungan character varying(12) NOT NULL,
	pi1_pendidikan character varying(12),
	pi1_pekerjaan character varying(24),

	CONSTRAINT tb_pegawai_info_keluarga_pi1_idx_pk PRIMARY KEY (pi1_idx),
	CONSTRAINT tb_pegawai_info_keluarga_pi_no_fk FOREIGN KEY (pi_no)
		REFERENCES tb_pegawai (pi_no) MATCH SIMPLE
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tb_pegawai_info_pendidikan_formal
(
	pi2_idx SERIAL NOT NULL,
	pi_no character(6) NOT NULL,
	pi2_tingkat character varying(12) NOT NULL,
	pi2_nama_sekolah character varying(24) NOT NULL,
	pi2_tahun_lulus integer NOT NULL,
	pi2_jurusan character varying(12),
	pi2_sertifikat character varying(12),

	CONSTRAINT tb_pegawai_info_pendidikan_formal_pi2_idx_pk PRIMARY KEY (pi2_idx),
	CONSTRAINT tb_pegawai_info_pendidikan_formal_pi_no_fk FOREIGN KEY (pi_no)
		REFERENCES tb_pegawai (pi_no) MATCH SIMPLE
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tb_pegawai_info_pendidikan_informal
(
	pi3_idx SERIAL NOT NULL,
	pi_no character(6) NOT NULL,
	pi3_jenis_kursus character varying(24) NOT NULL,
	pi3_nama_lembaga character varying(24) NOT NULL,
	pi3_kualifikasi character varying(24),
	pi3_tahun integer NOT NULL,

	CONSTRAINT tb_pegawai_info_pendidikan_informal_pi3_idx_pk PRIMARY KEY (pi3_idx),
	CONSTRAINT tb_pegawai_info_pendidikan_informal_pi_no_fk FOREIGN KEY (pi_no)
		REFERENCES tb_pegawai (pi_no) MATCH SIMPLE
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tb_pegawai_info_bahasa
(
	pi4_idx SERIAL NOT NULL,
	pi_no character(6) NOT NULL,
	pi4_bahasa character varying(12) NOT NULL,
	pi4_nilai_bicara smallint,
	pi4_nilai_membaca smallint,
	pi4_nilai_menulis smallint,

	CONSTRAINT tb_pegawai_info_bahasa_pi4_idx_pk PRIMARY KEY (pi4_idx),
	CONSTRAINT tb_pegawai_info_bahasa_pi_no_fk FOREIGN KEY (pi_no)
		REFERENCES tb_pegawai (pi_no) MATCH SIMPLE
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tb_pegawai_info_pekerjaan
(
	pi5_idx SERIAL NOT NULL,
	pi_no character(6) NOT NULL,
	pi5_nama_perusahaan character varying(24) NOT NULL,
	pi5_dari date NOT NULL,
	pi5_sampai date NOT NULL,
	pi5_jabatan character varying(12) NOT NULL,
	pi5_pekerjaan character varying(64) NOT NULL,
	pi5_gaji numeric (10, 2) NOT NULL,

	CONSTRAINT tb_pegawai_info_pekerjaan_pi5_idx_pk PRIMARY KEY (pi5_idx),
	CONSTRAINT tb_pegawai_info_pekerjaan_pi_no_fk FOREIGN KEY (pi_no)
		REFERENCES tb_pegawai (pi_no) MATCH SIMPLE
		ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tb_peraturan
(
	idx SERIAL NOT NULL,

	-- Pemerintah
	ptkp_tk0 numeric(10, 2) NOT NULL DEFAULT 0,
        ptkp_k0 numeric(10, 2) NOT NULL DEFAULT 0,
        ptkp_k1 numeric(10, 2) NOT NULL DEFAULT 0,
        ptkp_k2 numeric(10, 2) NOT NULL DEFAULT 0,
        ptkp_k3 numeric(10, 2) NOT NULL DEFAULT 0,

        pph21_1_dari numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_1_sampai numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_1_persen numeric(5,3) NOT NULL DEFAULT 0,
        pph21_2_dari numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_2_sampai numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_2_persen numeric(5,3) NOT NULL DEFAULT 0,
        pph21_3_dari numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_3_sampai numeric(12, 2) NOT NULL DEFAULT 0,
        pph21_3_persen numeric(5,3) NOT NULL DEFAULT 0,
        pph21_4_dari numeric(14,2) NOT NULL DEFAULT 0,
        pph21_4_persen numeric(5,3) NOT NULL DEFAULT 0,

        jamsostek_ditanggung_persen numeric(5,3) NOT NULL DEFAULT 0,
        jamsostek_dibayar_persen numeric(5,3) NOT NULL DEFAULT 0,
        jpk_lajang_persen numeric(5,3) NOT NULL DEFAULT 0,
        jpk_berkeluarga_persen numeric(5,3) NOT NULL DEFAULT 0,
        biaya_jabatan_1_persen numeric(5,3) NOT NULL DEFAULT 0,
        biaya_jabatan_2 numeric(8, 2) NOT NULL DEFAULT 0,
        biaya_jabatan_3 numeric(8, 2) NOT NULL DEFAULT 0,

	-- Perusahaan
	tunj_jabatan_supervisor numeric(8, 2) NOT NULL DEFAULT 0,
	tunj_jabatan_ass_manager numeric(8, 2) NOT NULL DEFAULT 0,
	tunj_jabatan_manager numeric(8, 2) NOT NULL DEFAULT 0,
	tunj_pengobatan_1 integer NOT NULL DEFAULT 0,
	tunj_pengobatan_2 integer NOT NULL DEFAULT 0,
	tunj_pengobatan_3_persen numeric(5,3) NOT NULL DEFAULT 0,

	staff_ot_kantor_1_1 integer NOT NULL DEFAULT 0,
	staff_ot_kantor_1_2 numeric(5,3) NOT NULL DEFAULT 0,
	staff_ot_kantor_2_1 integer NOT NULL DEFAULT 0,
	staff_ot_kantor_2_2 numeric(5,3) NOT NULL DEFAULT 0,
	staff_event_sabtu_staff numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_sabtu_supervisor numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_sabtu_ass_manager numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_sabtu_manager numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_libur_staff numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_libur_supervisor numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_libur_ass_manager numeric(8, 2) NOT NULL DEFAULT 0,
	staff_event_libur_manager numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_staff_1 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_staff_2 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_supervisor_1 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_supervisor_2 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_ass_manager_1 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_ass_manager_2 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_manager_1 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_manager_2 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_director_1 numeric(8, 2) NOT NULL DEFAULT 0,
	staff_tunj_luarkota_director_2 numeric(8, 2) NOT NULL DEFAULT 0,

	supir_tunj_makan_siang numeric(8, 2) NOT NULL DEFAULT 0,
	supir_tunj_luarkota_menginap numeric(8, 2) NOT NULL DEFAULT 0,
	supir_tunj_luarkota_tidak_menginap numeric(8, 2) NOT NULL DEFAULT 0,
	supir_tunj_makan_malam numeric(8, 2) NOT NULL DEFAULT 0,
	supir_tunj_makan_malam_dari time,
	supir_ot_reguler numeric(8, 2) NOT NULL DEFAULT 0,
	supir_ot_reguler_sampai time,
	supir_ot_malam numeric(8, 2) NOT NULL DEFAULT 0,
	supir_ot_malam_dari time,
	supir_ot_libur numeric(8, 2) NOT NULL DEFAULT 0,

	spg_ot_tetap_hari integer NOT NULL DEFAULT 0,
	spg_ot_kontrak numeric(8, 2) NOT NULL DEFAULT 0,
	spg_event_1 numeric(8, 2) NOT NULL DEFAULT 0,
	spg_tunj_pulsa numeric(8, 2) NOT NULL DEFAULT 0,
	spg_tunj_luarkota numeric(8, 2) NOT NULL DEFAULT 0,

	lastupdated_by_account character varying(16) NOT NULL,
	lastupdated_timestamp timestamp without time zone NOT NULL DEFAULT now(),

	CONSTRAINT tb_peraturan_idx_pk PRIMARY KEY (idx)
);


