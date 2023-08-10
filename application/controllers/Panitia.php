<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_webinar'] = $this->db->get('daftar_webinar')->result_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/index', $data);
        $this->load->view('panitia/footer');
	}
    public function Users()
	{
		$data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/users', $data);
        $this->load->view('panitia/footer');
	}
    public function Absensi()
	{
		$data['title'] = 'Absen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['absensi'] = $this->db->get('absensi')->result_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/absensi', $data);
        $this->load->view('panitia/footer');
	}
    public function Webinar()
	{
		$data['title'] = 'Webinar / Seminar Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->db->get('webinar')->result_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/webinar', $data);
        $this->load->view('panitia/footer');
	}
	public function Profile()
	{
		$data['title'] = 'Profile panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/profile', $data);
        $this->load->view('panitia/footer');
	}
}
