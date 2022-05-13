<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ethernet extends CI_Controller
{

	public function index()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$interface = $API->comm('/interface/ethernet/print');

			$data = [
				'menu' => 'Ethernet',
				'interface' => $interface,
			];


			$menu['menu'] = 'Ethernet';
			$data['title'] = 'Ethernet';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $menu);
			$this->load->view('ethernet/index', $data); //view content
			$this->load->view('template/main');
			$this->load->view('template/js');
		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
			echo "<a href='auth'><<<---Back to Login--->>></a>";
			// redirect('auth');
		}
	}



	public function traffic($interface)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
				"interface" => $interface,
				"once" => "",
			));
			$ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
			$frx = $getinterfacetraffic[0]['rx-bits-per-second'];

			$rows['name'] = 'Tx';
			$rows['data'][] = $ftx;
			$rows2['name'] = 'Rx';
			$rows2['data'][] = $frx;
			$result = array();

			array_push($result, $rows);
			array_push($result, $rows2);
			print json_encode($result);


		} else {
			echo "<font color='#ff0000'>Connection Failed!!</font>";
		}

		$API->disconnect();
	}
}
