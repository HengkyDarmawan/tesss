<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perwebinar extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->webinar_m->getWebinar();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/webinar/index', $data, );
        $this->load->view('perserta/footer');
	}
    public function daftar($id)
	{
		$data['title'] = 'Daftar Webinar / Seminar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['webinar'] = $this->perserta_m->getWebinarId($id);

        //coba
        $jumlah_tiket = $this->perserta_m->getJumlahTiket($id);
        $jumlah_pendaftar = $this->perserta_m->getJumlahPendaftar($id);
        
        $userid = $data['user']['id'];
        $data['webinar_id'] = $id;
        $data['jumlah_tiket'] = $jumlah_tiket;
        $data['jumlah_pendaftar'] = $jumlah_pendaftar;
        $nwebinar = $data['webinar']['tema'];

        //periksa apa perserta sudah terdaftar di webinar ini
        $this->db->where('webinar_id', $id);
        $this->db->where('user_id', $userid);
        $query = $this->db->get('daftar_webinar');
        $already_registered = $query->num_rows() > 0;

        $this->form_validation->set_rules('id', 'id', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('perserta/header', $data);
            $this->load->view('perserta/webinar/daftar', $data);
            $this->load->view('perserta/footer');
        } elseif($already_registered){
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Anda sudah terdaftar untuk Webinar ' . $nwebinar .' ini.</div>');
            redirect('index.php/perwebinar');
        } elseif($jumlah_pendaftar >= $jumlah_tiket){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kuota Pendaftar webinar ' . $nwebinar .' telah penuh</div>');
            redirect('index.php/perwebinar');
        } else {
            $id = $this->input->post('id');
            $pembicaraid = $data['webinar']['pembicara_id'];
            $buktiBayar = $this->input->post('link_pembayaran');

            $this->db->set('webinar_id', $id);
            $this->db->set('user_id', $userid);
            $this->db->set('pembicara_id', $pembicaraid);
            $this->db->set('waktu_daftar', date('Y-m-d H:i:s'));
            $this->db->set('link_pembayaran', $buktiBayar);
            $this->db->set('status', 'review');
            $this->db->insert('daftar_webinar');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah terdaftar ke Webinar ini.</div>');
            redirect('index.php/perserta');
        }
	}
}
