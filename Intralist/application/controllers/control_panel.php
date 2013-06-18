<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Control_panel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		
		$this->load->view('header_view');
		$this->load->view('navigation_view');
		//show the control panel
			$this->load->view('control_panel_view');
		$this->load->view('footer_view');

	}
	
}	
    
/***************************   END OF THE FILE  *****************************/