<?php

if (!defined('BASEPATH')) exit ('No direct script accee allowed');

class Transportations_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_transportations()
	{
		//select the exact columns that i wanna show
		// Produces: SELECT column1,column2, FROM my_table
		//i can call db cause i have autoloaded the database library
		$this->db->select('transport_code,transport_name');
		$transp_data = $this->db->get('transport_method');
		
		if( isset($transp_data) ):
			return $transp_data;
		endif;
	}
}

/***************************   END OF THE FILE  *****************************/