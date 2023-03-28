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
                $pesan = $pesan . "*". $nama_wartawan . "* - " . "Tulisan : " . $no . " Poin : " . $total_poin . "\n"; 
                $nama_wartawan = $data->nama_wartawan; 
                $no = 1;
                $total_poin = $data->bobot_berita; 
            } else { 
                $no++;
                $total_poin = $total_poin + $data->bobot_berita;
            } 
        } 

        $kalimat = "*[STATISTIK PERKEMBANGAN BULANAN]*\n\n*Total Tulisan* " . date("Y") . "/" . date("m"). " = ". $total_tulisan . "\n\n" . $pesan . "\n\ndiupdate pada " . date("d-m-Y H:i:sa") . "\nInfo lengkap bisa diakses melalui https://iklan.jtnweb.my.id\nPassword Kontak IT";
        $this->wa->send("081231390340", $kalimat);
        if (date("H") > "19") {
            $this->wa->send("081333673000", $kalimat);
            $this->wa->send("082233303178", $kalimat);
        }
    }

    function waHarian()
    {
        $this->load->model("statistik_m");
        $this->load->library("hitung");
		$id	= $this->uri->segment(3);

		$row = $this->statistik_m->listBeritaToday();
		$total_tulisan = $this->statistik_m->totalTulisanHariIni()->num_rows();

        $nama_wartawan = null;
        $total_poin = null;
        $no = 1;
        $pesan = "";

        foreach ($row->result() as $key => $data) {
            if ($data->nama_wartawan != $nama_wartawan) {
                $pesan = $pesan . "*". $nama_wartawan . "* - " . "Tulisan : " . $no . " Poin : " . $total_poin . "\n"; 
                $nama_wartawan = $data->nama_wartawan; 
                $no = 1;
                $total_poin = $data->bobot_berita; 
            } else { 
                $no++;
                $total_poin = $total_poin + $data->bobot_berita;
            } 
        }
        
        if (date("H") < "13") {
            $waktu = "SIANG PER JAM 12.00";
        } else {
            $waktu = "MALAM PER JAM 21.00";
        }

        $kalimat = "*[UPDATE TULISAN ". $waktu ."]*\n\n*Total Tulisan* " . date("d") . "/" . date("m") . "/" . date("Y"). " = ". $total_tulisan . "\n\n" . $pesan . "\n\ndiupdate pada " . date("d-m-Y H:i:sa") . "\nInfo lengkap bisa diakses melalui https://iklan.jtnweb.my.id\nPassword Kontak IT";

        $this->wa->send("081231390340", $kalimat); // Fitrah backup
        $this->wa->send("081333673000", $kalimat); // Mas Heri
        $this->wa->send("082233303178", $kalimat); // Mas Firdaus
        $this->wa->send("081230379610", $kalimat); // Pak Yunan
        $this->wa->send("081334754331", $kalimat); // Pak Yayak
        $this->wa->send("085258927995", $kalimat); // Nyla
        $this->wa->send("081222882015", $kalimat); // Pak Nana
        $this->wa->send("085655525338", $kalimat); // Mbak Nia

    }

    function waPending()
    {
        $this->load->model("statistik_m");

		$row = $this->statistik_m->listBeritaPendingToday();
        $no = 1;
        $pesan = "";

        foreach ($row->result() as $key => $data) {
            $pesan = $pesan . $no . ". " . $data->nama_wartawan . " - " . substr($data->judul,0,20) . "...\n";
            $no++;
        } 

        $kalimat = "*[BERITA PENDING PER JAM ". date("H:i") . " TANGGAL " . date("d-m-y") . "]" . "\n\n" . $pesan . "\n\ndiupdate pada " . date("d-m-Y H:i:sa") . "\n*Abaikan jika memang ada duplikat di draft";

        $this->wa->send("081231390340", $kalimat); // Fitrah backup
        $this->wa->send("081333673000", $kalimat); // Mas Heri
        $this->wa->send("082233303178", $kalimat); // Mas Firdaus
        $this->wa->send("081230379610", $kalimat); // Pak Yunan
        $this->wa->send("081334754331", $kalimat); // Pak Yayak
        $this->wa->send("085258927995", $kalimat); // Nyla
        $this->wa->send("081222882015", $kalimat); // Pak Nana
        $this->wa->send("085655525338", $kalimat); // Mbak Nia

    }
}
