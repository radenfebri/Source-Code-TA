<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotspot extends CI_Controller
{

	public function users()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$hotspotuser = $API->comm('/ip/hotspot/user/print');
			$server = $API->comm('/ip/hotspot/print');
			$profile = $API->comm('/ip/hotspot/user/profile/print');


			$data = [
				'menu' => 'Hotspot',
				'totalhotspotuser' => count($hotspotuser),
				'hotspotuser' => $hotspotuser,
				'server' => $server,
				'profile' => $profile,
			];

			$menu['menu'] = 'Hotspot';
			$data['title'] = 'Hotspot Users';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $menu);
			$this->load->view('hotspot/users', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');
		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}


	public function addUser()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			if ($post['timelimit'] == '') {
				$timelimit = '0';
			} else {
				$timelimit = $post['timelimit'];
			}

			$API->comm('/ip/hotspot/user/add', array(
				'name' => $post['user'],
				'password' => $post['password'],
				'server' => $post['server'],
				'profile' => $post['profile'],
				'limit-uptime' => $timelimit,
				'comment' => $post['comment'],
			));

			redirect('hotspot/users');
		} else {
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

			$hotspotactive = $API->comm('/ip/hotspot/active/print');

			$data = [
				'menu' => 'Hotspot',
				'totalhotspotactive' => count($hotspotactive),
				'hotspotactive' => $hotspotactive,
			];

			$menu['menu'] = 'Hotspot';
			$data['title'] = 'Hotspot Active';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $menu);
			$this->load->view('hotspot/active', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');
		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}



	public function delUser($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$API->comm('/ip/hotspot/user/remove', array(
				'.id' => '*' . $id
			),);

			redirect('hotspot/users');
		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}



	public function editUser($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$getsecret = $API->comm('/ip/hotspot/user/print', array(
				"?.id" => '*' . $id,
			));
			$server = $API->comm('/ip/hotspot/print');
			$profile = $API->comm('/ip/hotspot/user/profile/print');


			$data = [
				'menu' => 'Hotspot',
				'secret' => $getsecret[0],
				'server' => $server,
				'profile' => $profile,
			];

			$menu['menu'] = 'Hotspot';
			$data['title'] = 'Edit Hotspot Users';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $menu);
			$this->load->view('hotspot/edit-user', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');

		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			redirect('auth');
		}
	}




	// SIMPAN EDIT USER
	public function saveEditUser()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		// $API->debug = false;
		$API->connect($ip, $user, $password);
		// PENGECUALIAN
		if ($post['timelimit'] == "") {
			$timelimit = "0";
		} else {
			$timelimit = $post['timelimit'];
		}
		$API->comm("/ip/hotspot/user/set", array(
			".id" => $post['id'],
			'name' => $post['user'],
			'password' => $post['password'],
			'server' => $post['server'],
			'profile' => $post['profile'],
			'limit-uptime' => $timelimit,
			'comment' => $post['comment'],
		));

		redirect('hotspot/users');
	}
}

ini_set('display_errors', 'off');
