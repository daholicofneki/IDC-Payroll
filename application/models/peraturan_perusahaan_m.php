<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Peraturan Model
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
 * Peraturan Class
 *
 * Loads Table
 *
 * @package		CodeIgniter
 * @subpackage	        Model
 * @author              Purwandi <free6300@gmail.com>
 * @category	        Model
 */

class Peraturan_perusahaan_m extends MY_Model {
	
	public function __construct ()
	{
		parent :: __construct ();
		$this->load->helper('number');
		$this->tableName = 'peraturan';
		$this->idx 	= 'idx';
		$this->fields 	= array(
			'tunj_jabatan_supervisor' => array('', TRUE, 'required|strto_decimal'),
			'tunj_jabatan_ass_manager' => array('', TRUE, 'required|strto_decimal'),
			'tunj_jabatan_manager' => array('', TRUE, 'required|strto_decimal'),
			'tunj_pengobatan_1' => array('', TRUE, 'required|strto_decimal'),
			'tunj_pengobatan_2' => array('', TRUE, 'required|strto_decimal'),
			'tunj_pengobatan_3_persen' => array('', TRUE, 'required|strto_decimal'),
			'staff_ot_kantor_1_1' => array('', TRUE, 'required'),
			'staff_ot_kantor_1_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_ot_kantor_2_1' => array('', TRUE, 'required'),
			'staff_ot_kantor_2_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_sabtu_staff' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_sabtu_supervisor' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_sabtu_ass_manager' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_sabtu_manager' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_libur_staff' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_libur_supervisor' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_libur_ass_manager' => array('', TRUE, 'required|strto_decimal'),
			'staff_event_libur_manager' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_staff_1' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_staff_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_supervisor_1' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_supervisor_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_ass_manager_1' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_ass_manager_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_manager_1' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_manager_2' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_director_1' => array('', TRUE, 'required|strto_decimal'),
			'staff_tunj_luarkota_director_2' => array('', TRUE, 'required|strto_decimal'),
			'supir_tunj_makan_siang' => array('', TRUE, 'required|strto_decimal'),
			'supir_tunj_luarkota_menginap' => array('', TRUE, 'required|strto_decimal'),
			'supir_tunj_luarkota_tidak_menginap' => array('', TRUE, 'required|strto_decimal'),
			'supir_tunj_makan_malam' => array('', TRUE, 'required|strto_decimal'),
			'supir_tunj_makan_malam_dari' => array('', TRUE, 'required|strto_decimal'),
			'supir_ot_reguler' => array('', TRUE, 'required|strto_decimal'),
			'supir_ot_reguler_sampai' => array('', TRUE, 'required|strto_decimal'),
			'supir_ot_malam' => array('', TRUE, 'required|strto_decimal'),
			'supir_ot_malam_dari' => array('', TRUE, 'required|strto_decimal'),
			'supir_ot_libur' => array('', TRUE, 'required|strto_decimal'),
			'spg_ot_tetap_hari' => array('', TRUE, 'required'),
			'spg_ot_kontrak' => array('', TRUE, 'required'),
			'spg_event_1' => array('', TRUE, 'required|strto_decimal'),
			'spg_tunj_pulsa' => array('', TRUE, 'required|strto_decimal'),
			'spg_tunj_luarkota' => array('', TRUE, 'required|strto_decimal')
		);
	}
}