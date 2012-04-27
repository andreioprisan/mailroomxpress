<?php

class Search extends CI_Model {
	var $table = "roster";
	
	function __construct()
	{
		parent::__construct();	
	}
	
	function post()
	{
		echo "a";
	}
	
	function get_results($institution_id, $building_id, $query)
	{
		// process the automatic card reader
		$isnnumbersearch = explode(";", $query);
		if (count($isnnumbersearch) > 1)
		{
			$isnnumbersearch2 = explode("=", $isnnumbersearch[1]);
			$nnumbernon = substr($isnnumbersearch2[0], 1, 8);
			$nnumbersearch = "N".$nnumbernon;				
		} else {
			$nnumbernon = null;
		}
		
		if (is_numeric($nnumbernon)) {
			$extraonlyifswiped = "OR $this->table.nnumber LIKE '%".$nnumbersearch."%'";
		} else
			$extraonlyifswiped = "";
		
		$tsearch = "";
		$tcount = 0;
		$parsedinput = explode(" ", $query);
		foreach ($parsedinput as $value) 
		{
			if ($tcount >= 1)
				$tsearch .= " AND ";
		    $tsearch .= "($this->table.nnumber LIKE '%".$value."%' ".$extraonlyifswiped." OR $this->table.email  LIKE '%".$value."%' OR  $this->table.lastname LIKE '%".$value."%' OR  $this->table.firstname LIKE '%".$value."%' OR  $this->table.birthday LIKE '%".$value."%' OR  $this->table.room LIKE '%".$value."%' OR $this->table.status LIKE '%".$value."%' OR  $this->table.box LIKE '%".$value."%' OR  $this->table.combo LIKE '%".$value."%') ";
			$tcount++;
		}
		
		$query = "SELECT *, CONCAT($this->table.firstname,' ',$this->table.lastname) as fullname1, CONCAT($this->table.lastname,' ',$this->table.firstname) as fullname2 FROM $this->table WHERE ($tsearch) AND institution_id='$institution_id' AND building_id='$building_id'";

		return $this->db->query($query);
	}
	
	function set_results_status($results)
	{
		if ($results->num_rows() > 0)
			if ($results->num_rows() == 1)
				return "$results->num_rows result found";
			else
				return "$results->num_rows results found";
		else
			return "No results found";
	}

}
?>
