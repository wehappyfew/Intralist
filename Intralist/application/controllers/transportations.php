<?php

if (!defined('BASEPATH')) exit ('No direct script accee allowed');

class Transportations extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		// ----LOAD WHATS NEEDED----
		//the pagination library is set to autoload
		//the table library is set to autoload
		
		// ----LOAD THE MODEL / PASS THE DATA----	
		//call the model
		$this->load->model('transportations_model');
		$transp_data['transp_methods'] = $this->transportations_model->get_transportations();
		
		//load the separate views
		if ( isset($transp_data['transp_methods']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');

				//load the appropriate view and pass the data returned from the model
				$this->load->view('transportations_view',$transp_data);
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