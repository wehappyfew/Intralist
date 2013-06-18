<?php

if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Form_clients_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function add_client($form_inputs)
	{
		$this->db->insert('clients',$form_inputs);
	}
	
}







/***************************   END OF THE FILE  *****************************/