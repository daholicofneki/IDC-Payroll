<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Restaurant Management Sistem
 *
 * @author		Purwandi
 * @copyright	Copyright (c) 2011 Purwandi
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Extending the HTML helper
 *
 * @category	Helper
 * @author		Purwandi
 * @contact		free6300@gmail.com
 * @created at  5 Juni 2011 15:17
 */

// ------------------------------------------------------------------------

/**
 * Script
 *
 * Returns load file javascript in folder assets
 *
 * @access	public
 * @return	object
 */
if ( ! function_exists('script'))
{
	function script ($file)
	{
		return  '<script type="text/javascript" src="'.base_url().'static/js/'.$file.'"></script>'."\n";
	}
}

// ------------------------------------------------------------------------

/**
 * Load page using thicbox
 *
 * @access	public
 * @param	url page to load content
 * @param	string value
 * @param	string title
 * @param	string class atributes
 * @return	string
 */
if ( ! function_exists ('anchor_box'))
{
	
	function anchor_box ($url, $string, $title, $attributes= FALSE)
	{
		return anchor('#',$string,'class="thickbox '.$attributes.'" onclick="tb_show(\''.$title.'\',\''.base_url().$url.'\',\'\'); return false;"');
	}
}

// ------------------------------------------------
/* End of file MY_html_helper.php */
/* Location: ./application/helper/MY_html_helper.php */
// ------------------------------------------------