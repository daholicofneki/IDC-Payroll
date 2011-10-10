<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Employee Model
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author              NDI-SOFTWARE DEVELOPMENT TEAM
 * @author              Purwandi <free6300@gmail.com>
 * @since		CodeIgniter Version 2.0
 * @filesource
 */

/**
 * Employee Class
 *
 * Loads Table
 *
 * @package		CodeIgniter
 * @subpackage	        Model
 * @author              Purwandi <free6300@gmail.com>
 * @category	        Model
 */

class Employee_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'karyawan';
		$this->idx 	= 'pi_no';
		$this->fields 	= array(
			'pi_no' => array('NIK', TRUE, 'required'),
			'pi_nama_lengkap' => array('Nama Lengkap', TRUE, 'required'),
			'pi_nama_kecil' => array('Nickname', TRUE, 'required'),
			'pi_jenis_kelamin' => array('Jenis Kelamin', TRUE, 'required'),
			'pi_tempat_lahir' => array('Tempat Lahir', TRUE, 'required'),
			'pi_tanggal_lahir ' => array('Tanggal Lahir', TRUE, 'required'),

			'pi_no_telepon1' => array ('No Telepon 1', FALSE),
			'pi_no_telepon2' => array ('No Telepon 2', FALSE),
			'pi_email' => array ('Email', TRUE, 'required|valid_email'),
			'pi_alamat' => array('Alamat', TRUE, 'required'),
			
			'pi_status_nikah' => array ('Status Pernikahan', TRUE, 'required'),
			'pi_jumlah_anak' => array ('Jumlah Anak', TRUE, 'required|is_natural'),
			'pi_kewarganegaraan' => array ('Kewarganegaraan', TRUE, 'required'),
			'pi_suku' => array ('Suku', TRUE),

			'pi_no_ktp' => array ('No KTP', FALSE),
			'pi_no_sim' => array ('NO SIM', FALSE),
			'pi_no_jamsostek' => array ('NO Jamsostek', FALSE),
			'pi_status_pajak' => array ('Status Pajak', TRUE, 'required'),
			'pi_npwp' => array ('NO NPWP', TRUE, 'required'),
			'pi_foto' => array ('Path Poto', TRUE),

			//'pi_lastupdated_by_account' => array ('Last Updated by Account', TRUE, 'required'),
			//'pi_lastupdated_timestamp' => array ('Last Updated Timestamp', TRUE, 'required')
		);
	}
	
	public function save ($idx = FALSE)
	{
		$this->db->set('pi_lastupdated_by_account','daholicofneki');
		$this->db->set('pi_lastupdated_timestamp',now());
		return parent :: save ($idx);
		
	}

	public function get_new_id ()
	{
		$this->db->select('MAX(pi_no)');
		$max_record = $this->one($this->tableName);
		$INIT = substr ($max_record, 0, 2);
		$ID = substr ($max_record, 2, 4);
		if ($INIT == 'IP')
		{
			return $YM.str_pad($ID+1, 4, "0", STR_PAD_LEFT);
		}
		else
		{
			return 'IP0001';	
		}
	}
}