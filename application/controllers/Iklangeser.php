<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklangeser extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
        $this->load->model("iklan_m");
	}

	public function index()
	{
        $data['menu'] = "Data Iklan Geser";
        $data['row'] = $this->iklan_m->getDaerah();

        $this->templateadmin->load('template/dashboard', 'iklangeser/data_daerah', $data);
	}

    public function edit($id)
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[20]');
		$this->form_validation->set_rules('password', 'password', 'min_length[8]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->iklan_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data siswa";			
				$this->templateadmin->load('template/dashboard','siswa/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('siswa')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->iklan_m->updateIklanGeser($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Edit');
	        }	
	        redirect('siswa');
	    }
	}

}
