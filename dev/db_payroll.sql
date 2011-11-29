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

COPY tb_pegawai (pi_no, pi_nama_lengkap, pi_nama_kecil, pi_jenis_kelamin, pi_tempat_lahir, pi_tanggal_lahir, pi_no_telepon1, pi_no_telepon2, pi_email, pi_alamat, pi_status_nikah, pi_jumlah_anak, pi_kewarganegaraan, pi_suku, pi_no_ktp, pi_no_sim, pi_no_jamsostek, pi_status_pajak, pi_npwp, pi_foto, pi_keluarga, pi_pendidikan_formal, pi_pendidikan_informal, pi_bahasa, pi_riwayat_pekerjaan, pi_lastupdated_by_account, pi_lastupdated_timestamp) FROM stdin;
IP0001	Neki Arismi	Neki	P	Jakarta	1990-10-02	08568745318	-	neki.arismi@gmail.com	Tangerang	L	0	Indonesia	Jawa	0	0	0	K0 	0	0	{{Sukin,Laki-laki,40,Bapak,SMA,"Karyawan Swasta"},{Rusmini,Perempuan,40,Ibu,SMA,""},{"Nur Hena",Perempuan,10,Saudara,SD,Pelajar}}	{{SD,"SD Kampung Bambu",2001,"",""},{SMP,"SMP Sunan Bonang",2004,"",""},{SMA,"SMKN 1 Tangerang",2007,"",""}}	\N	{{"Bahasa Indonesia",5,5,5},{"Bahasa Inggris",3,3,3}}	{{"PT. Zonekom",2007,2008,"Jr. Programmer","",10000}}	daholicofneki	2011-11-07 09:46:52
\.

COPY tb_pegawai_info_bahasa (pi4_idx, pi_no, pi4_bahasa, pi4_nilai_bicara, pi4_nilai_membaca, pi4_nilai_menulis) FROM stdin;
1	IP0001	Inggris	0	0	0
\.

COPY tb_pegawai_info_keluarga (pi1_idx, pi_no, pi1_nama, pi1_umur, pi1_jenis_kelamin, pi1_hubungan, pi1_pendidikan, pi1_pekerjaan) FROM stdin;
1	IP0001	Sukin	40	L	Bapak	SMA	Swasta
\.

COPY tb_pegawai_info_pekerjaan (pi5_idx, pi_no, pi5_nama_perusahaan, pi5_dari, pi5_sampai, pi5_jabatan, pi5_pekerjaan, pi5_gaji) FROM stdin;
1	IP0001	Zonekom	2007-05-01	2008-04-30	\N	Programmer	10000.00
2	IP0001	Indocore Perkasa	2008-05-01	2011-02-27	\N	Programmer	10000.00
\.

COPY tb_pegawai_info_pendidikan_formal (pi2_idx, pi_no, pi2_tingkat, pi2_nama_sekolah, pi2_tahun_lulus, pi2_jurusan, pi2_sertifikat) FROM stdin;
2	IP0001	SMP	SMP Sunan Bonang	2004	\N	\N
3	IP0001	SMK	SMK 1 Tangerang	2007	\N	\N
1	IP0001	SD	SD Kampung Bambu	2001	\N	\N
\.

COPY tb_pegawai_info_pendidikan_informal (pi3_idx, pi_no, pi3_jenis_kursus, pi3_nama_lembaga, pi3_kualifikasi, pi3_tahun) FROM stdin;
1	IP0001	Inggris	LIA	Bahasa Inggris	2007
\.



