<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index()
	{
		$data['title'] = 'absensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['absensi'] = $this->absensi_m->getAbsensi();

        $this->load->view('Admin/header', $data);
        $this->load->view('absensi/index', $data);
        $this->load->view('Admin/footer');
	}
    public function approved($id)
	{
		$this->db->set('status', 'approved');
		$this->db->where('id_absensi', $id);
		$this->db->update('absensi');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keluarga Di Approve !!!</div>');
		redirect('index.php/absensi');
	}
	public function rejected($id)
	{
		$this->db->set('status', 'rejected');
		$this->db->where('id_absensi', $id);
		$this->db->update('absensi');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keluarga Di Reject !!!</div>');
		redirect('index.php/absensi');
	}
}
