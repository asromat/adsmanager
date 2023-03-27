<?php

use Monolog\Handler\IFTTTHandler;

ob_start();

defined('BASEPATH') or exit('No direct script access allowed');
class Notify extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("wa");
    }

    function index()
    {
        redirect("");
    }

    function waFitrah()
    {
        $this->load->model("statistik_m");
        $this->load->library("hitung");
		$id	= $this->uri->segment(3);

		$row = $this->statistik_m->listBerita();
		$total_tulisan = $this->statistik_m->totalTulisanBulanIni()->num_rows();

        $nama_wartawan = null;
        $total_poin = null;
        $no = 1;
        $pesan = "";

        foreach ($row->result() as $key => $data) {
            if ($data->nama_wartawan != $nama_wartawan) {
                $pesan = $pesan . $nama_wartawan . " - " . "Tulisan : " . $no . " Poin : " . $total_poin . "\n"; 
                $nama_wartawan = $data->nama_wartawan; 
                $no = 1;
                $total_poin = $data->bobot_berita; 
            } else { 
                $no++;
                $total_poin = $total_poin + $data->bobot_berita;
            } 
        } 

        $kalimat = "*[UPDATE PERKEMBANGAN WARTAWAN JTN NETWORK]*\n\n*Total Tulisan* " . date("Y") . "/" . date("m"). " = ". $total_tulisan . "\n\n" . $pesan . "\n\ndiupdate pada " . date("d-m-Y H:i:sa") . "\nInfo lengkap bisa diakses melalui https://iklan.jtnweb.my.id\nPassword Kontak IT";
        $this->wa->send("081231390340", $kalimat);
        if (date("H") > "19") {
            $this->wa->send("081333673000", $kalimat);
            $this->wa->send("082233303178", $kalimat);
        }
    }
}
