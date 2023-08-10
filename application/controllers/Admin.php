<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_webinar'] = $this->db->get('daftar_webinar')->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('admin/footer');
	}
    
    public function Absensi()
	{
		$data['title'] = 'Absen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['absensi'] = $this->db->get('absensi')->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/absensi', $data);
        $this->load->view('admin/footer');
	}
	public function Profile()
	{
		$data['title'] = 'Profile admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer');
	}
}
