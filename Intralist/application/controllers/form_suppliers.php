<?php

if (!defined('BASEPATH'))exit ('No direct script access allowed');

class Form_suppliers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//call the clients model to grab the names
		$this->load->model('clients_model');
		$vars['client_names'] = $this->clients_model->get_clients_for_dropdown();
		
		//load the separate views
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			//load the form to insert a new supplier
			$this->load->view('form_suppliers_view',$vars);
		$this->load->view('footer_view');
	}
	
	function process_supplier()
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
               array
               (
                     'field'   => 'client_name', 
                     'label'   => '-Client\'s name-', 
                     'rules'   => 'required|trim'
               ),
               array
               (
                     'field'   => 'sup_name', 
                     'label'   => '-Supplier\'s name-', 
                     'rules'   => 'required|max_length[30]|alpha_dash|trim'
               ),
               array
               (
                     'field'   => 'sup_vat_num', 
                     'label'   => '-Supplier\'s VAT number-', 
                     'rules'   => 'required|max_length[12]|alpha_numeric|trim'
               ),
               array
               (
                     'field'   => 'sup_country', 
                     'label'   => '-Supplier\'s country-', 
                     'rules'   => 'required|max_length[2]|trim'
               ),   
        );
		//pass the validation rules to the validation function
		$this->form_validation->set_rules($field_rules);
		
		/* run the validation.if it throws an error load again the form.
		 * if everything is ok reload the form and show a confirmation
		*/
		if ($this->form_validation->run() == FALSE):
			$this->index();
		else:
		
		//get the user id depending on the username from the session
			$this->load->model('get_id_model');
		$user_id = $this->get_id_model->get_user_id();
		
		//call the clients model to grab the names
			$this->load->model('clients_model');
		$vars['client_names'] = $this->clients_model->get_clients_for_dropdown();
		
		//get the user inputs from the form and stuff them in the array
		$form_inputs = array
		(
			'sup_name'    => ucwords($this->input->post('sup_name')),
			'sup_vat_num' => $this->input->post('sup_vat_num'),
			'country_code'=> $this->input->post('sup_country'),
			'client_id'   => $this->input->post('client_name'),
			'user_id'	  => $user_id
		);
		//load the form_suppliers model
		/*
		 * notice: 
		 * i could create the add_supplier function inside the suppliers_model 
		 * but instead i will create a separate model for it.
		 * That way the models are not going to be too crowded
		*/
		$this->load->model('form_suppliers_model');
		//call the function that handles the INSERT query
		$this->form_suppliers_model->add_supplier($form_inputs);
		
		//after the data has been submitted show the empty form again!
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('form_suppliers_view',$vars);
		//and below the form show a confirmation
			$this->load->view('add_supplier_ok');
		$this->load->view('footer_view');

		endif;
	}
	
}

/***************************   END OF THE FILE  *****************************/