<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perwebinar extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Webinar / Seminar Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->webinar_m->getWebinar();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/webinar/index', $data);
        $this->load->view('perserta/footer');
	}
    public function daftar()
	{
		$data['title'] = 'Daftar Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['webinar'] = $this->webinar_m->getWebinar();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/webinar/daftar', $data);
        $this->load->view('perserta/footer');
	}
}
