<?php

defined('BASEPATH') or exit('No direct script access allowed');

class detailLayanan extends ci_controller
{

  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = array(
      'title'   => 'Konsultasi',
      'isi'     => 'detail_layanan/v_konsultasi'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function tes_psikologi()
  {
    $data = array(
      'title'   => 'Tes Psikologi',
      'isi'     => 'detail_layanan/v_tes_psikologi'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function terapi()
  {
    $data = array(
      'title'   => 'Terapi',
      'isi'     => 'detail_layanan/v_terapi'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function bimbel()
  {
    $data = array(
      'title'   => 'Bimbel',
      'isi'     => 'detail_layanan/v_bimbel'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function sekolah_khusus()
  {
    $data = array(
      'title'   => 'Sekolah Khusus',
      'isi'     => 'detail_layanan/v_sekolah_khusus'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }


  public function paud()
  {
    $data = array(
      'title'   => 'Paud',
      'isi'     => 'detail_layanan/v_paud'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function home_schooling()
  {
    $data = array(
      'title'   => 'Home Schooling',
      'isi'     => 'detail_layanan/v_home_schooling'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function pelatihan()
  {
    $data = array(
      'title'   => 'Pelatihan',
      'isi'     => 'detail_layanan/v_pelatihan'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }

  public function fun_camp()
  {
    $data = array(
      'title'   => 'Fun Camp',
      'isi'     => 'detail_layanan/v_fun_camp'
    );
    $this->load->view('detail_layanan/layanan/v_wrapper', $data, FALSE);
  }
}
