<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app');
	}

	public function index()
	{
		$this->load->view('cpaneladministrator/login');
	}


	public function loginproses()
	{
		$user = $this->input->post('pengguna', TRUE);
		$pass = md5($this->input->post('ksandi', TRUE));

		if ($user == '' || $pass == '') {
			$this->session->set_flashdata('alert', "Username dan Password tidak boleh kosong");
			redirect('admin');
		}

		$cek = $this->app->get_where('admin', array('namaPengguna' => $user));

		if ($cek->num_rows() > 0) {
			$data = $cek->row();
			if ($data->kataSandi == $pass) {
				$cekUser = $this->app->get_where('admin', array('idAdmin' => $data->idAdmin));
				$dataSession = $cekUser->row();
				$datauser = array(
					'idAdmin' => $dataSession->idAdmin,
					'nama ' => $dataSession->nama,
					'namaPengguna' => $dataSession->namaPengguna,
					'email ' => $dataSession->email,
					'status' => 'login',
					'login' => TRUE
				);
				$this->session->set_userdata($datauser);
				redirect('cpaneladministrator');
			} else {
				$this->session->set_flashdata('alert', "Password yang anda masukkan salah..");
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('alert', "Nama Pengguna Ditolak");
			redirect('admin');
		}
	}
}
