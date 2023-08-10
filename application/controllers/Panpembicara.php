<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panpembicara extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Pembicara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembicara'] = $this->db->get('pembicara')->result_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/pembicara/index', $data);
        $this->load->view('panitia/footer');
	}
    public function Tambah(){
        $data['title'] = 'Tambah Pembicara panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pembicara', 'Nama Pembicara', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/pembicara/tambah', $data);
            $this->load->view('panitia/footer');
        } else {
            $this->pembicara_m->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembicara di Tambahkan !!!</div>');
            redirect('index.php/panpembicara');
        }

    }
    public function hapus($id)
    {
        $this->pembicara_m->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pembicara di Delete !!!</div>');
        redirect('index.php/panpembicara');
    }
    public function update($id)
    {
        $data['title'] = "Update pembicara";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembicara'] = $this->pembicara_m->getPembicaraId($id);

        $this->form_validation->set_rules('nama_pembicara', 'Nama Pembicaraa', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/pembicara/update', $data);
            $this->load->view('panitia/footer');
        } else {
            $this->pembicara_m->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pembicara Di Update !!!</div>');
            redirect('index.php/panpembicara');
        }
    }
}
