<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
			
class Transactions extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		//load the model
		$this->load->model('transactions_model');
		//execute the appropriate function and store the data in an array
		$transact_data['transact_methods'] = $this->transactions_model->get_transactions();
		
		//load the separate views
		if ( isset($transact_data['transact_methods']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');

				//load the appropriate view and pass the data returned from the model
				$this->load->view('transactions_view',$transact_data);
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
