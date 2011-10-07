<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
// Extending Form_Helper
//

/**
 * Form Radio
 *
 * @param   String      Nama dari radio
 * @param   Array       Nilai dari radio array ('laki-laki'=>'Laki - Laki','perempuan'=>'Perempuan')
 * @param   String      Value dari checbox
 * @return  String
 *
 */

// ------------------------------------------------------
// Contoh menggunakan
// <?php echo form_radios ('jenis_kelamin',array ('laki-laki'=>'Laki - Laki','perempuan'=>'Perempuan','banci'=>'Bencong'),'perempuan')
//

function form_radios($key,$values,$value=FALSE)
{		
	if($values)
	{
		$radios = array();
		foreach ($values as $item=>$label)
		{
			//print_r($v);
			$arr = array(
				'name' => $key,
				'id' => $key.'_'.$item,
				'value' => $item,
				'checked' => set_value($key,$value) == $item
			);
		    
				// memanggil form_radio dari form_helper	 
			 $radios[] = form_radio($arr).' '.form_label($label,$arr['id']);
		}
			   
		// return implode
		return implode(' &nbsp; ',$radios);
	}
	else return '--options empty--';
		
}


/**
 * Form Checkbox
 *
 * @param   String      Nama dari radio
 * @param   Array       Nilai dari radio array ('laki-laki'=>'Laki - Laki','perempuan'=>'Perempuan')
 * @param   String      Value dari checbox
 * @return  String
 *
 */

// ------------------------------------------------------
// Contoh menggunakan
// <?php echo form_radios ('jenis_kelamin',array ('laki-laki'=>'Laki - Laki','perempuan'=>'Perempuan','banci'=>'Bencong'),'perempuan')
//

function form_checkboxes($key,$values,$value=FALSE)
{		
	if($values)
	{
		$checkbox = array();
		foreach ($values as $item=>$label)
		{
			$arr = array(
				'name' => $key.'[]',
				'id' => $key.'_'.$item,
				'value' => $item,
				'checked' => set_value($key,$value) == $item
			);
			
			// memanggil form_radio dari form_helper	 
			$checkbox[] = form_checkbox($arr).' '.form_label($label,$arr['id']);
		}
			       
		// return implode
		return implode(' &nbsp ',$checkbox);
	}
	else return '--options empty--';
		
}


// ------------------------------------------------------------------------

/**
 * showErrors
 *
 * Show the error of the form validations
 *
 * @access	public
 * @return	object
 */

if ( ! function_exists('showErrors'))
{
	function showErrors()
	{
		$post = '';
		
		foreach(array_keys($_POST) as $key)
		{
			$post .= form_error($key," ","\n");
		}
		return $post;
	}
}

// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

if ( ! function_exists('setError'))
{
	function setError($message)
	{	
		$CI = &get_instance();
		$CI->session->set_userdata('errorMessage', $message);
	}
}



// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

if ( ! function_exists('setSucces'))
{
	function setSucces($message)
	{	
		$CI = &get_instance();
		$CI->session->set_userdata('succesMessage', $message);
	}
}



// ------------------------------------------------------------------------

/**
 * View Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

if ( ! function_exists('view_errors'))
{

	function view_errors($errorMessage=false)
	{
		if (validation_errors())
		{
		    echo '<div class="error">';
		    echo validation_errors();
		    echo '</div>';
		}
		
		if ($errorMessage)
		{
			echo '<div class="error">'.$errorMessage.'</div>';
			return false;
		}
		
		$CI = &get_instance();
		
		$err = $CI->session->userdata('errorMessage');
		if($err) echo '<div class="error">'.$err.'</div>';
		$CI->session->unset_userdata('errorMessage');
		
		$succ = $CI->session->userdata('succesMessage');
		if($succ) echo '<div class="success">'.$succ.'</div>';
		$CI->session->unset_userdata('succesMessage');
	}
}

// ------------------------------------------------------------------------

/**
 * Form auth
 *
 * Get input form auth of the form validations
 *
 * @access	public
 * @return	object
 */

if ( ! function_exists('form_auth'))
{
	function form_auth (){
		echo '<input type="hidden" name="form_auth" id="form_auth" value="'.md5(date_to_m()).'"/>';
	}
}

// ------------------------------------------------------------------------

/**
 * Get Post Array
 *
 * Get input form auth of the form validations
 *
 * @access	public
 * @param   array 
 * @return	object
 */

if ( ! function_exists('getPosts'))
{
	function getPosts($var){
		$post = array();
		$CI = &get_instance();
		    
		foreach($var as $v)
		{
		      $post[$v] = $CI->db->escape_str($CI->input->get_post($v, TRUE));
		}
		return $post;
	}
}

// ------------------------------------------------------------------------

/**
* Form Input Type
*
* Create an html5 input field.
*
* @access public
* @param mixed string $type The input type or array of values
* @param string $data The input name
* @param string $value The input value
* @param string $extra Any extra attributes
*/
if ( ! function_exists('form_input_type'))
{
	function form_input_type($type = '', $data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => (( ! empty($type)) ? $type : 'text'),
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);
		
		return "<input "._parse_form_attributes($type, $defaults).$extra." />";
	}
}

// ------------------------------------------------------------------------

/**
* Form Input Range
*
* Create an html5 input range field.
*
* @access public
* @param string $data The input name
* @param string $min The min value
* @param string $max The max value
* @param string $step The step value
* @param string $value The input value
* @param string $extra Any extra attributes
*/
if ( ! function_exists('form_input_range'))
{
	function form_input_range($data = '', $min = 0, $max = 0, $step = 0, $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'time',
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);
		
		$extra = 'min="'.$min.'" max="'.$max.'" step="'.$step.'" '.$extra;
		
		return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}

// ------------------------------------------------
/* End of file MY_form_helper.php */
/* Location: ./application/helper/MY_form_helper.php */
// ------------------------------------------------