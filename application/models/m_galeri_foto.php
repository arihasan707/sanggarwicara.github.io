<?php
class M_galeri_foto extends CI_Model
{

	function get_all_galeri()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_galeri ORDER BY galeri_id DESC");
		return $hsl;
	}
	function simpan_galeri($judul, $gambar)
	{
		$this->db->trans_start();
		$this->db->query("insert into tbl_galeri(galeri_judul,galeri_gambar) values ('$judul','$gambar')");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	function update_galeri($galeri_id, $judul, $gambar)
	{
		$hsl = $this->db->query("update tbl_galeri set galeri_judul='$judul',galeri_gambar='$gambar' where galeri_id='$galeri_id'");
		return $hsl;
	}
	function update_galeri_tanpa_img($galeri_id, $judul)
	{
		$hsl = $this->db->query("update tbl_galeri set galeri_judul='$judul' where galeri_id='$galeri_id'");
		return $hsl;
	}
	function hapus_galeri($kode)
	{
		$this->db->trans_start();
		$this->db->query("delete from tbl_galeri where galeri_id='$kode'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	//Front-End
	function get_galeri()
	{
		$this->db->select('*');
		$this->db->from('tbl_galeri');
		$this->db->order_by('galeri_id', 'desc');
		return $this->db->get()->result();
	}

	function get_galeri_limit()
	{
		$this->db->select('*');
		$this->db->from('tbl_galeri');
		$this->db->order_by('galeri_id', 'desc');
		$this->db->limit(6);
		$query = $this->db->get()->result();
		return $query;
	}
}
