<?php

class Report_model extends CI_Model {
	public function getAllReport()
	{
		return $this->db->order_by('id', 'desc')->get('data')->result_array();
	}

	public function getData()
	{
		return $this->db->order_by('id', 'desc')->limit(5)->get('data')->result_array();
	}

	public function getTwo()
	{
		return $this->db->order_by('id', 'desc')->limit(2)->get('data')->result_array();
	}

	public function getSearch()
	{
		$query = $this->db->query("SELECT * FROM  data WHERE time");
		return $query->result();
	}
}
