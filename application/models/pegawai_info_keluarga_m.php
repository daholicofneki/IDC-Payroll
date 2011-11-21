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

class Pegawai_info_keluarga_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'pegawai_info_keluarga';
		$this->idx 	= 'pi1_idx';
		$this->fields 	= array(
			'pi1_nama' => array('Nama', TRUE, 'required'),
			'pi1_jenis_kelamin' => array('Jenis Kelamin', TRUE, 'required'),
			'pi1_umur' => array('Umur', TRUE, 'required'),
			'pi1_hubungan' => array('Hubungan Keluarga', TRUE, 'required'),
			'pi1_pendidikan' => array('Pendidikan'),
			'pi1_pekerjaan' => array('Pekerjaan')
		);
	}

	public function save ($idx, $pi_no)
	{
		$this->db->set('pi_no', $pi_no);
		return parent :: save ($idx);	
	}

	public function get_info_keluarga ($pi_no)
	{
		$this->db->where('pi_no', $pi_no);
		$this->db->order_by('pi1_umur DESC');
		return parent :: get ();
	}

	public function get_info_keluarga_idx ($idx)
	{
		$this->db->where('pi1_idx', $idx);
		return parent :: get ();
	}
}