<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('Report_model');
		$this->load->database();
		$report['data'] = $this->Report_model->getAllReport();

		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if($API->connect( $ip, $user, $password)){

			$hotspotactive = $API->comm('/ip/hotspot/active/print');
			$resource = $API->comm('/system/resource/print');
			$secret = $API->comm('/ppp/secret/print');
			$secretactive = $API->comm('/ppp/active/print');
			$interface = $API->comm('/interface/print');
			$routerboard = $API->comm('/system/routerboard/print');
			$identity = $API->comm('/system/identity/print');

	
			$data = [
				'menu' => 'Dashboard',
				'totalsecret' => count($secret),
				'totalhotspot' => count($hotspotactive),
				'hotspotactive' => count($hotspotactive),
				'secretactive' => count($secretactive),
				'cpu' => $resource[0]['cpu-load'],
				'uptime' => $resource[0]['uptime'],
				'version' => $resource[0]['version'],
				'interface' => $interface,
				'boardname' => $resource[0]['board-name'],
				'freememory' => $resource[0]['free-memory'],
                'freehdd' => $resource[0]['free-hdd-space'],
				'model' => $routerboard[0]['model'],
				'identity' => $identity[0]['name'],
			];


			$menu['menu'] = 'Dashboard';
			$data['title'] = 'Dashboard';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar',$menu);
			$this->load->view('dashboard', $data, $report); //view content
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



	public function traffic($interface)
	{
        $ip = $this->session->userdata('ip');
        $user = $this->session->userdata('user');
        $password = $this->session->userdata('password');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $password)) {
            $interface = $API->comm('/interface/monitor-traffic', array(
            'interface' => $interface,
            'once' => '',
        ));

            $rx = $interface[0]['rx-bits-per-second'];
            $tx = $interface[0]['tx-bits-per-second'];

            $data = [
            'rx' => $rx,
            'tx' => $tx,
        ];

            $this->load->view('realtime/traffic', $data);

        } else {
            echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
        }
    }



	public function cpu()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {

		$cpu = $API->comm('/system/resource/print');

		$data = [
			'cpu' => $cpu['0']['cpu-load'],
		];

		$this->load->view('realtime/cpu', $data);


		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
		}

	}


	public function uptime()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new RouterosAPI();
		$API->debug = false;

        if ($API->connect($ip, $user, $password)) {

		$uptime = $API->comm('/system/resource/print');

		$data = [
			'uptime' => $uptime['0']['uptime'],
		];

		$this->load->view('realtime/uptime', $data);

		} else {
			echo "<font color='#ff0000'><h1>Connection Failed!!</h1></font>";
		}

	}

}

ini_set('display_errors', 'off');
