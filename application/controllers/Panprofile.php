<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panprofile extends CI_Controller {
    
	public function index()
	{
		$data['title'] = 'Profile panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/profile', $data);
        $this->load->view('panitia/footer');
	}
}