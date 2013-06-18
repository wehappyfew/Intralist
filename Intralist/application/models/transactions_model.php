<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
	
class Transactions_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_transactions()
	{
		//select the exact columns that i wanna show
		// Produces: SELECT column1,column2, FROM my_table
		//i can call db cause i have autoloaded the database library
		$this->db->select('transact_code,transact_name');
		$transact_data = $this->db->get('transact_method');

		if( isset($transact_data) ):
			return $transact_data;
		endif;
		
	}
	
}
    
    
/***************************   END OF THE FILE  *****************************/