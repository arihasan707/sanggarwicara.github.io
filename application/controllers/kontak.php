<?php
class Kontak extends CI_Controller
{
        function __construct()
        {
                parent::__construct();
                $this->load->model('m_kontak');
        }
        function kirim_pesan()
        {
                $nama = str_replace("'", "", $this->input->post('xnama', TRUE));
                $email = str_replace("'", "", $this->input->post('xemail', TRUE));
                $kontak = str_replace("'", "", $this->input->post('xkontak', TRUE));
                $pesan = str_replace("'", "", $this->input->post('xpesan', TRUE));
                $this->m_kontak->kirim_pesan($nama, $email, $kontak, $pesan);
                echo $this->session->set_flashdata('sukses', '<strong>Terima Kasih</strong>');
                redirect('home/kontak');
        }
}
