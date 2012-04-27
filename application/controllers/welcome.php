<?php

class Welcome extends CI_Controller {
	var $pageTitle = 'Welcome to MailRoom XPress!';

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
			'loggedin'	=> true 
		);
		
		redirect('login','refresh');
		
		//$this->load->view('header', $data);
		//$this->load->view('home', $data);
		//$this->load->view('footer');
	}

		
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>