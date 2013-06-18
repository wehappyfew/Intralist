<?php
    
if ( !defined('BASEPATH') ) exit ('No direct script access allowed');
		
class Listing_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
				
	function get_listing_data()
	{
		//construct the query
		$this->db->select('countries.country_name,sup_name,SUM(invoice_value) AS invoice_sums');
		$this->db->from('invoices,countries,suppliers');
		$this->db->where('countries.country_code = invoices.country_code');
		$this->db->group_by('countries.country_name,sup_name');
		$this->db->order_by('countries.country_name,sup_name');
		//run the query
		$listing_data = $this->db->get();
		
		if( $listing_data->num_rows() > 0 ):
			return $listing_data;
		endif;
	}
				 
} 
/***************************   END OF THE FILE  *****************************/

