<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpaneladministrator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app');
		$this->load->model('m_agenda');
		$this->load->library('upload');
		$this->load->model('m_galeri_foto');
		$this->load->model('m_admin');
		$this->load->model('m_kontak');
		$this->load->model('m_pengumuman');
		$this->load->model('m_guru');
	}

	public function session()
	{
		if ($this->session->userdata('status') != true) {
			redirect(base_url('admin'));
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();

		redirect('admin');
	}

	public function index()
	{
		$this->session();
		$data['donasi'] = $this->app->get_where("donasi inner join bank on (bank.idBank=donasi.idBank)", array('status' => 'konfirmasi'));
		$data['jumlahdonatur'] = $this->db->query("select count(idDonasi) as jumlahorang from donasi where status='valid'")->row();
		$data['jumlahdonasi'] = $this->db->query("select sum(jumlah) as jumlahuang from donasi where status='valid'")->row();
		$data['jumlahpengeluaran'] = $this->db->query("select sum(jumlah) as jumlahuang from pengeluaran")->row();
		$data['bank'] = $this->app->get_all("bank");
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/dashboard', $data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function logprs()
	{
		$user = $this->input->post('pengguna', TRUE);
		$pass = md5($this->input->post('ksandi', TRUE));

		if ($user == '' || $pass == '') {
			$this->session->set_flashdata('alert', "Username dan Password tidak boleh kosong");
			redirect('login');
		}

		$cek = $this->app->get_where('admin', array('namaPengguna' => $user));

		if ($cek->num_rows() > 0) {
			$data = $cek->row();
			if ($data->kataSandi == $pass) {
				$cekUser = $this->app->get_where('admin', array('idAdmin' => $data->idAdmin));
				$dataSession = $cekUser->row();
				$datauser = array(
					'idAdmin' => $dataSession->idAdmin,
					'nama' => $dataSession->nama,
					'namaPengguna' => $dataSession->namaPengguna,
					'email' => $dataSession->email,
					'status' => 'login',
					'login' => TRUE
				);
				$this->session->set_userdata($datauser);
				redirect('cpaneladministrator');
			} else {
				$this->session->set_flashdata('alert', "Password yang anda masukkan salah..");
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('alert', "Nama Pengguna Ditolak");
			redirect('login');
		}
	}

	public function bank()
	{
		$this->session();

		if ($this->uri->segment(3) == "tambah") {
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahbank');
			$this->load->view('cpaneladministrator/footer');
		} elseif ($this->uri->segment(3) == "prosesimpan") {

			$cek = $this->app->get_where('bank', array('bank' => $this->input->post('bank', TRUE), 'nama' => $this->input->post('nama', TRUE), 'norek' => $this->input->post('norek', TRUE)));
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata('alert', "Bank ini sudah ada");
				redirect('cpaneladministrator/bank');
			} else {
				$data = array(
					'bank' => $this->input->post('bank', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'norek' => $this->input->post('norek', TRUE)
				);

				$this->app->insert('bank', $data);
				$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
				redirect('cpaneladministrator/bank');
			}
		} elseif ($this->uri->segment(3) == "hapus") {
			$kode = $this->input->get('bank');
			$this->app->delete('bank', ['idBank' => $kode]);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('cpaneladministrator/bank');
		} elseif ($this->uri->segment(3) == "edit") {

			$cek = $this->app->get_where('bank', array('bank' => $this->input->post('bank', TRUE), 'nama' => $this->input->post('nama', TRUE), 'norek' => $this->input->post('norek', TRUE)));
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata('alert', "Bank ini sudah ada");
				redirect('cpaneladministrator/bank');
			} else {

				$data = array(
					'bank' => $this->input->post('bank', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'norek' => $this->input->post('norek', TRUE)
				);

				$cond = array('idBank' => $this->input->post('idBank'));
				$update = $this->app->update('bank', $data, $cond);
				$this->session->set_flashdata('sukses', "Bank Telah Di Update");
				redirect('cpaneladministrator/bank');
			}
		} else {
			$data['data'] = $this->app->get_all("bank");
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/bank', $data);
			$this->load->view('cpaneladministrator/footer');
		}
	}

	public function inbox()
	{
		$this->session();
		$this->m_kontak->update_status_kontak();
		$data['data'] = $this->m_kontak->get_all_inbox();
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/inbox', $data);
		$this->load->view('cpaneladministrator/footer');
	}


	public function akunadmin()
	{
		$this->session();
		if ($this->uri->segment(3) == "tambah") {
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahakunadmin');
			$this->load->view('cpaneladministrator/footer');
		} elseif ($this->uri->segment(3) == "hapus") {
			$kode = $this->input->get('admin');
			$this->app->delete('admin', ['idAdmin' => $kode]);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('cpaneladministrator/akunadmin');
		} else {
			$data['data'] = $this->app->get_all('admin');
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/admin', $data);
			$this->load->view('cpaneladministrator/footer');
		}
	}

	public function simpanakunadmin()
	{
		$this->session();
		$cek = $this->app->get_all("admin where namaPengguna='" . $this->input->post('namaPengguna') . "' or email='" . $this->input->post('email') . "'");
		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('alert', "Nama Pengguna atau Email sudah digunakan");
			redirect('cpaneladministrator/akunadmin');
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'namaPengguna' => $this->input->post('namaPengguna', TRUE),
				'email' => $this->input->post('email', TRUE),
				'kataSandi' => md5($this->input->post('katasandi', TRUE))
			);

			$this->app->insert('admin', $data);
			$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
			redirect('cpaneladministrator/akunadmin');
		}
	}

	public function tentang()
	{
		$this->session();
		if ($this->uri->segment(3) == "tambah") {
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahabout');
			$this->load->view('cpaneladministrator/footer');
		} elseif ($this->uri->segment(3) == "prosessimpan") {

			$cek = $this->app->get_all("tentang_kami");
			if ($cek->num_rows() > 0) {
				$data = array('isi' => $this->input->post('isi', TRUE));
				$id = 0;
				$cond = array('idTentangKami<>' => $id);
				$update = $this->app->update('tentang_kami', $data, $cond);
				$this->session->set_flashdata('sukses', "Data Update");
				redirect('cpaneladministrator/tentang');
			} else {
				$data = array('isi' => $this->input->post('isi', TRUE));

				$this->app->insert('tentang_kami', $data);
				$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
				redirect('cpaneladministrator/tentang');
			}
		} else {
			$data['data'] = $this->app->get_all('tentang_kami')->row();
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/about', $data);
			$this->load->view('cpaneladministrator/footer');
		}
	}

	public function prosesvalidasi()
	{
		$this->session();

		date_default_timezone_set('Asia/Jakarta');
		$harivar = date("Y-m-d h:i:s");

		$nama = "";
		if ($this->input->post('anonim') == "anonim") {
			$nama = "Nama Disamarkan";
		} else {
			$nama = $this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {


			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile = $upload_data['file_name'];

				$data = array(
					'idBank' => $this->input->post('bank', TRUE),
					'tanggal' => $harivar,
					'nama' => $this->input->post('nama'),
					'namaPublish' => $nama,
					'email' => $this->input->post('email', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'bukti' => $namaFile,
					'status' => $this->input->post('valid', TRUE)
				);

				$cond = array('idDonasi' => $this->input->post('idDonasi', TRUE));
				$update = $this->app->update('donasi', $data, $cond);
				$this->session->set_flashdata('sukses', "Konfirmasi diterima");
				redirect('cpaneladministrator');
			} else {
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator', 'refresh');
			}
		} else {
			$data = array(
				'idBank' => $this->input->post('bank', TRUE),
				'tanggal' => $harivar,
				'nama' => $this->input->post('nama'),
				'namaPublish' => $nama,
				'email' => $this->input->post('email', TRUE),
				'jumlah' => $this->input->post('jumlah', TRUE),
				'bukti' => $this->input->post('bukti', TRUE),
				'status' => $this->input->post('valid', TRUE)
			);

			$cond = array('idDonasi' => $this->input->post('idDonasi', TRUE));
			$update = $this->app->update('donasi', $data, $cond);
			$this->session->set_flashdata('sukses', "Konfirmasi diterima");
			redirect('cpaneladministrator');
		}
	}

	public function donasi()
	{
		$this->session();
		$data['bank'] = $this->app->get_all("bank");
		$data['donasi'] = $this->app->get_where("donasi inner join bank on (bank.idBank=donasi.idBank)", array("status<>" => "konfirmasi"));
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/donasi', $data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function tambahdonasi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$harivar = date("Y-m-d h:i:s");

		$nama = "";
		if ($this->input->post('anonim') == "anonim") {
			$nama = "Nama Disamarkan";
		} else {
			$nama = $this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {


			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile = $upload_data['file_name'];

				$data = array(
					'idBank' => $this->input->post('bank', TRUE),
					'tanggal' => $harivar,
					'nama' => $this->input->post('nama'),
					'namaPublish' => $nama,
					'email' => $this->input->post('email', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'bukti' => $namaFile,
					'status' => 'valid'
				);

				$this->app->insert('donasi', $data);
				$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
				redirect('cpaneladministrator/donasi', 'refresh');
			} else {
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator/donasi', 'refresh');
			}
		} else {
			$data = array(
				'idBank' => $this->input->post('bank', TRUE),
				'tanggal' => $harivar,
				'nama' => $this->input->post('nama'),
				'namaPublish' => $nama,
				'email' => $this->input->post('email', TRUE),
				'jumlah' => $this->input->post('jumlah', TRUE),
				'bukti' => "",
				'status' => 'valid'
			);

			$this->app->insert('donasi', $data);
			$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
			redirect('cpaneladministrator/donasi', 'refresh');
		}
	}


	public function penyaluran()
	{
		$this->session();
		$data['bank'] = $this->app->get_all("bank");
		$data['penyaluran'] = $this->app->get_all("pengeluaran");
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/pengeluaran', $data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function tambahpengeluaran()
	{
		$this->session();
		date_default_timezone_set('Asia/Jakarta');
		$harivar = date("Y-m-d h:i:s");

		$data = array(
			'tanggal' => $this->input->post('tanggal', TRUE),
			'judul' => $this->input->post('judul', TRUE),
			'jumlah' => $this->input->post('jumlah', TRUE),
			'ket' => $this->input->post('ket', TRUE)
		);

		$this->app->insert('pengeluaran', $data);
		$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
		redirect('cpaneladministrator/penyaluran');
	}

	public function editpengeluaran()
	{
		$this->session();
		date_default_timezone_set('Asia/Jakarta');
		$harivar = date("Y-m-d h:i:s");

		$data = array(
			'tanggal' => $this->input->post('tanggal', TRUE),
			'judul' => $this->input->post('judul', TRUE),
			'jumlah' => $this->input->post('jumlah', TRUE),
			'ket' => $this->input->post('ket', TRUE)
		);

		$cond = array('idpengeluaran' => $this->input->post('idpengeluaran', TRUE));
		$update = $this->app->update('pengeluaran', $data, $cond);
		$this->session->set_flashdata('sukses', "Konfirmasi diterima");
		redirect('cpaneladministrator/penyaluran');
	}

	public function hapuspengeluaran()
	{
		$kode = $this->input->get('edit');
		$this->app->delete('pengeluaran', ['idpengeluaran' => $kode]);
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('cpaneladministrator/penyaluran');
	}


	public function prosesvalidasi2()
	{
		$this->session();

		date_default_timezone_set('Asia/Jakarta');
		$harivar = date("Y-m-d h:i:s");

		$nama = "";
		if ($this->input->post('anonim') == "anonim") {
			$nama = "Nama Disamarkan";
		} else {
			$nama = $this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {


			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile = $upload_data['file_name'];

				$data = array(
					'idBank' => $this->input->post('bank', TRUE),
					'tanggal' => $harivar,
					'nama' => $this->input->post('nama'),
					'namaPublish' => $nama,
					'email' => $this->input->post('email', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'bukti' => $namaFile,
					'status' => $this->input->post('valid', TRUE)
				);

				$cond = array('idDonasi' => $this->input->post('idDonasi', TRUE));
				$update = $this->app->update('donasi', $data, $cond);
				$this->session->set_flashdata('sukses', "Konfirmasi diterima");
				redirect('cpaneladministrator/donasi');
			} else {
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator/donasi', 'refresh');
			}
		} else {
			$data = array(
				'idBank' => $this->input->post('bank', TRUE),
				'tanggal' => $harivar,
				'nama' => $this->input->post('nama'),
				'namaPublish' => $nama,
				'email' => $this->input->post('email', TRUE),
				'jumlah' => $this->input->post('jumlah', TRUE),
				'bukti' => $this->input->post('bukti', TRUE),
				'status' => $this->input->post('valid', TRUE)
			);

			$cond = array('idDonasi' => $this->input->post('idDonasi', TRUE));
			$update = $this->app->update('donasi', $data, $cond);
			$this->session->set_flashdata('sukses', "Konfirmasi diterima");
			redirect('cpaneladministrator/donasi');
		}
	}

	function agenda()
	{
		$this->session();
		$x['data'] = $this->m_agenda->get_all_agenda();
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/v_agenda', $x);
		$this->load->view('cpaneladministrator/footer');
	}

	function simpan_agenda()
	{
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$waktu = $this->input->post('xwaktu');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
		echo $this->session->set_flashdata('sukses', '<strong>Ditambah</strong>');
		redirect('cpaneladministrator/agenda');
	}

	function update_agenda()
	{
		$kode = strip_tags($this->input->post('kode'));
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$waktu = $this->input->post('xwaktu');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->update_agenda($kode, $nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
		echo $this->session->set_flashdata('sukses',  '<strong>Diubah</strong>');
		redirect('cpaneladministrator/agenda');
	}
	function hapus_agenda()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_agenda->hapus_agenda($kode);
		echo $this->session->set_flashdata('sukses',  '<strong>Dihapus</strong>');
		redirect('cpaneladministrator/agenda');
	}

	function galeri_foto()
	{
		$this->session();
		$x['data'] = $this->m_galeri_foto->get_all_galeri();
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/v_galeri_foto', $x);
		$this->load->view('cpaneladministrator/footer');
	}

	function simpan_galeri()
	{
		$this->session();
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$this->m_galeri_foto->simpan_galeri($judul, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('cpaneladministrator/galeri_foto');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('cpaneladministrator/galeri_foto');
			}
		} else {
			redirect('cpaneladministrator/galeri_foto');
		}
	}

	function update_galeri()
	{
		$this->session();
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $gbr['file_name'];
				$galeri_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$this->m_galeri_foto->update_galeri($galeri_id, $judul, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('cpaneladministrator/galeri_foto');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('cpaneladministrator/galeri_foto');
			}
		} else {
			$galeri_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$this->m_galeri_foto->update_galeri_tanpa_img($galeri_id, $judul);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('cpaneladministrator/galeri_foto');
		}
	}

	function hapus_galeri()
	{
		$this->session();
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_galeri_foto->hapus_galeri($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('cpaneladministrator/galeri_foto');
	}

	function pengumuman()
	{
		$this->session();
		$x['data'] = $this->m_pengumuman->get_all_pengumuman();
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/v_pengumuman', $x);
		$this->load->view('cpaneladministrator/footer');
	}

	function simpan_pengumuman()
	{
		$this->session();
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi);
		echo $this->session->set_flashdata('sukses', '<strong>Ditambah</strong>');
		redirect('cpaneladministrator/pengumuman');
	}

	function update_pengumuman()
	{
		$this->session();
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi);
		echo $this->session->set_flashdata('sukses', '<strong>Diubah</strong>');
		redirect('cpaneladministrator/pengumuman');
	}
	function hapus_pengumuman()
	{
		$this->session();
		$kode = strip_tags($this->input->post('kode'));
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('sukses', '<strong>Dihapus</strong>');
		redirect('cpaneladministrator/pengumuman');
	}

	function guru()
	{
		$this->session();
		$x['data'] = $this->m_guru->get_all_guru();
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/v_guru', $x);
		$this->load->view('cpaneladministrator/footer');
	}

	function simpan_guru()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
				$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_guru->simpan_guru($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
				echo $this->session->set_flashdata('sukses',  '<strong>Ditambah</strong>');
				redirect('cpaneladministrator/guru');
			} else {
				echo $this->session->set_flashdata('alert', 'warning');
				redirect('cpaneladministrator/guru');
			}
		} else {
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
			$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
			$mapel = strip_tags($this->input->post('xmapel'));

			$this->m_guru->simpan_guru_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
			echo $this->session->set_flashdata('sukses',  '<strong>Ditambah</strong>');
			redirect('cpaneladministrator/guru');
		}
	}

	function update_guru()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './assets/images/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
				$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_guru->update_guru($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
				echo $this->session->set_flashdata('sukses',  '<strong>Diubah</strong>');
				redirect('cpaneladministrator/guru');
			} else {
				echo $this->session->set_flashdata('alert', 'warning');
				redirect('cpaneladministrator/guru');
			}
		} else {
			$kode = $this->input->post('kode');
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
			$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
			$mapel = strip_tags($this->input->post('xmapel'));
			$this->m_guru->update_guru_tanpa_img($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
			echo $this->session->set_flashdata('sukses',  '<strong>Diubah</strong>');
			redirect('cpaneladministrator/guru');
		}
	}

	function hapus_guru()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_guru->hapus_guru($kode);
		echo $this->session->set_flashdata('sukses',  '<strong>Dihapus</strong>');
		redirect('cpaneladministrator/guru');
	}
}
