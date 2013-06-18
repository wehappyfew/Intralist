<?php
    
if (!defined('BASEPATH'))exit ('No direct script accee allowed');
	
class Clients_delete extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		// ----LOAD THE MODEL / PASS THE DATA----	
		$this->load->model('clients_model');
		//insert the data (returned from the function) into the array
		$clients_data['clients_table'] = $this->clients_model->get_user_clients_for_delete();
		
		// ----SHOW THE VIEWS----
		//load the appropriate view and pass the data returned from the model
		if ( isset($clients_data['clients_table']) ):
			
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the data to the view
				$this->load->view('clients_delete_view',$clients_data);
			$this->load->view('footer_view');
		else:
			//if there are no records in the db show the devil
			$this->load->view('header_view');
			$this->load->view('navigation_view');
				//load the error view
				$this->load->view('database_devil_view');
			$this->load->view('footer_view');
		endif;
	}
	
	function process_clients_delete()
	{
		//get the user's id
		$this->load->model('get_id_model');
		$user_id = $this->get_id_model->get_user_id();
		
		//store the checked boxes
		$checked_boxes =$this->input->post('checkbox');
		
		// if no checkboxes were selected
		if ( $checked_boxes == FALSE ):
			
			$this->index();
			$this->load->view('select_one_view');
		
		//if at least one is selected
		else:
			//store the values(ids) inside an array
			foreach ($checked_boxes as $checked_client):
				$delete_these_clients[] = $checked_client;
			endforeach;
			
			//grab the user's id
			$this->load->model('get_id_model');
			$user_id = $this->get_id_model->get_user_id();

			$this->load->model('clients_model');
			$q = $this->clients_model->delete_client($delete_these_clients,$user_id);
			
			if ( is_null($q) ):
				$this->index();
				$this->load->view('clients_delete_ok_view');
			else:
				$this->index();
				$this->load->view('something_is_wrong_view');
			endif;
		endif;
	}
}	
    
/***************************   END OF THE FILE  *****************************/