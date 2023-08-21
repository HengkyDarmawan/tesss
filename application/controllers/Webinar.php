<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webinar extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->webinar_m->getWebinar();

        $this->load->view('Admin/header', $data);
        $this->load->view('webinar/index', $data);
        $this->load->view('Admin/footer');
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
		$this->form_validation->set_rules('bank', 'Metode Pembayaran', 'required|trim');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'trim');
		$this->form_validation->set_rules('harga', 'Harga', 'trim');
		$this->form_validation->set_rules('jmlh_tiket', 'Kuota', 'required|trim|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('webinar/tambah', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->webinar_m->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar di Tambahkan !!!</div>');
            redirect('index.php/webinar');
        }
    }
    public function hapus($id)
    {
        $this->webinar_m->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar di Delete !!!</div>');
        redirect('index.php/webinar');
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
		$this->form_validation->set_rules('bank', 'Metode Pembayaran', 'required|trim');
		$this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'trim|numeric');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|numeric');
		$this->form_validation->set_rules('jmlh_tiket', 'Kuota', 'trim|numeric');
		$this->form_validation->set_rules('jmlh_tiket', 'Kuota', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('webinar/update', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->webinar_m->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di Update !!!</div>');
            redirect('index.php/webinar');
        }
    }
    public function laporan($id)
    {
        $data['title'] = "Laporan Webinar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //Ambil data webinar berdasarkan ID
        $webinar = $this->webinar_m->getWebinarWithSpeakers($id);

        // Periksa apakah tanggal webinar sudah lewat
        if($webinar['tanggal'] < date('Y-m-d')){
            // Ambil data peserta yang ikut webinar
            $peserta = $this->webinar_m->getPesertaByWebinarId($id);

            // Hitung total peserta
            $total_peserta = count($peserta);
            $data['webinar'] = $webinar;
            $data['total_perserta'] = $total_peserta;
            $this->load->view('Admin/header', $data);
            $this->load->view('webinar/laporan', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Webinar belum berlangsung atau belum lewat tanggalnya.</div>');
            redirect('index.php/webinar');
        }
    }
}
