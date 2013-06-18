<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Suppliers_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	//GET SPECIFIC CLIENT'S SUPPLIERS
	function get_client_suppliers()
	{
		$username = $this->session->userdata('username');
		
		//set the pagination configurations
		$config['base_url']   =	site_url().'/suppliers_table/index';
		$config['total_rows'] = $this->db->get('suppliers')->num_rows();
		$config['per_page']   = 10;
		$config['num_links']  = 10;
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<div class="pagination" id="pagination">';
		$config['full_tag_close']= '</div>';
		//pass the configurations in the pagination class
		$this->pagination->initialize($config);
		
		//select the exact columns that i wanna show
		$this->db->select('client_name , sup_name , sup_vat_num , country_name');
		$this->db->where('users.id = clients.user_id');
		$this->db->where('clients.id = suppliers.client_id');
		$this->db->where('suppliers.country_code = countries.country_code');
		$this->db->where('username',$username);
		$this->db->order_by('client_name, sup_name, country_name');
		$data = $this->db->get('clients, suppliers, countries, users',$config['per_page'],$this->uri->segment(3));
				
		//return the array with the data ONLY if there are any in the database
		if ( $data->num_rows() > 0 ):
			return $data;
		endif;
	}

	function get_specific_suppliers()
	{
		$username = $this->session->userdata('username');
		$client_id = $this->input->post('client_name');
		
		//select the exact columns that i wanna show
		$this->db->select('client_name , sup_name , sup_vat_num , country_name');
		$this->db->where('users.id = clients.user_id');
		$this->db->where('clients.id = suppliers.client_id');
		$this->db->where('suppliers.country_code = countries.country_code');
		$this->db->where('username',$username);
		$this->db->where('client_id',$client_id);
		$this->db->order_by('sup_name, country_name');
		//execute the constructed query and store its results in the var $data
		$data = $this->db->get('clients, suppliers, countries, users');
				
		//return the array with the data ONLY if there are any in the database
		if ( $data->num_rows() > 0 ):
			return $data;
		endif;
	}
}	
 
/***************************   END OF THE FILE  *****************************/