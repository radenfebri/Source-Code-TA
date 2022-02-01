<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if($API->connect( $ip, $user, $password)){

			$useractive = $API->comm('/user/active/print');

	
			$data = [
				'menu' => 'User',
				'useractive' => $useractive,
				'totaluseractive' => count($useractive),
			];

			// var_dump($data);


			$menu['menu'] = 'User';
			$data['title'] = 'User Mikrotik Active';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar',$menu);
			$this->load->view('user/index', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');
				  
				  
		}else{
			echo "<center><br>";
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			echo "<button><a href='auth' style='text-decoration: none;'><<<---Back to Login--->>></a></button>";
			echo "</center>";
			// redirect('auth');
		}

	}



	public function useractive()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if($API->connect( $ip, $user, $password)){

			$useractive = $API->comm('/user/active/print');

	
			$data = [
				'menu' => 'User',
				'useractive' => $useractive,
			];

			// var_dump($data);


			$menu['menu'] = 'User';
			$data['title'] = 'User Mikrotik Active';
			$this->load->view('realtime/useractive', $data); //view content
				  
				  
		}else{
			echo "<center><br>";
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			echo "<button><a href='auth' style='text-decoration: none;'><<<---Back to Login--->>></a></button>";
			echo "</center>";
			// redirect('auth');
		}

	}

}

ini_set('display_errors', 'off');
