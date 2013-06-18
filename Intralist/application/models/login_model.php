<?php
    
if ( !defined('BASEPATH')) exit ('No direct script accee allowed');
	
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function process_login()
	{
		//make the query to check if the user exists in the db
		
		//SELECT username,password FROM 'table_name' WHERE username=$username AND password=&password 
		$username = $this->input->post('username');
		$this->db->where('username',$username);
		
		$password = $this->input->post('password'); //----->MD5
		$this->db->where('password',$password);
		
		$query = $this->db->get('users');
		
		if ($query->num_rows() == 1): //it means that the user has been found into the db
			return TRUE;
		endif;
	}

	 
}	
 
/***************************   END OF THE FILE  *****************************/