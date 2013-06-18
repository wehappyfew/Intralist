<?php

if (!defined('BASEPATH'))exit ('No direct script access allowed');

class Form_clients extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//load the separate views
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			//load the form to insert a new client
			$this->load->view('form_clients_view');
		$this->load->view('footer_view');
	}
	
	function process_client()
	{
		//load the form validation class
		$this->load->library('form_validation');
		//set the validation errors's delimiters
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//parameters: field name,human-field name,validation rules
		/* best practice:
		 * the prepping rules should come after the validation rules
		*/
		$field_rules = array
		(
		//NA KANW NA TSEKAREI GIA UNIQUE STO NAME KAI STO VAT_NUMBER
		//ΝΑ ΕΠΙΤΡΕΠΕΙ SPACES STO PEDIO CLIENT_NAME
               array
               (
                     'field'   => 'client_name', 
                     'label'   => '-Client\'s name-', 
                     'rules'   => 'required|max_length[30]|alpha_dash|trim'
               ),
               array
               (
                     'field'   => 'client_vat_num', 
                     'label'   => '-Client\'s VAT number-', 
                     'rules'   => 'required|max_length[12]|alpha_numeric|trim'
               ),
               array
               (
                     'field'   => 'client_country', 
                     'label'   => '-Client\'s country-', 
                     'rules'   => 'required|max_length[2]|trim'
               ),   
        );
		//pass the validation rules to the validation function
		$this->form_validation->set_rules($field_rules);
		
		/* run the validation.if it throws an error load again the form.
		 * if everything is ok reload the form and show a confirmation
		*/
		if ($this->form_validation->run() == FALSE):
			//the errors are shown on the view
			$this->index();
		else:
		
		$this->load->model('get_id_model');
		$user_id = $this->get_id_model->get_user_id();
		
		if ( $user_id == TRUE ):
			//get the user inputs from the form and stuff them in the array
			$form_inputs = array
			(
			'client_name'    =>ucwords($this->input->post('client_name')),
			'client_vat_num' =>$this->input->post('client_vat_num'),
			'country_code'   =>$this->input->post('client_country'),
			'user_id'		 =>$user_id
			);
			//add the new client to the database
			$this->load->model('form_clients_model');
				//call the function that handles the INSERT query
				$this->form_clients_model->add_client($form_inputs);
		
			//after the data has been submitted show the empty form again!
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				$this->load->view('form_clients_view');
			//and below the form show a confirmation
				$this->load->view('add_client_ok');
			$this->load->view('footer_view');
		else:
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				$this->load->view('form_clients_view');
			//the user is not logged in
				$this->load->view('must_be_logged_in');
			$this->load->view('footer_view');
		endif;
		
		endif;
	}
	
}

/***************************   END OF THE FILE  *****************************/