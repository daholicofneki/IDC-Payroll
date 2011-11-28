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
			'ptkp_tk0' => array('PTKP TK0', TRUE, 'decimal'),
			'ptkp_k0' => array('PTKP K0', TRUE, 'decimal'),
			'ptkp_k1' => array('PTKP K1', TRUE, 'decimal'),
			'ptkp_k2' => array('PTKP K2', TRUE, 'decimal'),
			'ptkp_k3' => array('PTKP K3', TRUE, 'decimal'),

			'pph21_1_dari' => array('PPH 21 dari', TRUE, 'decimal'),
			'pph21_1_sampai' => array('PPH 21 sampai', TRUE, 'decimal'),
			'pph21_1_persen' => array('Persentase PPH 21', TRUE, 'decimal'),
			'pph21_2_dari' => array('PPH 21 dari', TRUE, 'decimal'),
			'pph21_2_sampai' => array('PPH 21 sampai', TRUE, 'decimal'),
			'pph21_2_persen' => array('Persentase PPH 21', TRUE, 'decimal'),
			'pph21_3_dari' => array('PPH 21 dari', TRUE, 'decimal'),
			'pph21_3_sampai' => array('PPH 21 sampai', TRUE, 'decimal'),
			'pph21_3_persen' => array('Persentase PPH 21', TRUE, 'decimal'),
			'pph21_4_dari' => array('PPH 21 dari', TRUE, 'decimal'),
			'pph21_4_persen' => array('Persentase PPH 21', TRUE, 'decimal'),

			'jamsostek_ditanggung_persen' => array('Jamsostek ditanggung', TRUE, 'decimal'),
			'jamsostek_dibayar_persen' => array('Jamsostek dibayar', TRUE, 'decimal'),
			'jpk_lajang_persen' => array('JPK Lajang', TRUE, 'decimal'),
			'jpk_berkeluarga_persen' => array('JPK Berkeluarga', TRUE, 'decimal'),
			'biaya_jabatan_1_persen' => array('Biaya jabatan', TRUE, 'decimal'),
			'biaya_jabatan_2' => array('Biaya jabatan', TRUE, 'decimal'),
			'biaya_jabatan_3' => array('Biaya jabatan', TRUE, 'decimal')
		);
	}
}