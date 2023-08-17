<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_webinar'] = $this->users_m->getDaftarWebinar();

        $this->load->view('Panitia/header', $data);
        $this->load->view('Panitia/index', $data);
        $this->load->view('Panitia/footer');
	}
    public function approved($id)
	{
		$this->db->set('status', 'terdaftar');
		$this->db->where('id_daftar_webinar', $id);
		$this->db->update('daftar_webinar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di Daftarkan !!!</div>');
		redirect('index.php/panitia');
	}
	public function rejected($id)
	{
		$this->db->set('status', 'ditolak');
		$this->db->where('id_daftar_webinar', $id);
		$this->db->update('daftar_webinar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">webinar Di tolak !!!</div>');
		redirect('index.php/panitia');
	}
	public function Profile()
	{
		$data['title'] = 'Profile panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('panitia/header', $data);
        $this->load->view('panitia/profile', $data);
        $this->load->view('panitia/footer');
	}
	
    public function update()
	{
		$data['title'] = 'Update Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('hp', 'Nomor Telpon', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Profesi', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/update', $data);
            $this->load->view('panitia/footer');
        }else{
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $alamat = $this->input->post('alamat');
            $hp = $this->input->post('hp');
            $pekerjaan = $this->input->post('pekerjaan');
            //cek gambar ada atau tidak
            $upload_image = $_FILES['image']['name'];
            //cek gambar
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '20480';
                $config['upload_path'] = './assets/img/';
                
                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    //cek old image gambar default bukan ?
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('alamat', $alamat);
            $this->db->set('hp', $hp);
            $this->db->set('pekerjaan', $pekerjaan);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profil has been Updated !!!</div>');
            redirect('index.php/panitia/profile');
        }
	}
}
