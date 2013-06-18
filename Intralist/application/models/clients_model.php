<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Clients_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	//GET SPESIFIC USER'S CLIENTS
	function get_user_clients()
	{
		$username = $this->session->userdata('username');
			
		//set the pagination configurations
		$config['base_url']   =	site_url().'/clients_table/index';
		$config['total_rows'] = $this->db->get('clients')->num_rows();
		$config['per_page']   = 10;
		$config['num_links']  = 10;
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<div class="pagination" id="pagination">';
		$config['full_tag_close']= '</div>';
		//pass the configurations in the pagination class
		$this->pagination->initialize($config);
		
		//select the columns you want
		$this->db->select('client_name,client_vat_num,country_name');
		//
		$this->db->where('username',$username);
		$this->db->where('clients.country_code = countries.country_code');
		$this->db->where('clients.user_id      = users.id');

		//execute the query at the table
		$data = $this->db->get('clients,countries,users',$config['per_page'],$this->uri->segment(3));
				
		//return the array with the data ONLY if there are any in the database
		if ( $data->num_rows() > 0 ):
			return $data;
		endif;
	}

	function get_clients_for_dropdown()
	{
		$username = $this->session->userdata('username');
		
		$this->db->select('clients.id,client_name');
		$this->db->from('clients,countries,users');
		$this->db->where('username',$username);
		$this->db->where('clients.country_code = countries.country_code');
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
	
	function get_user_clients_for_delete()
	{
		$username = $this->session->userdata('username');

		//select the columns you want
		$this->db->select('clients.id,client_name,client_vat_num,country_name');
		//
		$this->db->where('username',$username);
		$this->db->where('clients.country_code = countries.country_code');
		$this->db->where('clients.user_id      = users.id');

		//execute the query at the table
		$q = $this->db->get('clients,countries,users');
				
		//return the array with the data ONLY if there are any in the database
		if ( $q->num_rows() > 0 ):
			
			foreach ($q->result() as $row):
				$data[] = $row;
			endforeach;
		return $data;
		
		endif;
	}
	
	function delete_client($delete_these_clients,$user_id)
	{
		foreach ($delete_these_clients as $client_id):
			
			//delete from suppliers
			$this->db->where('suppliers.client_id',$client_id);
			$this->db->where('suppliers.user_id',$user_id);
			$this->db->delete('suppliers');
			
			//delete from clients table
			$this->db->where('clients.id',$client_id);
			$this->db->where('clients.user_id',$user_id);
			$this->db->delete('clients');
					
		endforeach;
	}
	
	function edit_client()
	{
		
	}
	

}	
 
/***************************   END OF THE FILE  *****************************/