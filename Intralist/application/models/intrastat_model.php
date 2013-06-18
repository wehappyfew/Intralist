<?php
    
if ( !defined('BASEPATH') ) exit ('No direct script access allowed');
		
class Intrastat_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
				
	function get_intrastat_data()
	{
		//set the pagination configurations
		$config['base_url']   =	'https://localhost/Intralist/index.php/intrastat/index';
		$config['total_rows'] = $this->db->get('invoices')->num_rows();
		$config['per_page']   = 15;
		$config['num_links']  = 10;
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<div class="pagination" id="pagination">';
		$config['full_tag_close']= '</div>';
		//pass the configurations in the pagination class
		$this->pagination->initialize($config);
		
		//select the exact columns that i wanna show
		// construct the query
		//i can call db cause i have autoloaded the database library
		$this->db->select('countries.country_name,so_code,SUM(net_mass),SUM(suppl_units),SUM(invoice_value)');
		$this->db->from('invoices,countries');
		$this->db->where('countries.country_code = invoices.country_code');
		$this->db->group_by('countries.country_name,SO_code');
		//run the query
		$intrastat_data = $this->db->get();
		
		if( $intrastat_data->num_rows() > 0 ):
			return $intrastat_data;
		endif;
	}
						 
} 
/***************************   END OF THE FILE  *****************************/

