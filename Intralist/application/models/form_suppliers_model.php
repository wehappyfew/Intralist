<?php

if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Form_suppliers_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function add_supplier($form_inputs)
	{
		$this->db->insert('suppliers',$form_inputs);
	}
	
	
}







/***************************   END OF THE FILE  *****************************/






