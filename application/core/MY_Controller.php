<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Extending Controller
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author      Purwandi <free6300@gmail.com>
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

class MY_Controller extends CI_Controller {

        public $params = array ();
        public $module = '';
    
        /**
         * Constructor
         *
         */
	public function __construct ()
	{
		parent :: __construct ();
				
		// load spark template
		$this->load->spark('layout-library/1.0.0');
		$this->load->spark('Debug-Toolbar/1.0.1');
		// load spark library
		$this->load->library('template');
		if (! $this->input->is_ajax_request())
		{
			$this->output->enable_profiler(true);
			$this->load->library('console');
			Console::log_memory();
		}
					
	}
        
        // ---------------------------------------------------------------------
        
        /**
         * View content
         *
         * Load content view 
         *
         * @access      protected
         * @param       string
         * @return      void
         * @filesource
         */
        protected function _view ($template = 'main_1_3', $actions = 'main')
        {       
                $this->title    = ucwords(preg_replace('/[_]+/', ' ', strtolower(trim($this->router->fetch_class()))));
                $this->method   = ucwords(preg_replace('/[_]+/', ' ', strtolower(trim($this->router->fetch_method()))));

		$this->params['actions']		= $actions;
		$this->params['module']			= $this->module;
		$this->params['method']			= $this->method;
		$this->params['breadcrumbs']	= anchor(base_url(), 'Base Home').' &raquo; '. anchor($this->module.'/index/'.$this->uri->segment(3), $this->title).' &raquo; '.$this->method;
                
		// load template
		$this->template

			// loading css file
			->add_stylesheet('screen.css')
			->add_stylesheet('style.css')
			->add_stylesheet('jquery-ui-1.8.16.custom.css')
			->add_stylesheet('thickbox.css')

			// loading javascript file
			->add_javascript('jquery-1.6.2.min.js')
			->add_javascript('jquery-ui-1.8.16.custom.min.js')
			->add_javascript('thickbox.js')

			->set_base_title($this->title)
			->add_title_segment($this->method)
			->set_template('layouts/'.$template) // application/views/layouts/default.php
           
			// and here we go ............................
			->build($this->module.'/'.$actions, $this->params);
        }
        
        // ---------------------------------------------------------------------
        
        /**
         * Default Index Page Of Module
         * 
         */
        public function index ()
        {
		$this->_view();
        }
        
}