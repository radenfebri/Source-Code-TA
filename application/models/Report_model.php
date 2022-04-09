<?php

class Report_model extends CI_Model {
	public function getAllReport()
	{
		return $this->db->order_by('id', 'desc')->get('reports')->result_array();
	}

	public function getData()
	{
		return $this->db->order_by('id', 'desc')->limit(5)->get('reports')->result_array();
	}

	public function getTwo()
	{
		return $this->db->order_by('id', 'desc')->limit(2)->get('reports')->result_array();
	}

	public function getSearch()
	{
		$query = $this->db->query("SELECT * FROM  reports WHERE time");
		return $query->result();
	}
}
