<?php

if (!defined('BASEPATH'))exit ('No direct script accee allowed');

class Invoices extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		// ---- LOAD WHATS NEEDED ----
		//the pagination library is set to autoload
		
		//load the table class
		$this->load->library('table');
		
		// ----LOAD THE MODEL(S) / PASS THE DATA----	
		//load the invoices model
		$this->load->model('invoices_model');
		//call the function to get the invoices
		$invoices_data['invoices_table'] = $this->invoices_model->get_invoices();
		
		// ---- SHOW THE VIEWS ----	
		if ( isset($invoices_data['invoices_table']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');


				//show the invoices
				$this->load->view('invoices_view',$invoices_data);
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//show the error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
	}
} 
/***************************   END OF THE FILE  *****************************/