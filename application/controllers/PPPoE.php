<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPPoE extends CI_Controller {

	public function secret()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {

		$secret = $API->comm('/ppp/secret/print');
		$profile = $API->comm('/ppp/profile/print');

		$data = [
			'menu' => 'PPPoE',
			'totalsecret' => count($secret),
			'secret' => $secret,
			'profile' => $profile,
		];

		$menu['menu'] = 'PPPoE';
		$data['title'] = 'PPPoE Secret';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $menu);
		$this->load->view('pppoe/secret', $data); //view content
		$this->load->view('template/main');
		$this->load->view('template/js');

		}else{
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}



	public function addSecret()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {	

		if($post['localaddress'] == '') {
			$localaddress = '0.0.0.0';
		} else {
			$localaddress = $post['localaddress'];
		}

		if($post['remoteaddress'] == '') {
			$remoteaddress = '0.0.0.0';
		} else {
			$remoteaddress = $post['remoteaddress'];
		}

		$API->comm('/ppp/secret/add', array(
			'name' => $post['user'],
			'password' => $post['password'],
			'service' => $post['service'],
			'profile' => $post['profile'],
			'local-address' => $localaddress,
			'remote-address' => $remoteaddress,
			'comment' => $post['comment'],
		));	

		redirect('pppoe/secret');

		}else{
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}



	public function editSecret($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {	

			$getuser = $API->comm('/ppp/secret/print', array(
				"?.id" => '*' . $id,
			));	

			$secret = $API->comm('/ppp/secret/print');
			// $profile = $API->comm('/ppp/secret/user/profile/print');


			$data = [
				'menu' => 'PPPoE',
				'user' => $getuser[0],
				'secret' => $secret,
				// 'profile' => $profile,
			];

			// var_dump($data);

			$menu['menu'] = 'PPPoE';
			$data['title'] = 'Edit PPPoE Secret';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $menu);
			$this->load->view('pppoe/edit-secret', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');
			
		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}



		// SIMPAN EDIT SECRET
		public function saveEditSecret()
		{
			$post = $this->input->post(null, true);
			$ip = $this->session->userdata('ip');
			$user = $this->session->userdata('user');
			$password = $this->session->userdata('password');
			$API = new RouterosAPI();
			
			// $API->debug = false;
			$API->connect($ip, $user, $password);

			// PENGECUALIAN
			if($post['localaddress'] == '') {
				$localaddress = '0.0.0.0';
			} else {
				$localaddress = $post['localaddress'];
			}
	
			if($post['remoteaddress'] == '') {
				$remoteaddress = '0.0.0.0';
			} else {
				$remoteaddress = $post['remoteaddress'];
			}


			$API->comm("/ppp/secret/set", array(
				".id" => $post['id'],
				'name' => $post['user'],
				'password' => $post['password'],
				'service' => $post['service'],
				'profile' => $post['profile'],
				'local-address' => $localaddress,
				'remote-address' => $remoteaddress,
				'comment' => $post['comment'],
			));
	
			redirect('pppoe/secret');
		}



	public function delSecret($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {		

		$API->comm('/ppp/secret/remove', array(
			'.id' => '*' . $id
		),);

		redirect('pppoe/secret');

		}else{
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}

	}


	public function active()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {

		$secretactive = $API->comm('/ppp/active/print');

		$data = [
			'menu' => 'PPPoE',
			'totalsecretactive' => count($secretactive),
			'active' => $secretactive,
		];

		// var_dump($secretactive);

		$menu['menu'] = 'PPPoE';
		$data['title'] = 'PPPoE Active';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $menu);
		$this->load->view('pppoe/active', $data); //view content
		$this->load->view('template/main');
		$this->load->view('template/js');

		}else{
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}
}

ini_set('display_errors', 'off');
