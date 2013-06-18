<?php
    
if ( !defined('BASEPATH')) exit ('No direct script access allowed');
	
class Manage_tables_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function show_tables()
	{
		//--------------------na to kanw na deixnei mono ta tables tou ekastote user!!!!!!!!!!
		$q = $this->db->query('SHOW TABLES FROM intralist');
		foreach ($q->result() as $table):
			$names[] = $table;
		endforeach;
		return $names;
	}
}	
	
/***************************   END OF THE FILE  *****************************/