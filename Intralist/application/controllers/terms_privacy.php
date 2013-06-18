<?php

if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Terms_privacy extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function terms()
	{
		$this->load->view("header_view");
		$this->load->view("navigation_view");
			$this->load->view("terms_view");
		$this->load->view("footer_view");
	}
	
	function privacy_policy()
	{
		$this->load->view("header_view");
		$this->load->view("navigation_view");
			$this->load->view("privacy_policy_view");
		$this->load->view("footer_view");
	}
	
	
}


    
/***************************   END OF THE FILE  *****************************/