CREATE TABLE tb_peraturan (
    idx integer NOT NULL,
    ptkp_tk0 numeric(10,2) DEFAULT 0 NOT NULL,
    ptkp_k0 numeric(10,2) DEFAULT 0 NOT NULL,
    ptkp_k1 numeric(10,2) DEFAULT 0 NOT NULL,
    ptkp_k2 numeric(10,2) DEFAULT 0 NOT NULL,
    ptkp_k3 numeric(10,2) DEFAULT 0 NOT NULL,
    pph21_1_dari numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_1_sampai numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_1_persen numeric(5,3) DEFAULT 0 NOT NULL,
    pph21_2_dari numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_2_sampai numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_2_persen numeric(5,3) DEFAULT 0 NOT NULL,
    pph21_3_dari numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_3_sampai numeric(12,2) DEFAULT 0 NOT NULL,
    pph21_3_persen numeric(5,3) DEFAULT 0 NOT NULL,
    pph21_4_dari numeric(14,2) DEFAULT 0 NOT NULL,
    pph21_4_persen numeric(5,3) DEFAULT 0 NOT NULL,
    jamsostek_ditanggung_persen numeric(5,3) DEFAULT 0 NOT NULL,
    jamsostek_dibayar_persen numeric(5,3) DEFAULT 0 NOT NULL,
    jpk_lajang_persen numeric(5,3) DEFAULT 0 NOT NULL,
    jpk_berkeluarga_persen numeric(5,3) DEFAULT 0 NOT NULL,
    biaya_jabatan_1_persen numeric(5,3) DEFAULT 0 NOT NULL,
    biaya_jabatan_2 numeric(8,2) DEFAULT 0 NOT NULL,
    biaya_jabatan_3 numeric(8,2) DEFAULT 0 NOT NULL,
    tunj_jabatan_supervisor numeric(8,2) DEFAULT 0 NOT NULL,
    tunj_jabatan_ass_manager numeric(8,2) DEFAULT 0 NOT NULL,
    tunj_jabatan_manager numeric(8,2) DEFAULT 0 NOT NULL,
    tunj_pengobatan_1 integer DEFAULT 0 NOT NULL,
    tunj_pengobatan_2 integer DEFAULT 0 NOT NULL,
    tunj_pengobatan_3_persen numeric(5,3) DEFAULT 0 NOT NULL,
    staff_ot_kantor_1_1 integer DEFAULT 0 NOT NULL,
    staff_ot_kantor_1_2 numeric(5,3) DEFAULT 0 NOT NULL,
    staff_ot_kantor_2_1 integer DEFAULT 0 NOT NULL,
    staff_ot_kantor_2_2 numeric(5,3) DEFAULT 0 NOT NULL,
    staff_event_sabtu_staff numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_sabtu_supervisor numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_sabtu_ass_manager numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_sabtu_manager numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_libur_staff numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_libur_supervisor numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_libur_ass_manager numeric(8,2) DEFAULT 0 NOT NULL,
    staff_event_libur_manager numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_staff_1 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_staff_2 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_supervisor_1 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_supervisor_2 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_ass_manager_1 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_ass_manager_2 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_manager_1 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_manager_2 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_director_1 numeric(8,2) DEFAULT 0 NOT NULL,
    staff_tunj_luarkota_director_2 numeric(8,2) DEFAULT 0 NOT NULL,
    supir_tunj_makan_siang numeric(8,2) DEFAULT 0 NOT NULL,
    supir_tunj_luarkota_menginap numeric(8,2) DEFAULT 0 NOT NULL,
    supir_tunj_luarkota_tidak_menginap numeric(8,2) DEFAULT 0 NOT NULL,
    supir_tunj_makan_malam numeric(8,2) DEFAULT 0 NOT NULL,
    supir_tunj_makan_malam_dari time without time zone,
    supir_ot_reguler numeric(8,2) DEFAULT 0 NOT NULL,
    supir_ot_reguler_sampai time without time zone,
    supir_ot_malam numeric(8,2) DEFAULT 0 NOT NULL,
    supir_ot_malam_dari time without time zone,
    supir_ot_libur numeric(8,2) DEFAULT 0 NOT NULL,
    spg_ot_tetap_hari integer DEFAULT 0 NOT NULL,
    spg_ot_kontrak numeric(8,2) DEFAULT 0 NOT NULL,
    spg_event_1 numeric(8,2) DEFAULT 0 NOT NULL,
    spg_tunj_pulsa numeric(8,2) DEFAULT 0 NOT NULL,
    spg_tunj_luarkota numeric(8,2) DEFAULT 0 NOT NULL,
    lastupdated_by_account character varying(16) NOT NULL,
    lastupdated_timestamp timestamp without time zone DEFAULT now() NOT NULL
);
ALTER TABLE public.tb_peraturan OWNER TO neki;
CREATE SEQUENCE tb_peraturan_idx_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;
ALTER TABLE public.tb_peraturan_idx_seq OWNER TO neki;
ALTER SEQUENCE tb_peraturan_idx_seq OWNED BY tb_peraturan.idx;



