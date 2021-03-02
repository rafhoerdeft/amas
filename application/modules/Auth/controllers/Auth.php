<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Auth_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('Login');
	}

	public function cek_login()
	{
		$username = html_escape(htmlspecialchars_decode($this->input->post('username', TRUE)));
		$password = html_escape(htmlspecialchars_decode($this->input->post('password', TRUE)));
		$pass = md5($password);

		// echo $username.' AND '.$pass; exit();

		// $where = "username = '$username' AND password = '$pass' AND active = 1";

		$where = array(
			'username' => $username,
			'password' => $pass,
			'active' => 1
		);

		$hasil = $this->MasterData->getWhereDataAll('tbl_user', $where);

		if ($hasil->num_rows() == 1) {
			$id_role = $hasil->row()->id_role;

			$data_role = $this->MasterData->getWhereData('*', 'tbl_role', "id_role = $id_role")->row();

			$role = $data_role->modul;
			$color = $data_role->color;

			$sess_data['id_user'] 		= $hasil->row()->id_user;
			$sess_data['nama_user'] 	= $hasil->row()->nama_user;
			$sess_data['username'] 		= $hasil->row()->username;
			$sess_data['role'] 			= $role;
			$sess_data['theme_color'] 	= $color;
			$sess_data['logs'] 			= 'Sim_asset_' . $role;

			$ipaddress = $this->input->ip_address();

			$data = array(
				'id_user' 		=> $hasil->row()->id_user,
				'waktu_logs' 	=> date('Y-m-d H:i:s'),
				'ip_address' 	=> $ipaddress
			);
			$this->MasterData->inputData($data, 'tbl_logs');
			$sess_data['id_logs'] = $this->db->insert_id();

			$this->session->set_userdata($sess_data);

			$link = base_url($role);

			$datas = ['success' => true, 'role' => $role, 'link' => $link];
		} else {
			$datas = ['success' => false];
		}

		echo json_encode($datas);
	}

	public function logout()
	{
		// Hapus semua data pada session
		$this->session->sess_destroy();

		// redirect ke halaman login	
		redirect('Auth');
	}
}
