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

	#######################################
	#### IKLAN GESER ####
	#######################################

	function getDaerah($id = null)
	{
		$this->db->from('tb_daerah');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('site_title', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	function getIklanGeser($id = null)
	{
		$this->db->from('tb_iklan_geser');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	function updateIklanGeser($post)
	{
		$params['daerah_id'] =  $post['id'];
		$params['url1'] =  $post['url1'];
		$params['url2'] =  $post['url2'];
		$params['url3'] =  $post['url3'];
		$params['url4'] =  $post['url4'];
		$params['url5'] =  $post['url5'];
		$params['url6'] =  $post['url6'];
		$params['url7'] =  $post['url7'];
		$params['url8'] =  $post['url8'];
		$params['url9'] =  $post['url9'];
		$params['url10'] =  $post['url10'];
		$params['url11'] =  $post['url11'];
		$params['url12'] =  $post['url12'];
		$params['url13'] =  $post['url13'];
		$params['url14'] =  $post['url14'];
		$params['url15'] =  $post['url15'];
		$params['url16'] =  $post['url16'];
		$params['url17'] =  $post['url17'];
		$params['url18'] =  $post['url18'];
		$params['url19'] =  $post['url19'];
		$params['url20'] =  $post['url20'];
		$params['created'] =  date("Y:m:d H:i:s");
		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}

}
