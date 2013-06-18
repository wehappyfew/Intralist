<?php
    
if ( ! defined('BASEPATH') ) exit ('No direct script access allowed');
		
class SO_table_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
				
	function get_so_table_data()
	{
		//set the pagination configurations
		$config['base_url']   =	'https://localhost/Intralist/index.php/so_table/index';
		$config['total_rows'] = $this->db->get('so_table')->num_rows();
		$config['per_page']   = 15;
		$config['num_links']  = 10;
		$config['first_link'] = 'First';
		$config['full_tag_open'] = '<div class="pagination" id="pagination">';
		$config['full_tag_close']= '</div>';
		//pass the configurations in the pagination class
		$this->pagination->initialize($config);
		
		//query the db for pagination results
		//get('table','LIMIT',OFFSET)
		$this->db->select('SO_code,product_name,suppl_unit');
		$so_data = $this->db->get('so_table',$config['per_page'],$this->uri->segment(3));
		
		if( isset($so_data) ):
			return $so_data;
		endif;
	}
						 
} 
/***************************   END OF THE FILE  *****************************/

