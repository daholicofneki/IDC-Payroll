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

class Peraturan_m extends MY_Model {
	
	public function __construct ()
	{
		parent :: __construct ();
		$this->tableName = 'peraturan';
		$this->idx 	= 'idx';
		$this->fields 	= array(
			'ptkp_tk0' => array('PTKP TK0', TRUE),
			'ptkp_k0' => array('PTKP K0', TRUE),
			'ptkp_k1' => array('PTKP K1', TRUE),
			'ptkp_k2' => array('PTKP K2', TRUE),
			'ptkp_k3' => array('PTKP K3', TRUE),

			'pph21_1_dari' => array('PPH 21 1 dari', TRUE),
			'pph21_1_sampai' => array('PPH 21 1 sampai', TRUE),
			'pph21_1_persen' => array('Persentase PPH 21 1', TRUE, 'decimal'),
			'pph21_2_dari' => array('PPH 21 2 dari', TRUE),
			'pph21_2_sampai' => array('PPH 21 2 sampai', TRUE),
			'pph21_2_persen' => array('Persentase PPH 21 2', TRUE, 'decimal'),
			'pph21_3_dari' => array('PPH 21 3 dari', TRUE),
			'pph21_3_sampai' => array('PPH 21 3 sampai', TRUE),
			'pph21_3_persen' => array('Persentase PPH 21 3', TRUE, 'decimal'),
			'pph21_4_dari' => array('PPH 21 4 dari', TRUE),
			'pph21_4_persen' => array('Persentase PPH 21 4', TRUE, 'decimal'),

			'jamsostek_ditanggung_persen' => array('Jamsostek ditanggung', TRUE, 'decimal'),
			'jamsostek_dibayar_persen' => array('Jamsostek dibayar', TRUE, 'decimal'),
			'jpk_lajang_persen' => array('JPK Lajang', TRUE, 'decimal'),
			'jpk_berkeluarga_persen' => array('JPK Berkeluarga', TRUE, 'decimal'),
			'biaya_jabatan_1_persen' => array('Biaya jabatan', TRUE, 'decimal'),
			'biaya_jabatan_2' => array('Biaya jabatan', TRUE),
			'biaya_jabatan_3' => array('Biaya jabatan', TRUE)
		);
	}

	public function save ($idx = FALSE)
	{
		$this->db->set('ptkp_tk0', str_replace(",","",$this->input->post('ptkp_tk0')));
		$this->db->set('ptkp_k0', str_replace(",","",$this->input->post('ptkp_k0')));
		$this->db->set('ptkp_k1', str_replace(",","",$this->input->post('ptkp_k1')));
		$this->db->set('ptkp_k2', str_replace(",","",$this->input->post('ptkp_k2')));
		$this->db->set('ptkp_k3', str_replace(",","",$this->input->post('ptkp_k3')));
		$this->db->set('pph21_1_dari', str_replace(",","",$this->input->post('pph21_1_dari')));
		$this->db->set('pph21_1_sampai', str_replace(",","",$this->input->post('pph21_1_sampai')));
		$this->db->set('pph21_1_persen', str_replace(",","",$this->input->post('pph21_1_persen')));
		$this->db->set('pph21_2_dari', str_replace(",","",$this->input->post('pph21_2_dari')));
		$this->db->set('pph21_2_sampai', str_replace(",","",$this->input->post('pph21_2_sampai')));
		$this->db->set('pph21_2_persen', str_replace(",","",$this->input->post('pph21_2_persen')));
		$this->db->set('pph21_3_dari', str_replace(",","",$this->input->post('pph21_3_dari')));
		$this->db->set('pph21_3_sampai', str_replace(",","",$this->input->post('pph21_3_sampai')));
		$this->db->set('pph21_3_persen', str_replace(",","",$this->input->post('pph21_3_persen')));
		$this->db->set('pph21_4_dari', str_replace(",","",$this->input->post('pph21_4_dari')));
		$this->db->set('pph21_4_persen', str_replace(",","",$this->input->post('pph21_4_persen')));
		$this->db->set('jamsostek_ditanggung_persen', str_replace(",","",$this->input->post('jamsostek_ditanggung_persen')));
		$this->db->set('jamsostek_dibayar_persen', str_replace(",","",$this->input->post('jamsostek_dibayar_persen')));
		$this->db->set('jpk_lajang_persen', str_replace(",","",$this->input->post('jpk_lajang_persen')));
		$this->db->set('jpk_berkeluarga_persen', str_replace(",","",$this->input->post('jpk_berkeluarga_persen')));
		$this->db->set('biaya_jabatan_1_persen', str_replace(",","",$this->input->post('biaya_jabatan_1_persen')));
		$this->db->set('biaya_jabatan_2', str_replace(",","",$this->input->post('biaya_jabatan_2')));
		$this->db->set('biaya_jabatan_3', str_replace(",","",$this->input->post('biaya_jabatan_3')));
		return parent :: save ($idx);	
	}
}