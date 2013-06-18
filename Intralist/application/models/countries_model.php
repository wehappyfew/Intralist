<?php
    
if ( !defined('BASEPATH')) exit ('No direct script access allowed');
	
class Countries_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_countries()
	{
		//select the exact columns that i wanna show
		// Produces: SELECT column1,column2, FROM my_table
		//i can call db cause i have autoloaded the database library
		$this->db->select('country_code,country_name');
		$countries_data = $this->db->get('countries');
		
		if( isset($countries_data) ):
			return $countries_data;
		endif;
	}
	 
}	
 
/***************************   END OF THE FILE  *****************************/