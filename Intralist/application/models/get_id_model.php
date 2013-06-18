<?php
    
if (!defined('BASEPATH'))exit ('No direct script access allowed');
	
class Get_id_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_user_id()
	{
		//get the user id based on the username!
		$username = $this->session->userdata('username');

		//construct the query
			$this->db->select('id');
			$this->db->from('users');
			$this->db->where('username',$username);
		//the value returned from the query is stored in the variable
		 $q  = $this->db->get();
		 
		if ( $q->num_rows() == 1 ):
		 	$row = $q->row();
			$user_id = $row->id;
			return $user_id;
		else:
			return FALSE;
		endif;
	}
	
}	
 
/***************************   END OF THE FILE  *****************************/