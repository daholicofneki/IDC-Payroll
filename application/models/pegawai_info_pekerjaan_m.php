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

class Pegawai_info_pekerjaan_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'pegawai_info_pekerjaan';
		$this->idx 	= 'pi5_idx';
		$this->fields 	= array(
			'pi5_nama_perusahaan' => array('Nama Perusahaan', TRUE),
			'pi5_dari' => array('Dari', TRUE),
			'pi5_sampai' => array('Sampai', TRUE),
			'pi5_jabatan' => array('Jabatan', TRUE),
			'pi5_pekerjaan' => array('Pekerjaan', TRUE),
			'pi5_gaji' => array('Gaji', TRUE)
		);
	}

	public function save ($idx, $pi_no)
	{
		$this->db->set('pi_no', $pi_no);
		return parent :: save ($idx);	
	}

	public function get_info_pekerjaan ($pi_no)
	{
		$this->db->where('pi_no', $pi_no);
		$this->db->order_by('pi5_sampai DESC, pi5_dari DESC');
		return parent :: get ();
	}

}