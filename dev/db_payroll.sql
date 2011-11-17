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
