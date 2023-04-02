<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    public function index()
    {
        redirect("dashboard");
    }

    public function wartawan()
    {
        $this->load->model("statistik_m");
        $this->load->library("hitung");
		$id	= $this->uri->segment(3);

		$data['menu'] = "Statistik Wartawan";
		// $data['row'] = $this->statistik_m->getWartawan();
		$data['row'] = $this->statistik_m->listBeritaToday();
		$data['total_tulisan'] = $this->statistik_m->totalTulisanBulanIni()->num_rows();
		$this->templateadmin->load('template/detail', 'statistik/wartawan/data', $data);
    }

    function exportWartawan()
	{

        $this->load->model("statistik_m");
        $this->load->library("hitung");
		$id	= $this->uri->segment(3);

		$data['menu'] = "Statistik Wartawan";
		// $data['row'] = $this->statistik_m->getWartawan();
		$data['row'] = $this->statistik_m->listBerita();
		$data['total_tulisan'] = $this->statistik_m->totalTulisanBulanIni()->num_rows();
		$this->load->view("datatables/statistikWartawan", $data);
	}
}
