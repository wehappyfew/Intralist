<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
			
class SO_table extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//the pagination library is set to autoload
		
		//the table class is autoloaded
			
		//call the model
		$this->load->model('so_table_model');
		//insert the data (returned from the function) into the array
		$so_data['so_rows'] = $this->so_table_model->get_so_table_data();
		
	//////////////////////////-VIEWS-//////////////////////////////////////////////
		//if the db has returned data show the table
		//otherwise,show error message
		if ( isset($so_data['so_rows']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');

				//show the INTRASTAT columns
				$this->load->view('so_table_view',$so_data);
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//the error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
	}
}		    


/***************************   END OF THE FILE  *****************************/