COPY tb_peraturan (idx, ptkp_tk0, ptkp_k0, ptkp_k1, ptkp_k2, ptkp_k3, pph21_1_dari, pph21_1_sampai, pph21_1_persen, pph21_2_dari, pph21_2_sampai, pph21_2_persen, pph21_3_dari, pph21_3_sampai, pph21_3_persen, pph21_4_dari, pph21_4_persen, jamsostek_ditanggung_persen, jamsostek_dibayar_persen, jpk_lajang_persen, jpk_berkeluarga_persen, biaya_jabatan_1_persen, biaya_jabatan_2, biaya_jabatan_3, tunj_jabatan_supervisor, tunj_jabatan_ass_manager, tunj_jabatan_manager, tunj_pengobatan_1, tunj_pengobatan_2, tunj_pengobatan_3_persen, staff_ot_kantor_1_1, staff_ot_kantor_1_2, staff_ot_kantor_2_1, staff_ot_kantor_2_2, staff_event_sabtu_staff, staff_event_sabtu_supervisor, staff_event_sabtu_ass_manager, staff_event_sabtu_manager, staff_event_libur_staff, staff_event_libur_supervisor, staff_event_libur_ass_manager, staff_event_libur_manager, staff_tunj_luarkota_staff_1, staff_tunj_luarkota_staff_2, staff_tunj_luarkota_supervisor_1, staff_tunj_luarkota_supervisor_2, staff_tunj_luarkota_ass_manager_1, staff_tunj_luarkota_ass_manager_2, staff_tunj_luarkota_manager_1, staff_tunj_luarkota_manager_2, staff_tunj_luarkota_director_1, staff_tunj_luarkota_director_2, supir_tunj_makan_siang, supir_tunj_luarkota_menginap, supir_tunj_luarkota_tidak_menginap, supir_tunj_makan_malam, supir_tunj_makan_malam_dari, supir_ot_reguler, supir_ot_reguler_sampai, supir_ot_malam, supir_ot_malam_dari, supir_ot_libur, spg_ot_tetap_hari, spg_ot_kontrak, spg_event_1, spg_tunj_pulsa, spg_tunj_luarkota, lastupdated_by_account, lastupdated_timestamp) FROM stdin;
1	1320000.00	1430000.00	1540000.00	1650000.00	1760000.00	0.00	50000000.00	5.000	50000001.00	250000000.00	15.000	250000001.00	500000000.00	25.000	500000001.00	30.000	2.000	0.540	3.000	6.000	5.000	500000.00	500000.00	0.00	0.00	0.00	1	1	50.000	173	1.500	173	2.000	35000.00	45000.00	50000.00	60000.00	70000.00	90000.00	100000.00	120000.00	60000.00	50000.00	70000.00	60000.00	80000.00	60000.00	100000.00	80000.00	120000.00	100000.00	15500.00	20000.00	30000.00	10000.00	20:30:00	3500.00	23:00:00	12500.00	23:01:00	40000.00	30	0.00	10000.00	25000.00	10000.00	neki	2011-11-24 15:26:13
\.

