<?php

class Notesc extends CI_Controller {
	var $table = "notes";
	
	function __construct()
	{
		parent::__construct();	

		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');			
		$this->load->helper('url');
		$this->load->helper('form');
		
	}

	function index()
	{
	}

	function post()
	{
		
		$data = array(
			'institution_id' => $this->dx_auth->get_institution_id(),
			'building_id' => $this->dx_auth->get_building_id(),
			'author_id' => $this->dx_auth->get_user_id(),
			'content' => $this->input->post('notes')
			);
		
		$this->load->model('notes');
		$this->notes->update_or_insert_todays_note($data);

//		$this->db->insert($this->table, $data);
		
		redirect($this->input->post('backto'), 'location');
	}
}

?>
