<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login Router';
		$this->load->view('auth/login', $data); //view content
		$this->load->view('template/js');
	}

	public function login()
	{
		$ip = $this->input->post('ip');
		$user = $this->input->post('user');
		$password = $this->input->post('password');

		$data = [
			'ip' => $ip,
			'user' => $user,
			'password' => $password,
		];
		$this->session->set_userdata($data);
		redirect('dashboard');
	}


	public function logout()
	{
		$this->session->unset_userdata('ip');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('password');
		redirect('auth');
	}
}
