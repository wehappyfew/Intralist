<?php
    
if ( !defined('BASEPATH')) exit ('No direct script access allowed');
	
class Signup_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function create_account()
	{
		//take the user inputs and make an array
		$user_data = array 
		(
			'username'     => $this->input->post('username'),
			'password'     => $this->input->post('password2'),  //----->MD5
			'first_name'   => $this->input->post('first_name'),
			'last_name'    => $this->input->post('last_name'),
			'user_email'   => $this->input->post('user_email'),
			'register_date'=> date('Y-m-d') 
		);
		//insert the data to the table
		$insert_query = $this->db->insert('users',$user_data);
		// the variable $insert_query will be 0(failed) or 1(succeeded)
		return $insert_query;
	}
	 
}	
 
/***************************   END OF THE FILE  *****************************/