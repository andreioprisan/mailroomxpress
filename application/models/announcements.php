<?php

class Announcements extends CI_Model {
	var $table = "announcements";
	
	function __construct()
	{
		parent::__construct();	
	}
	
	function get_all($institution_id, $building_id)
	{
		$this->db->select('*');
		$this->db->where('institution_id', $institution_id);
		$this->db->where('building_id', $building_id);
		$this->db->order_by("LastModificationTime", "asc"); 
		return $this->db->get($this->table);
	}
	
	

}

?>
