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

class Pegawai_info_pendidikan_formal_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'pegawai_info_pendidikan_formal';
		$this->idx 	= 'pi2_idx';
		$this->fields 	= array(
			'pi2_tingkat' => array('Tingkat', TRUE),
			'pi2_nama_sekolah' => array('Nama Sekolah', TRUE),
			'pi2_tahun_lulus' => array('Tahun Lulus', TRUE),
			'pi2_jurusan' => array('Jurusan'),
			'pi2_sertifikat' => array('Sertifikat'),
		);
	}

	public function save ($idx, $pi_no)
	{
		$this->db->set('pi_no', $pi_no);
		return parent :: save ($idx);	
	}

	public function get_info_pendidikan_formal ($pi_no)
	{
		$this->db->where('pi_no', $pi_no);
		$this->db->order_by('pi2_tahun_lulus DESC');
		return parent :: get ();
	}

}