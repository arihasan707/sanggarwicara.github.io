<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends ci_controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('app');
    $this->load->model('m_guru');
    $this->load->model('m_galeri_foto');
    $this->load->model('m_pengumuman');
  }
  public function index()
  {
    $data = array(
      'title'   => 'Beranda',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'isi'     => 'v_beranda'
    );
    $this->load->view('beranda/v_wrapper', $data, FALSE);
  }

  public function tentang()
  {
    $data = array(
      'title'   => 'Tentang',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'guru' => $this->m_guru->guru(),
      'isi'     => 'v_tentang'
    );
    $this->load->view('tentang/v_wrapper', $data, FALSE);
  }
  public function layanan()
  {
    $data = array(
      'title'   => 'Layanan',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'isi'     => 'v_layanan'
    );
    $this->load->view('layanan/v_wrapper', $data, FALSE);
  }

  public function fasilitas()
  {
    $data = array(
      'title'   => 'Fasilitas',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'isi'     => 'v_fasilitas'
    );
    $this->load->view('fasilitas/v_wrapper', $data, FALSE);
  }

  public function donasi()
  {
    $data['tentang'] = $this->app->get_all("tentang_kami")->row();
    $data['donasi'] = $this->app->get_where("donasi", array('status' => 'valid'));
    $data['penyaluran'] = $this->app->get_all("pengeluaran");
    $data['bank'] = $this->app->get_all("bank");
    $data = [
      'isi' => 'v_donasi',
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'title' => 'Donasi'
    ];

    $this->load->view('donasi/v_wrapper', $data);
  }

  public function galeri_foto()
  {
    $data = array(
      'title'   => 'Galeri Foto',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'foto' => $this->m_galeri_foto->get_galeri(),
      'isi'     => 'v_foto'
    );
    $this->load->view('galeri/v_wrapper', $data, FALSE);
  }

  public function galeri_video()
  {
    $data = array(
      'title'   => 'Galeri Video',
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'isi'     => 'v_video'
    );
    $this->load->view('galeri/v_wrapper', $data, FALSE);
  }

  public function pendaftaran()
  {
    $data = array(
      'title'   => 'Pendaftaran',
      'isi'     => 'v_pendaftaran'
    );
    $this->load->view('kontak/v_wrapper', $data, FALSE);
  }

  public function kontak()
  {
    $data = array(
      'title'   => 'Kontak',
      'pengumuman' => $this->m_pengumuman->pengumuman_limit(),
      'galeri' => $this->m_galeri_foto->get_galeri_limit(),
      'isi'     => 'v_kontak'
    );
    $this->load->view('kontak/v_wrapper', $data, FALSE);
  }
}
