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
			'pi1_umur' => array('Umur', TRUE),
			'pi1_hubungan' => array('Hubungan Keluarga', TRUE, 'required'),
			'pi1_pendidikan' => array('Pendidikan', TRUE),
			'pi1_pekerjaan' => array('Pekerjaan', TRUE)
		);
	}
	
	/**
	 * Save method
	 *
	 * @access	public
	 * @param	integer
	 * @return	boolean
	 */
	public function save ($idx = FALSE)
	{
		return parent :: save ($idx);	
	}

}