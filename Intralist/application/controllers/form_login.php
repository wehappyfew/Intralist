<?php
    
if (!defined('BASEPATH')) exit ('No direct script access allowed');
	
class Form_login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->view('header_view');
		$this->load->view('navigation_view');
		//login form
			$this->load->view('form_login_view');
		$this->load->view('footer_view');
	}
	function process_login()
	{
		//the session library is autoloaded!
		//load the model
		$this->load->model('login_model');
		//check the username and password against the database
		$user_exists = $this->login_model->process_login();
		
		if ($user_exists == TRUE): //if user is validated
			//pass some data (specific to the user) into the session 
			$user_data = array 
			(
				'username'    => $this->input->post('username'),
				'is_logged_in'=> TRUE
			);
			$this->session->set_userdata($user_data);
			
			//load confirmation view
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				$this->load->view('login_ok_view');
			$this->load->view('footer_view');
		else:
			//if the login failed load the login form again
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				$this->load->view('form_login_view');
				$this->load->view('login_failed_view');
			$this->load->view('footer_view');
		endif;
	}
	
	function signup()
	{
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('form_signup_view');
		$this->load->view('footer_view');
	}
	
	function pricing_plans()
	{
		$this->load->view('header_view');
		$this->load->view('navigation_view');
			$this->load->view('pricing_&_plans_view');
		$this->load->view('footer_view');
	}
	
	function create_account()
	{
		$this->load->library('form_validation');
		
		//parameters: field name,human-field name,validation rules
		/* best practice:
		 * the prepping rules should come after the validation rules
		*/
		$field_rules = array
		(
			array
			(
				'field' => 'username', 
                'label' => '-Username-', 
                'rules' => 'required|is_unique[users.username]|alpha_dash|min_length[4]|max_length[25]|trim'
			),
			array
			(
				'field' => 'password1', 
                'label' => '-Password-', 
                'rules' => 'required|min_length[6]|max_length[20]|trim'
			),
			array
			(
				'field' => 'password2', 
                'label' => '-Confirm Password-', 
                'rules' => 'required|matches[password1]|trim'
			),
			array
			(
				'field' => 'user_email', 
                'label' => '-Email-', 
                'rules' => 'required|is_unique[users.user_email]|min_length[5]|max_length[100]valid_email|trim'
			),
			array
			(
				'field' => 'first_name', 
                'label' => '-First name-', 
                'rules' => 'alpha|min_length[2]|max_length[30]|trim'
			),
			array
			(
				'field' => 'last_name', 
                'label' => '-Last name-', 
                'rules' => 'alpha|min_length[2]|max_length[30]|trim'
			),
		);
		
		//pass the field_rules to the validation function
		$this->form_validation->set_rules($field_rules);
		/* run the validation.if it throws an error load again the form.
		 * if everything is ok reload the form and show a confirmation
		*/
		$run_validation = $this->form_validation->run();
		
		if ($run_validation == FALSE ) :
			
			//show the errors
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				$this->load->view('form_signup_view');//it contains the errors!
			$this->load->view('footer_view');
			
		else:
			//create the new account
			$this->load->model('signup_model');
			$insert_query = $this->signup_model->create_account();
			
			if ($insert_query == TRUE):
				// show confirmation
				$this->load->view('header_view');
				$this->load->view('navigation_view');
					$this->load->view('signup_ok_view');
				$this->load->view('footer_view');
				
			else:
				//load the views
				$this->load->view('header_view');
				$this->load->view('navigation_view');
					$this->load->view('form_signup_view');
					$this->load->view('signup_failed_view');
				$this->load->view('footer_view');
			endif;
		endif;
	}

	function the_stupid_fuck_forgot_his_password()
	{
		
	}
	
	
	
}	
    
/***************************   END OF THE FILE  *****************************/