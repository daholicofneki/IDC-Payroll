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
			'peraturan_m'
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
		// another data
		$this->params['data'] = $this->peraturan_m->get();

		// call parent class function
		//return parent :: index ('');
		$this->_view('main_1_3', 'regulation');
	}
}
/* End class setup */
/* Location ./application/controllers/regulation/setup.php */