<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model("iklan_m");
	}

	public function index()
	{
		redirect();
	}

	/*
		###################################
		Modul untuk Kontrak
		###################################
	*/
    public function kontrak()
    {
		$this->load->model("iklan_m");
		$id	= $this->uri->segment(3);

		$data['menu'] = "Kontrak Berjalan JTN";
		$data['row'] = $this->iklan_m->getKontrakNow();
		$this->templateadmin->load('template/detail', 'iklan/data_kontrak', $data);
    }

    public function tambahKontrak()
	{
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;

		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menambahkan data');
			redirect("");
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$id	= $this->uri->segment(3);
			$data['menu'] = "Tambah Kontrak Iklan";
			$this->templateadmin->load('template/detail', 'iklan/tambah_kontrak', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->iklan_m->simpanKontrak($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Kontrak berhasil ditambahkan');
			}
			redirect('iklan/kontrak');
		}
	}
	
	public function editKontrak($id)
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->iklan_m->getKontrak($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Kontrak";
				$this->templateadmin->load('template/detail', 'iklan/edit_kontrak', $data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='" . site_url('iklan/kontrak') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->iklan_m->updateKontrak($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Kontrak Berhasil Di Edit');
			}
			redirect('iklan/kontrak');
		}
	}

	function hapusKontrak()
	{
		$id = $this->uri->segment(3);
		$this->iklan_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('iklan/kontrak');
	}

	/*
		###################################
		End Modul untuk Kontrak
		###################################
	*/

	/*
		###################################
		Modul untuk Iklan
		###################################
	*/
	public function tambahIklan()
	{
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;

		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menambahkan data');
			redirect("");
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$id	= $this->uri->segment(3);
			$data['menu'] = "Tambah Iklan";
			$this->templateadmin->load('template/detail', 'iklan/tambah_iklan', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->iklan_m->simpanIklan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Iklan berhasil ditambahkan');
			}
			redirect('');
		}
	}
}
