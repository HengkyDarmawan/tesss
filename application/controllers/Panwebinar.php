<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panwebinar extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->webinar_m->getWebinar();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/webinar/index', $data);
        $this->load->view('panitia/footer');
	}
    public function Tambah(){
        $data['title'] = 'Tambah Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembicara'] = $this->db->get('pembicara')->result_array();
        $data['moderator'] = $this->db->get('moderator')->result_array();

        $this->form_validation->set_rules('pembicara_id', 'Pembicara', 'required|trim');
        $this->form_validation->set_rules('moderator_id', 'Moderator', 'required|trim');
        $this->form_validation->set_rules('tema', 'Tema', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required|trim');
		$this->form_validation->set_rules('jmlh_tiket', 'Slot', 'required|trim|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/webinar/tambah', $data);
            $this->load->view('panitia/footer');
        } else {
            $this->webinar_m->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar di Tambahkan !!!</div>');
            redirect('index.php/panwebinar');
        }

    }
    public function hapus($id)
    {
        $this->webinar_m->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar di Delete !!!</div>');
        redirect('index.php/panwebinar');
    }
    public function update($id)
    {
        $data['title'] = "Update Webinar / Seminar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->webinar_m->getWebinarId($id);
        $data['pembicara'] = $this->db->get('pembicara')->result_array();
        $data['moderator'] = $this->db->get('moderator')->result_array();
        
        $this->form_validation->set_rules('pembicara_id', 'Pembicara', 'required|trim');
        $this->form_validation->set_rules('moderator_id', 'Moderator', 'required|trim');
        $this->form_validation->set_rules('tema', 'Tema', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required|trim');
		$this->form_validation->set_rules('jmlh_tiket', 'Slot', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/webinar/update', $data);
            $this->load->view('panitia/footer');
        } else {
            $this->webinar_m->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di Update !!!</div>');
            redirect('index.php/panwebinar');
        }
    }
}
