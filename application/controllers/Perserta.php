<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perserta extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['webinar'] = $this->db->get('webinar')->result_array();
        $data['daftar_webinar'] = $this->perserta_m->getDaftarWebinar();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/index', $data);
        $this->load->view('perserta/footer');
	}
	public function Profile()
	{
		$data['title'] = 'Profile Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/profile', $data);
        $this->load->view('perserta/footer');
	}
}
