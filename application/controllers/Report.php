<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function up()
	{
		$this->load->model('Report_model');
		$this->load->database();

		$report['data'] = $this->Report_model->getAllReport();
		$menu['menu'] = 'Report';
		$data['title'] = 'Report';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar',$menu);
		$this->load->view('report/up', $report); //view content
		$this->load->view('template/main');
		$this->load->view('template/js');
	}


	public function load()
	{
		$this->load->model('Report_model');
		$this->load->database();

		$report['data'] = $this->Report_model->getData();
		$menu['menu'] = 'Report';
		$data['title'] = 'Report';
		$this->load->view('realtime/load', $report); //view content

	}



	public function load2()
	{
		$this->load->model('Report_model');
		$this->load->database();

		$report['data'] = $this->Report_model->getTwo();
		$menu['menu'] = 'Report';
		$data['title'] = 'Report';
		$this->load->view('realtime/load2', $report); //view content

	}



	public function search()
	{
		$this->load->model('Report_model');
		$this->load->database();


		$report['data'] = $this->Report_model->getAllReport();
		$menu['menu'] = 'Report';
		$data['title'] = 'Report';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar',$menu);
		$this->load->view('report/search', $report); //view content
		$this->load->view('template/main');
		$this->load->view('template/js');
	}


	public function post1()
	{
		$this->load->model('Report_model');
		$this->load->database();

		$report['data'] = $this->Report_model->getAllReport();
		$menu['menu'] = 'Report';
		$data['title'] = 'Report';
		// $this->load->view('template/header', $data);
		// $this->load->view('template/sidebar',$menu);
		$this->load->view('report/post1', $report); //view content
		// $this->load->view('template/main');
		// $this->load->view('template/js');
	}



}

ini_set('display_errors', 'off');
