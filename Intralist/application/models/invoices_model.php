<?php

if (!defined('BASEPATH'))exit ('No direct script accee allowed');

class Invoices_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_invoices()
	{
		//set the pagination configurations
		$config['base_url']   =	'https://localhost/Intralist/index.php/invoices/index';
		$config['total_rows'] = $this->db->get('invoices')->num_rows();
		$config['per_page']   = 10;
		$config['num_links']  = 10;
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<div class="pagination" id="pagination">';
		$config['full_tag_close']= '</div>';
		//pass the configurations in the pagination class
		$this->pagination->initialize($config);
		
		//select the columns that i need
		$this->db->select('invoice_number,invoice_date,suppliers.sup_name,countries.country_name,so_code,net_mass,suppl_units,invoice_value');
		$this->db->where('countries.country_code = invoices.country_code');
		
		//query the db for pagination results
		//get('table','LIMIT','OFFSET')
		$invoices_data = $this->db->get('invoices,countries,suppliers',$config['per_page'],$this->uri->segment(3));
		
		//return the array with the data ONLY if there are any in the database
		if ( $invoices_data->num_rows() > 0 ):
			return $invoices_data;
		endif;
	}

}

/***************************   END OF THE FILE  *****************************/