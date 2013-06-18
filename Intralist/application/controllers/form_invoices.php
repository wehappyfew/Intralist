<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form_invoices extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{					
		//load model
		$this->load->model('form_invoices_model');
		
		//execute function to get only the names of the clients
		$dropdown['clients_names']=$this->form_invoices_model->get_specific_clients();
		//execute function to get only the names of the suppliers
		$dropdown['sup_names']       = $this->form_invoices_model->get_specific_suppliers();
		//execute the function to fetch the transactions names
		$dropdown['transact_names']  = $this->form_invoices_model->get_transactions_for_dropdown();
		//execute the function to fetch the transactions names
		$dropdown['transport_names'] = $this->form_invoices_model->get_transportations_for_dropdown();
		
		//load the separate views
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('form_invoices_view',$dropdown);
		$this->load->view('footer_view');
	}
	
	function process_invoice()
	{
		//load the form_validation class
		$this->load->library('form_validation');
		//set the validation error delimiters
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//parameters: field name,human-field name,validation rules
		/* best practice:
		 * the prepping rules should come after the validation rules
		*/
		$field_rules = array
		(
			array
			(
				'field' => 'invoice_number', 
                'label' => '-Invoice number-', 
                'rules' => 'required|alpha_dash|max_length[20]|trim'
			),
			array
			(
				'field' => 'invoice_date', 
                'label' => '-Invoice date-', 
                'rules' => 'required|max_length[10]|trim'
			),
			array
			(
				'field' => 'client_name', 
                'label' => '-Client\'s name-', 
                'rules' => 'required|max_length[30]|numeric|trim'
			),
			array
			(
				'field' => 'supplier_name', 
                'label' => '-Supplier\'s name-', 
                'rules' => 'required|max_length[30]|numeric|trim'
			),
			array
			(
				'field' => 'country', 
                'label' => '-Country-', 
                'rules' => 'required|max_length[2]|trim'
			),
			array
			(
				'field' => 'customs_code', 
                'label' => '-Customs code-', 
                'rules' => 'required|numeric|min_length[4]|max_length[8]|trim'
			),
			array
			(
				'field' => 'transact_method', 
                'label' => '-Transaction method-', 
                'rules' => 'required|numeric|min_length[1]|max_length[2]|trim'
			),
			array
			(
				'field' => 'transport_method', 
                'label' => '-Transportation method-', 
                'rules' => 'required|numeric|exact_length[1]|trim'
			),
			array
			(
				'field' => 'net_mass', 
                'label' => '-Net mass-', 
                'rules' => 'required|trim'
			),
			array
			(
				'field' => 'suppl_units', 
                'label' => '-Supplementary units-', 
                'rules' => 'required|trim'
			),
			array
			(
				'field' => 'invoice_value', 
                'label' => '-Invoice value-', 
                'rules' => 'required|trim'
			)
		);
		//pass the field_rules to the validation function
		$this->form_validation->set_rules($field_rules);
		/* run the validation.if it throws an error load again the form.
		 * if everything is ok reload the form and show a confirmation
		*/
		if ($this->form_validation->run() == FALSE ) :
			
			$this->load->view('add_invoice_failed');
			$this->index();
		else:
			//load the invoices model
			$this->load->model('form_invoices_model');
			//pass the $_POST[] data array to the model
			$this->form_invoices_model->add_invoice();
			
			//after the data has been submitted show the empty form again!
			$this->index();
			// show a confirmation
			$this->load->view('add_invoice_ok');
			
		endif;
	}
	
	
	

}
/***************************   END OF THE FILE  *****************************/

