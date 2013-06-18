<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
			
class Listing extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		//load the appropriate model
		$this->load->model('listing_model');
		
		//get listing columns
		$listing_data['listing_table'] = $this->listing_model->get_listing_data();
				 
		// ---- SHOW THE VIEWS ----
		//load the separate views to form the html page ,and pass the data to the right view
		if ( isset($listing_data['listing_table']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');

				//load the LISTING data
				$this->load->view('listing_table_view',$listing_data);
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

