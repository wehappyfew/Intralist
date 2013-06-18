<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
	
class Suppliers_table extends CI_Controller
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
		
		// load the SUPPLIERS model
		$this->load->model('suppliers_model');
		$data['suppliers'] = $this->suppliers_model->get_client_suppliers();
		
		// load the CLIENTS model(for the dropdown)
		$this->load->model('clients_model');
		$data['client_names'] = $this->clients_model->get_clients_for_dropdown();
		
		// ---- SHOW THE VIEWS ----
		if ( isset($data['suppliers']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the SUPPLIERS data
				$this->load->view('suppliers_table_view',$data);
				//load the CLIENTS data
				$this->load->view('suppliers_table_dropdown_view',$data);
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
	}

	function show_specific_suppliers()
	{
		//load the form validation class
		$this->load->library('form_validation');
		//set the validation errors's delimiters
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$field_rules = array
			(
        		array(
            			'field'   => 'client_name', 
            			'label'   => '-Client\'s name-', 
            			'rules'   => 'required|trim'
             		 )
         	);
		//pass the validation rules to the validation function
		$this->form_validation->set_rules($field_rules);
		
		/* run the validation.if it throws an error load again the form.
		 * if everything is ok reload the form and show a confirmation
		*/
		if ( $this->form_validation->run() == FALSE ):
			//the errors are shown on the view
			$this->index();
		else:
			// ---- LOAD WHATS NEEDED ----
			//the pagination library is set to autoload
		
			//load the table class
			$this->load->library('table');
		
			// load the SUPPLIERS model
			$this->load->model('suppliers_model');
			$data['suppliers'] = $this->suppliers_model->get_specific_suppliers();
		
			// load the CLIENTS model(for the dropdown)
			$this->load->model('clients_model');
			$data['client_names'] = $this->clients_model->get_clients_for_dropdown();
		
			// ---- SHOW THE VIEWS ----
			if ( isset($data['suppliers']) AND isset($data['client_names']) ):
			
				$this->load->view('header_view');
				$this->load->view('navigation_view');
					//load the SUPPLIERS data
					$this->load->view('suppliers_table_view',$data);
					//load the CLIENTS data
					$this->load->view('suppliers_table_dropdown_view',$data);
				$this->load->view('footer_view');
			else:
				$this->load->view('header_view');
				$this->load->view('navigation_view');
					//load the error view
					$this->load->view('database_devil_view');
				$this->load->view('footer_view');
			endif;
		endif;
	}
}	
    
/***************************   END OF THE FILE  *****************************/