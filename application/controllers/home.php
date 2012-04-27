<?php

class Home extends CI_Controller {
	var $pageTitle = 'Welcome to MailRoom XPress!';
	var $data = null;

	var $userID = null;
	var $lastLogin = null;
	var $institutionID = null;
	var $buildingID = null;

	function __construct()
	{
		parent::Controller();	
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');			
		
		$this->load->helper('url');
		$this->load->helper('form');
		
	}
	
	function index()
	{
		$this->load->model('dx_auth/users', 'users');
		$this->load->model('date', 'dateTools');
		$this->load->model('announcements', 'announcements');
		$this->load->model('notes', 'notes');

		$this->userID = $this->dx_auth->get_user_id();
		$this->lastlogin = $this->users->get_lastlogin_by_id($this->userID);
		$this->institutionID = $this->users->get_institution_id($this->userID);
		$this->buildingID = $this->users->get_building_id($this->userID);

		$data = array(
			'pageTitle' => $this->pageTitle,
			'loggedin'	=> false,
			'userRealName' => $this->users->get_name_by_id($this->userID),
			'userLastLogin' => $this->dateTools->dateTime2humanTime($this->lastlogin),
			'announcements' => $this->announcements->get_all($this->institutionID, $this->buildingID, $this->userID),
			'notes' => $this->notes->get_all_today($this->institutionID, $this->buildingID),
			'todaysNote' => $this->notes->get_todays_note($this->institutionID, $this->buildingID, $this->userID) 
			
			
		);
				
		$this->load->view('header', $data);
		$this->load->view('menubar', $data);
		$this->load->view('home', $data);
		//$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>