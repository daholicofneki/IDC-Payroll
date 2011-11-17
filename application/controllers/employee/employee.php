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

	public $module = 'employee/employee';

	/**
	 * Constructor
	 *
	 */
	public function __construct ()
	{
		parent :: __construct ();

		$this->load->model('employee_m');
		$this->load->model(array('employee_m','pegawai_info_keluarga_m'));
		$this->load->model(array('employee_m','pegawai_info_pendidikan_formal_m'));
		$this->load->model(array('employee_m','pegawai_info_pendidikan_informal_m'));
		$this->load->model(array('employee_m','pegawai_info_bahasa_m'));
		$this->load->model(array('employee_m','pegawai_info_pekerjaan_m'));
	}
	
	/**
	 * Jika memiliki index yang di modifikasi
	 *
	 * @access	public
	 * @return	parent class function
	 */
	public function index ()
	{
		// another data
		$this->params['data'] = $this->employee_m->get();

		// call parent class function
		//return parent :: index ('');
		$this->_view('main_1_3', 'employee');
	}
	
	/**
	 * Add New Employee
	 *
	 * @access	public
	 * @return	array
	 */
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

		$this->_view('main_1_3', 'employee_add');
	}

	/**
	 * Edit Employee
	 *
	 * @access	public
	 * @param 	string
	 * @return	array
	 */
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
			$this->params['data']		= $this->employee_m->get($id);
			$this->params['labels']		= $this->employee_m->getLabels();

			$this->params['info'][0]	= $this->pegawai_info_keluarga_m->get_info_keluarga($id);
			$this->params['info'][1]	= $this->pegawai_info_pendidikan_formal_m->get_info_pendidikan_formal($id);
			$this->params['info'][2]	= $this->pegawai_info_pendidikan_informal_m->get_info_pendidikan_informal($id);
			$this->params['info'][3]	= $this->pegawai_info_bahasa_m->get_info_bahasa($id);
			$this->params['info'][4]	= $this->pegawai_info_pekerjaan_m->get_info_pekerjaan($id);

			$this->_view('main_1_3', 'employee_edit');
		}
		else
		{
			redirect ($this->module.'/index');
		}
	}

	public function more_info ($id, $form)
	{
		$this->params['form']=$this->input->get('form');
		$this->_view('main_blank', 'employee_more_info');
	}

}
/* End class employee */
/* Location ./application/controllers/employee.php */