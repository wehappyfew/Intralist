<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
	
class Countries extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		
		// ----LOAD WHATS NEEDED----
		//the pagination library is set to autoload
		
		//load the table class
		$this->load->library('table');
		
		// ----LOAD THE MODEL / PASS THE DATA----	
		//call the model
		$this->load->model('countries_model');
		//insert the data (returned from the function) into the array
		$countries_data['countries_table'] = $this->countries_model->get_countries();
		
		// ----SHOW THE VIEWS----
		//load the appropriate view and pass the data returned from the model
		if ( isset($countries_data['countries_table']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the data to the view
				$this->load->view('countries_view',$countries_data);
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
		

	}
}	
    
/***************************   END OF THE FILE  *****************************/