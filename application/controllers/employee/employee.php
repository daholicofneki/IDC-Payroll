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

		$this->load->model(array(
			'employee_m',
			'pegawai_info_keluarga_m',
			'pegawai_info_pendidikan_formal_m',
			'pegawai_info_pendidikan_informal_m',
			'pegawai_info_bahasa_m',
			'pegawai_info_pekerjaan_m'
		));
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
	
	/**
	 * Get Ajax data Tabel
	 *
	 * @access	public
	 * @param	char		pi_no
	 * @param 	string		form
	 * @return	void
	 */
	public function employee_edit_ajax ($id = FALSE, $form_id = FALSE)
	{
		if ($id AND $this->employee_m->get($id))
		{
			if ( $form_id == 'form-2')
			{
				$data = $this->pegawai_info_keluarga_m->get_info_keluarga($id);

				echo '<tbody id="info2">';
					if ( $data ):
						foreach ($data as $item):
						$item->pi1_jenis_kelamin = ($item->pi1_jenis_kelamin == 'L') ? 'Laki-laki':'Perempuan';
						echo "<tr>\n";
							echo "\t<td>". $item->pi1_nama ."</td>\n";
							echo "\t<td align=\"right\">". $item->pi1_umur ."</td>\n";
							echo "\t<td>". $item->pi1_jenis_kelamin ."</td>\n";
							echo "\t<td>". $item->pi1_hubungan . "</td>\n";
							echo "\t<td>". $item->pi1_pendidikan . "</td>\n";
							echo "\t<td>". $item->pi1_pekerjaan . "</td>\n";
							echo "\t<td>". anchor($this->module.'/more_info/'.@$item->pi_no.'/'.$item->pi1_idx.'/1?height=400&width=320&modal=true&form=1','+', 'class="thickbox"')."</td>\n";
						echo "</tr>\n";
						endforeach;
					else:
						echo "<tr>\n
							<td>There is no data yet</td>\n
						      </tr>\n";
					endif;
				echo '</tbody>';
			}
			else if ( $form_id == 'form-3')
			{
				$data = $this->pegawai_info_pendidikan_formal_m->get_info_pendidikan_formal($id);

				echo '<tbody id="info3">';
					if ( $data ):
						foreach ($data as $item):
						echo "<tr>\n";
							echo "\t<td>". $item->pi2_tingkat ."</td>\n";
							echo "\t<td>". $item->pi2_nama_sekolah ."</td>\n";
							echo "\t<td>". $item->pi2_tahun_lulus ."</td>\n";
							echo "\t<td>". $item->pi2_jurusan ."</td>\n";
							echo "\t<td>". $item->pi2_sertifikat ."</td>\n";
							echo "\t<td>". anchor($this->module.'/more_info/'.@$item->pi_no.'/'.$item->pi2_idx.'/1?height=400&width=320&modal=true&form=2','+', 'class="thickbox"'). "</td>\n";
						echo "</tr>\n";
						endforeach;
					else:
						echo "<tr>\n
							<td>There is no data yet</td>\n
						      </tr>\n";
					endif;
				echo '</tbody>';
			}
			else if ( $form_id == 'form-4')
			{
				$data = $this->pegawai_info_pendidikan_informal_m->get_info_pendidikan_informal($id);

				echo '<tbody id="info4">';
					if ( $data ):
						foreach ($data as $item):
						echo "<tr>";
							echo "\t<td>". $item->pi3_jenis_kursus ."</td>\n";
							echo "\t<td>". $item->pi3_nama_lembaga ."</td>\n";
							echo "\t<td>". $item->pi3_kualifikasi ."</td>\n";
							echo "\t<td>". $item->pi3_tahun ."</td>\n";
							echo "\t<td>". anchor($this->module.'/more_info/'.@$item->pi_no.'/'.$item->pi3_idx.'/1?height=400&width=320&modal=true&form=3','+', 'class="thickbox"') ."</td>\n";
						echo "</tr>";
						endforeach;
					else:
						echo "<tr>\n
							<td>There is no data yet</td>
						      </tr>";
					endif;
				echo '</tbody>';
			}
			else if ( $form_id == 'form-5')
			{
				$data = $this->pegawai_info_bahasa_m->get_info_bahasa($id);

				echo '<tbody id="info5">';
					if ( $data ):
						foreach ($data as $item):
						echo "<tr>";
							echo "\t<td>". $item->pi4_bahasa ."</td>\n";
							echo "\t<td>". $item->pi4_nilai_bicara ."</td>\n";
							echo "\t<td>". $item->pi4_nilai_membaca ."</td>\n";
							echo "\t<td>". $item->pi4_nilai_menulis ."</td>\n";
							echo "\t<td>". anchor($this->module.'/more_info/'.@$item->pi_no.'/'.$item->pi4_idx.'/1?height=400&width=320&modal=true&form=4','+', 'class="thickbox"') ."</td>\n";
						echo "</tr>";
						endforeach;
					else:
						echo "<tr>\n
							<td>There is no data yet</td>
						      </tr>";
					endif;
				echo '</tbody>';
			}
			else if ( $form_id == 'form-6')
			{
				$data = $this->pegawai_info_pekerjaan_m->get_info_pekerjaan($id);

				echo '<tbody id="info6">';
					if ( $data ):
						foreach ($data as $item):
						echo "<tr>";
							echo "\t<td>". $item->pi5_nama_perusahaan."</td>\n";
							echo "\t<td>". $item->pi5_dari ."</td>\n";
							echo "\t<td>". $item->pi5_sampai ."</td>\n";
							echo "\t<td>". $item->pi5_jabatan ."</td>\n";
							echo "\t<td>". $item->pi5_pekerjaan ."</td>\n";
							echo '<td>Rp. '. $item->pi5_gaji ."</td>\n";
							echo "\t<td>". anchor($this->module.'/more_info/'.@$item->pi_no.'/'.$item->pi5_idx.'/1?height=400&width=320&modal=true&form=5','+', 'class="thickbox"') ."</td>\n";
						echo "</tr>";
						endforeach;
					else:
						echo "<tr>\n
							<td>There is no data yet</td>
						      </tr>";
					endif;
				echo '</tbody>';
			}
		}
	}

	/**
	 * Add new / edit more detail employee
	 *
	 * @access	public
	 * @param	char		pi_no
	 * @param 	integer		form
	 * @param 	integer		idx
	 * @return	void
	 */
	public function more_info ($pi_no = FALSE, $form = FALSE, $idx = FALSE)
	{
		if ($this->employee_m->getValue('pi_no', $pi_no))
		{
			if ( $form == '2')
			{
				$model[0] = 'pi1_idx';
				$model[1] = 'pegawai_info_keluarga_m';
			}
			elseif ( $form == '3')
			{
				$model[0] = 'pi2_idx';
				$model[1] = 'pegawai_info_pendidikan_formal_m';
			}
			elseif ( $form == '4')
			{
				$model[0] = 'pi3_idx';
				$model[1] = 'pegawai_info_pendidikan_informal_m';
			}
			elseif ( $form == '5')
			{
				$model[0] = 'pi4_idx';
				$model[1] = 'pegawai_info_bahasa_m';
			}
			elseif ( $form == '6')
			{
				$model[0] = 'pi5_idx';
				$model[1] = 'pegawai_info_pekerjaan_m';
			}

			if ($_POST)
			{
				if ($this->$model[1]->isValid())
				{
					if ($idx AND $this->$model[1]->getValue($model[0],$idx))
					{
						if ($this->$model[1]->save($idx,$pi_no))
						{
							echo json_encode(array('status'=>'1', 'text'=> 'Unable to edited'));
						}
						else
						{
							echo json_encode(array('status'=>'2', 'text'=> 'Unable to save data'));
						}
					}
					else
					{
						if ($this->$model[1]->save('',$pi_no))
						{
							echo json_encode(array('status'=>'1', 'text'=> 'Data is saved'));
						}
						else
						{
							echo json_encode(array('status'=>'2', 'text'=> 'Unable to save data'));
						}
					}
				}
				else
				{
					echo json_encode(array('status'=>'2', 'text'=> showErrors ()));
				}
			}
			else
			{
				$this->params['data']	= $this->$model[1]->get($idx, $model[0]);
				$this->params['labels']	= $this->$model[1]->getLabels();
				$this->params['form'] = $this->input->get('form');
				$this->_view('main_blank', 'employee_more_info');
			}
		}
	}

}
/* End class employee */
/* Location ./application/controllers/employee.php */