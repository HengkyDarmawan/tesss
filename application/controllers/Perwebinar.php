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
    public function daftar($id)
	{
		$data['title'] = 'Daftar Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->perserta_m->getWebinarId($id);
        
        $this->form_validation->set_rules('id', 'id', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('perserta/header', $data);
            $this->load->view('perserta/webinar/daftar', $data);
            $this->load->view('perserta/footer');
        } else {
            $id = $this->input->post('id');
            $userid = $data['user']['id'];

            $this->db->set('webinar_id', $id);
            $this->db->set('user_id', $userid);
            $this->db->set('waktu_daftar', date('Y-m-d H:i:s'));
            $this->db->set('status', 'review');
            $this->db->insert('daftar_webinar');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah terdaftar ke Webinar ini.</div>');
            redirect('index.php/perserta');
        }
	}
}
