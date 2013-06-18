<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Logout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		//destroy the session data to log the user out
		$this->session->sess_destroy();
		
		//redirect to the login page
		redirect('form_login/index');

	}
	
}	
    
/***************************   END OF THE FILE  *****************************/