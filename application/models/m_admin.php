<?php
class M_admin extends CI_Model
{

    function get_pengguna_login($kode)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_admin where idAdmin='$kode'");
        return $hsl;
    }
}
