<?php

class Notes extends CI_Model {
	var $table = "notes";
	
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
	
	function get_all_today($institution_id, $building_id)
	{
		$this->db->select('*');
		$this->db->where('notes.institution_id', $institution_id);
		$this->db->where('notes.building_id', $building_id);
		$this->db->where("( notes.LastModificationTime >= '".date("Y-m-d")." 00:00:00' )");
		$this->db->join('users', 'users.id = notes.author_id');
		$this->db->order_by("LastModificationTime", "asc"); 
		
		return $this->db->get($this->table);
	}
	
	function get_todays_note($institution_id, $building_id, $user_id)
	{
		$this->db->select('*');
		$this->db->where('institution_id', $institution_id);
		$this->db->where('building_id', $building_id);
		$this->db->where('author_id', $user_id);
		$this->db->where("( notes.LastModificationTime >= '".date("Y-m-d")." 00:00:00' AND notes.LastModificationTime <= '".date("Y-m-d")." 23:59:59')");
		
		return $this->db->get($this->table);
	}
	
	function update_or_insert_todays_note($data)
	{
		$todays_note = $this->get_todays_note($data['institution_id'], $data['building_id'], $data['author_id']);
		if ($todays_note->num_rows() > 0)
		{
			// update
			$noteID = $todays_note->row()->id;
			$this->db->where('id', $noteID);
			$this->db->update($this->table, $data); 
		} else {
			// insert
			$this->db->insert($this->table, $data);
		}
		
	}

}

?>
