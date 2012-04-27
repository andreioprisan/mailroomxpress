<?php

class Date extends CI_Model {
	
	function __construct()
	{
		parent::__construct();	
	}
	
	function dateTime2unixTime($dateTime)
	{
		return strtotime($dateTime);
	}
	
	function unixTime2humanTime($unixTime)
	{
		$dateFormatting = "l, F jS, Y @ g:ia";
		return date($dateFormatting, $unixTime);
	}
	
	function dateTime2humanTime($dateTime)
	{
		return $this->unixTime2humanTime($this->dateTime2unixTime($dateTime));
	}
	
}

?>