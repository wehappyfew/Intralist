<?php

if ( !defined('BASEPATH')) exit ('No direct script accee allowed');

class Form_invoices_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function add_invoice() 
	{
		//load the get_id_model to take the user's id to use it when the invoice form is submitted
		$user_id = $this->load->model('get_id_model');
		
		$form_inputs = array
		(
			'invoice_number' => $this->input->post('invoice_number'),
			'invoice_date'   => $this->input->post('invoice_date'),
			'user_id'		 => $user_id,
			'client_id'		 => $this->input->post('client_name'),
			'supplier_id'    => $this->input->post('supplier_name'),
			'country_code'   => $this->input->post('country'),
			'so_code'        => $this->input->post('customs_code'),
			'transact_code'  => $this->input->post('transact_method'),
			'transport_code' => $this->input->post('transport_method'),
			'net_mass'       => $this->input->post('net_mass'),
			'suppl_units'    => $this->input->post('suppl_units'),
			'invoice_value'  => $this->input->post('invoice_value')
		);
		
		//insert the data to the table
		$insert_query = $this->db->insert('invoices',$form_inputs);
		// the variable $insert_query will be 0(failed) or 1(succeeded)
		return $insert_query;
	}

	//
	function get_specific_clients()
	{
		$username = $this->session->userdata('username');
		
		$this->db->select('clients.id,client_name');
		$this->db->from('clients,users');
		$this->db->where('username',$username);
		$this->db->where('clients.user_id      = users.id');
		$clients_data = $this->db->get();
				
		//return the array with the data ONLY if there are any in the database
		if ( $clients_data->num_rows() > 0 ):
			
			foreach ( $clients_data->result() as $row ):
				$data[] = $row;
			endforeach;
			return $data;
		endif;
	}
	
	//oi suppliers gia na emfanistoun prepei na "diavazetai" o client...alla apo ena aplo dropdown..den ginete!!!
	function get_specific_suppliers()
	{
		$username = $this->session->userdata('username');
		$client_id = $this->input->post('client_name');
		
		//select the exact columns that i wanna show
		$this->db->select('suppliers.id,sup_name');
		$this->db->where('users.id = clients.user_id');
		$this->db->where('clients.id = suppliers.client_id');
		$this->db->where('username',$username);
		$this->db->where('client_id',$client_id);
		//execute the constructed query and store its results in the var $data
		$data = $this->db->get('clients, suppliers, users');
				
		//return the array with the data ONLY if there are any in the database
		if ( $data->num_rows() > 0 ):
			return $data;
		endif;
	}
	

	function get_transactions_for_dropdown()
	{
		$this->db->select('transact_code,transact_name');
		$transact_data = $this->db->get('transact_method');
		
		//return the array with the data ONLY if there are any in the database
		if ( $transact_data->num_rows() > 0 ):
			
			foreach ( $transact_data->result() as $row ):
				$data[] = $row;
			endforeach;
			return $data;
		endif;
	}
	
	function get_transportations_for_dropdown()
	{
		$this->db->select('transport_code,transport_name');
		$transp_data = $this->db->get('transport_method');
		
		//return the array with the data ONLY if there are any in the database
		if ( $transp_data->num_rows() > 0 ):
			
			foreach ( $transp_data->result() as $row ):
				$data[] = $row;
			endforeach;
			return $data;
		endif;
	}

}
/***************************   END OF THE FILE  *****************************/

