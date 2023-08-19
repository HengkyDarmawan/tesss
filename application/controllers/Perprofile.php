<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perprofile extends CI_Controller {
    
    public function index()
	{
		$data['title'] = 'Profile Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/profile', $data);
        $this->load->view('perserta/footer');
	}
}