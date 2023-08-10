<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Controller {

	public function index()
	{
		$data['title'] = 'moderator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['moderator'] = $this->db->get('moderator')->result_array();

        $this->load->view('Admin/header', $data);
        $this->load->view('moderator/index', $data);
        $this->load->view('Admin/footer');
	}
    public function Tambah(){
        $data['title'] = 'Tambah moderator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_moderator', 'Nama moderator', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('moderator/tambah', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->moderator_m->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">moderator di Tambahkan !!!</div>');
            redirect('index.php/moderator');
        }

    }
    public function hapus($id)
    {
        $this->moderator_m->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">moderator di Delete !!!</div>');
        redirect('index.php/moderator');
    }
    public function update($id)
    {
        $data['title'] = "Update moderator";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['moderator'] = $this->moderator_m->getmoderatorId($id);

        $this->form_validation->set_rules('nama_moderator', 'Nama moderatora', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('moderator/update', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->moderator_m->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">moderator Di Update !!!</div>');
            redirect('index.php/moderator');
        }
    }
}
