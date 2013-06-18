<?php  
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
			
class Intrastat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		//load the appropriate model
		$this->load->model('intrastat_model');
		
		//get INTRASTAT columns
		$intrastat_data['intrastat_table'] = $this->intrastat_model->get_intrastat_data();
				 
		//load the separate views
		if ( isset($intrastat_data['intrastat_table']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//only if logged in

				//show the INTRASTAT columns
				$this->load->view('intrastat_table_view',$intrastat_data);
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//show error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
	}
}		    
/***************************   END OF THE FILE  *****************************/

