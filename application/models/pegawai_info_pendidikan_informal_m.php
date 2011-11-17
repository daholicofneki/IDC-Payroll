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

class Pegawai_info_pendidikan_informal_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'pegawai_info_pendidikan_informal';
		$this->idx 	= 'pi3_idx';
		$this->fields 	= array(
			'pi3_jenis_kursus' => array('Jenis Kursus', TRUE),
			'pi3_nama_lembaga' => array('Nama Lembaga', TRUE),
			'pi3_kualifikasi' => array('Kualifikasi'),
			'pi3_tahun' => array('Tahun', TRUE),
		);
	}

	public function save ($idx, $pi_no)
	{
		$this->db->set('pi_no', $pi_no);
		return parent :: save ($idx);	
	}

	public function get_info_pendidikan_informal ($pi_no)
	{
		$this->db->where('pi_no', $pi_no);
		$this->db->order_by('pi3_tahun DESC');
		return parent :: get ();
	}

}