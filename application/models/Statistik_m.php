<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
    Made with love by Fitrah Izul Falaq
    https://ceo.bikinkarya.com
    081231390340
*/

class Statistik_m extends CI_Model
{

    function getWartawan($id = null)
    {
        $this->db->from('users');
		if ($id != null) {
			$this->db->where('id', $id);
		}
        $this->db->where('company',"JatimTimes");
        $this->db->where('active',"1");
		$query = $this->db->get();
		return $query;
    }

    function listBerita($id = null)
    {
        $this->db->from('tbl_draf');
		if ($id != null) {
			$this->db->where('id', $id);
		}
        $this->db->like('tanggal', date("Y") . "-" . date("m"));
        // $this->db->like('tanggal', "2022" . "-" . "08");
        $this->db->where('nama_wartawan !=', null);
        $this->db->where('status', "3");
        $this->db->order_by("nama_wartawan","asc");
		$query = $this->db->get();
		return $query;
    }

    function listBeritaToday($id = null)
    {
        $this->db->from('tbl_draf');
		if ($id != null) {
			$this->db->where('id', $id);
		}
        // $this->db->like('tanggal', date("Y") . "-" . date("m") . "-" . date("d"));
        $this->db->like('tanggal', "2023-04-02");
        $this->db->where('nama_wartawan !=', null);
        $this->db->where('status', "3");
        $this->db->order_by("nama_wartawan","asc");
		$query = $this->db->get();
		return $query;
    }

    function listBeritaPendingToday($id = null)
    {
        $this->db->from('tbl_draf');
		if ($id != null) {
			$this->db->where('id', $id);
		}
        $this->db->like('tanggal', date("Y") . "-" . date("m") . "-" . date("d"));
        // $this->db->like('tanggal', "2022" . "-" . "08");
        $this->db->where('nama_wartawan !=', null);
        $this->db->where('status', "1");
        $this->db->order_by("nama_wartawan","asc");
		$query = $this->db->get();
		return $query;
    }

    
    public function totalTulisanBulanIni($id = null)
    {
        $this->db->from('db_news');
		if ($id != null) {
            $this->db->like('news_writer', $id);
		}
        $this->db->like('news_datepub', date("Y") . "-" . date("m"));
		$query = $this->db->get();
		return $query;
    }

    public function totalTulisanHariIni($id = null)
    {
        $this->db->from('db_news');
		if ($id != null) {
            $this->db->like('news_writer', $id);
		}
        $this->db->like('news_datepub', date("Y") . "-" . date("m") . "-" . date("d"));
		$query = $this->db->get();
		return $query;
    }
    
    // function listBerita($id = null)
    // {
    //     $this->db->from('db_news');
    // 	if ($id != null) {
    // 		$this->db->where('id', $id);
    // 	}
    //     // $this->db->like('news_datepub', date("Y") . "-" . date("m"));
    //     $this->db->like('news_datepub', "2022" . "-" . "08");
    //     $this->db->where('news_writer !=', null);
    //     $this->db->order_by("news_writer","asc");
    // 	$query = $this->db->get();
    // 	return $query;
    // }
}
