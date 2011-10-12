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
	pi_no character(7) NOT NULL,
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

UPDATE tb_pegawai SET
pi_keluarga =
    ARRAY[
    ['Sukin', 'Laki-laki', '40', 'Bapak', 'SMA','Karyawan Swasta'],
    ['Rusmini', 'Perempuan', '40', 'Ibu', 'SMA',''],
    ['Nur Hena', 'Perempuan', '10', 'Saudara', 'SD','Pelajar']],
pi_pendidikan_formal =
    ARRAY[
    ['SD','SD Kampung Bambu', '2001', '',''],
    ['SMP','SMP Sunan Bonang', '2004', '',''],
    ['SMA','SMKN 1 Tangerang', '2007', '','']],
pi_pendidikan_informal =
    null,
pi_bahasa =
    ARRAY[
    ['Bahasa Indonesia','5','5','5'],
    ['Bahasa Inggris','3','3','3']
    ],
pi_riwayat_pekerjaan = 
    ARRAY[
    ['PT. Zonekom','2007','2008','Jr. Programmer','','10000']
    ]
WHERE pi_no = 'IP0001' ;

select * from  tb_pegawai where pi_no = 'IP0001' ;

