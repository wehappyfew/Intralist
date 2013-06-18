<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Manage_tables extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('manage_tables_view');
		$this->load->view('footer_view');
	}
	
	function show_tables()
	{
		//--------------------na to kanw na deixnei mono ta tables tou ekastote user!!!!!!!!!!
		$this->load->model('manage_tables_model');
		$data['tables'] = $this->manage_tables_model->show_tables();
		
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('show_tables_view',$data);
		$this->load->view('footer_view');
	}

}	
    
/***************************   END OF THE FILE  *****************************/