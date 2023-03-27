<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan_m extends CI_Model
{
	// Modul Kontrak
	public function getKontrak($id = null)
	{
		$this->db->from('tb_vendor_iklan');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('mulai_tgl', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getKontrakNow($id = null)
	{
		$this->db->from('tb_vendor_iklan');
		if ($id != null) {
			$this->db->where('id', $id);
		}
        $this->db->where('status', "berjalan");
		$this->db->order_by('mulai_tgl', 'ASC');
		$query = $this->db->get();
		return $query;
	}

    function simpanKontrak($post)
	{
		$params['id'] =  "";
		$params['vendor'] =  strtoupper($post['vendor']);
		$params['mulai_tgl'] =  $post['mulai_tgl'];
		$params['sampai_tgl'] =  $post['sampai_tgl'];
		$params['nilai'] =  $post['nilai'];
		$params['q_berita'] =  $post['q_berita'];
		$params['q_grafis'] =  $post['q_grafis'];
		$params['q_video'] =  $post['q_video'];
		$params['status'] =  $post['status'];
		$params['keterangan'] =  $post['keterangan'];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$this->db->insert('tb_vendor_iklan', $params);
	}

	function updateKontrak($post)
	{
		$params['id'] =  $post['id'];
		$params['vendor'] =  strtoupper($post['vendor']);
		$params['mulai_tgl'] =  $post['mulai_tgl'];
		$params['sampai_tgl'] =  $post['sampai_tgl'];
		$params['nilai'] =  $post['nilai'];
		$params['q_berita'] =  $post['q_berita'];
		$params['q_grafis'] =  $post['q_grafis'];
		$params['q_video'] =  $post['q_video'];
		$params['status'] =  $post['status'];
		$params['keterangan'] =  $post['keterangan'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_vendor_iklan', $params);
	}

	// End Modul Iklan

	function simpanIklan($post)
	{
		$params['id'] =  "";
		$params['tipe'] =  $post['tipe'];
		$params['vendor'] =  $post['vendor'];
		$params['media'] =  $post['media'];
		$params['url'] =  $post['url'];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$this->db->insert('tb_iklan', $params);
	}

	function hapus($id)
	{
		$this->db->where('vendor', $id);
		$this->db->delete('tb_iklan');

		$this->db->where('id', $id);
		$this->db->delete('tb_vendor_iklan');
	}

	function pencarian($katakunci)
	{
		$this->db->from('tb_iklan');
		$this->db->like('deskripsi', $katakunci, 'both');
		$query = $this->db->get();
		return $query;
	}

}
