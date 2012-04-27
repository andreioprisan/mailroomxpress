<?php

class Main extends CI_Controller {
	var $pageTitle = 'Welcome to MailRoom XPress!';
	var $data = null;

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
		$data = array(
			'pageTitle' => $this->pageTitle,
			'loggedin'	=> false 
		);

		$this->load->view('header', $data);
		$this->load->view('menubar', $data);
		$this->load->view('login', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>