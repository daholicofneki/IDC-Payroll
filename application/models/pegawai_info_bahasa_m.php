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

class Pegawai_info_bahasa_m extends MY_Model {

	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'pegawai_info_bahasa';
		$this->idx 	= 'pi4_idx';
		$this->fields 	= array(
			'pi4_bahasa' => array('Bahasa', TRUE),
			'pi4_nilai_bicara' => array('Nilai Bicara'),
			'pi4_nilai_membaca' => array('Nilai Membaca'),
			'pi4_nilai_menulis' => array('Nilai Menulis'),
		);
	}

	public function save ($idx, $pi_no)
	{
		$this->db->set('pi_no', $pi_no);
		return parent :: save ($idx);	
	}

	public function get_info_bahasa ($pi_no)
	{
		$this->db->where('pi_no', $pi_no);
		$this->db->order_by('pi4_bahasa');
		return parent :: get ();
	}

}