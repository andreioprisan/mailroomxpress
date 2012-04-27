<?php

class Searchc extends CI_Controller {
	var $pageTitle = 'MailRoom XPress - Search';
	
	function __construct()
	{
		parent::__construct();	

		$this->load->library('DX_Auth');			
		$this->load->helper('url');
		$this->load->helper('form');
		
	}

	function index()
	{
	}
	
	function results()
	{
		$data = array('pageTitle' => $this->pageTitle);
		$query = $this->input->post('search_input');
		
		$this->load->model('search');
		$results = $this->search->get_results($this->dx_auth->get_institution_id(), $this->dx_auth->get_building_id(), $query);
		
		$this->load->view('header', $data);
		$this->load->view('menubar', $data);
		$this->load->view('searchresults', array(
			'results' => $results,
			'query' => $query,
			'resultsStatus' => $this->search->set_results_status($results) )
		);
		
		//var_dump($a);
		
		
		
	}
	
}
?>
