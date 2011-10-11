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

class Employee extends MY_Controller {

	public $module = 'employee';
	
	
	/**
	 * Constructor
	 *
	 */
	
	public function __construct ()
	{
		parent :: __construct ();
		
		// load model
		$this->load->model('employee_m');
	}
	
	/**
	 * Extending _view function
	 * 
	 * @access 	protected
	 * @param 	string
	 * @return	parent class
	 */
	
	/**
	 *  karena pada function _view di class MY_Controller ada variabelnya
	 *  maka function turunanya juga harus ada valiabelnya juga
	 *
	 *  apabila tidak ada yang di extends lebih baik function _view di class
	 *  ini di hapus saja
	 */
	
	protected function _view ($template = 'main_1_3', $actions = 'main')
	{
		// call javascript on class
		//$this->template->prepend_metadata('');
		
		return parent :: _view ($template, $actions);
	}
	
	
	/**
	 * Jika memiliki index yang di modifikasi
	 *
	 * @access	public
	 * @return	parent class function
	 */
	
	public function index ()
	{
		
		// anothe data
		$this->params['data'] = $this->employee_m->get();
		
		// call parent class function
		return parent :: index ('');
	}
	
	public function add_new_employee ()
	{
		
		// get labels from database table employee
		$this->params['labels'] = $this->employee_m->getLabels();
		$this->params['data']=(object) array ('pi_no'=>$this->employee_m->get_new_id());
		
		if ($this->input->post('save'))
		{
			// cek validation sesuaid dengan field yang di employee model
			if ($this->employee_m->isValid())
			{
				// save data
				if ($this->employee_m->save())
				{
					setSucces('Data is saved');
					redirect ($this->module.'/edit_employee/'.$this->input->post('emp_idx'));
				}
				else
				{
					setError('Unable to save');
				}
			}
		}
		
		$this->_view('main_1_3', 'form');
	}

	public function edit_employee ( $id = FALSE )
	{
		// cek id apakah ada di dalam record
		if ($id AND $this->employee_m->get($id))
		{
			if ($this->input->post('save'))
			{
				// cek validation sesuaid dengan field yang di employee model
				if ($this->employee_m->isValid())
				{
					// save data
					if ($this->employee_m->save($id))
					{
						setSucces('Data is edited');
					}
					else
					{
						setError('Unable to save');
					}
				}
			}
			
			//print_r($this->employee_m->get($id));
			$this->params['data'] = $this->employee_m->get($id);
			$this->params['labels'] = $this->employee_m->getLabels();
			
			$this->_view('main_1_3', 'form');
		}
		else
		{
			redirect ($this->module.'/index');
		}
	}

}