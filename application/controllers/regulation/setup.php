<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Employee Controller
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
 * MY Controller Class
 *
 * Loads Table
 *
 * @package		CodeIgniter
 * @subpackage	        Controller
 * @author              Purwandi <free6300@gmail.com>
 * @category	        Model
 */

class Setup extends MY_Controller {

        public $module = array('regulation/setup', 'regulation', 'setup');

        /**
	 * Constructor
	 *
	 */
	public function __construct ()
	{
		parent :: __construct ();

		$this->load->model(array(
			'peraturan_pemerintah_m',
			'peraturan_perusahaan_m',
		));
	}

        /**
	 * Index
	 *
	 * @access	public
	 * @return	parent class function
	 */
	public function index ()
	{
		$this->_view('main_1_3', 'index');
	}

	public function pemerintah ()
	{
                $this->params['data'] = $this->peraturan_pemerintah_m->get(1);
		$this->_view('main_1_3', 'pemerintah');
	}

	public function pemerintah_edit ($id = 1)
	{
		if ($this->input->post('save'))
		{
			if ($this->peraturan_pemerintah_m->isValid())
			{
				if ($this->peraturan_pemerintah_m->save($id))
				{
					setSucces('Data is edited');
				}
				else
				{
					setError('Unable to save');
				}
			}
		}
		$this->params['data'] = $this->peraturan_pemerintah_m->get(1);
		$this->_view('main_1_3', 'pemerintah_edit');
	}

	public function perusahaan ()
	{
		$this->params['data'] = $this->peraturan_perusahaan_m->get(1);
		$this->_view('main_1_3', 'perusahaan');
	}

	public function perusahaan_edit ($id = 1)
	{
		if ($this->input->post('save'))
		{
			if ($this->peraturan_perusahaan_m->isValid())
			{
				if ($this->peraturan_perusahaan_m->save($id))
				{
					setSucces('Data is edited');
				}
				else
				{
					setError('Unable to save');
				}
			}
		}
		$this->params['data'] = $this->peraturan_perusahaan_m->get(1);
		$this->_view('main_1_3', 'perusahaan_edit');
	}

}
/* End class setup */
/* Location ./application/controllers/regulation/setup.php */