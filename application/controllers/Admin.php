<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_webinar'] = $this->users_m->getDaftarWebinar();

        $this->load->view('admin/header', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('admin/footer');
	}
    public function approved($id)
	{
		$this->db->set('status', 'terdaftar');
		$this->db->where('id_daftar_webinar', $id);
		$this->db->update('daftar_webinar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di Daftarkan !!!</div>');
		redirect('index.php/admin');
	}
	public function rejected($id)
	{
		$this->db->set('status', 'ditolak');
		$this->db->where('id_daftar_webinar', $id);
		$this->db->update('daftar_webinar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di tolak !!!</div>');
		redirect('index.php/admin');
	}
}
