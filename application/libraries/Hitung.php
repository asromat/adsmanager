<?php 

class Hitung {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	// function totalBerita($wartawan = null)
    // {
	// 	$this->ci->load->model('statistik_m');
    //     $query = $this->ci->statistik_m->totalTulisanBulanIni($wartawan);
	// 	return $query;
	// }

	function totalPoin($value = null,$tahun = null,$bulan = null)
	{
		$this->ci->db->select_sum('bobot_berita');
		$this->ci->db->where("news_writer",$value);
		$this->ci->db->like("created",$tahun."-".$bulan);
		$query = $this->ci->db->get('db_news');
		return $query;
	}


}

?>
