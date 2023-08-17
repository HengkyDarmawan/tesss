<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perserta extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $user['id'];
        // var_dump($user_id); die;
        $data['daftar_webinar'] = $this->perserta_m->getDaftarWebinar($user_id);
        $data['absensi'] = $this->perserta_m->getAbsensi($user_id);

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/index', $data);
        $this->load->view('perserta/footer');
	}
	public function profile()
	{
		$data['title'] = 'Profile Perserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('perserta/header', $data);
        $this->load->view('perserta/profile', $data);
        $this->load->view('perserta/footer');
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
            $this->load->view('perserta/header', $data);
            $this->load->view('perserta/update', $data);
            $this->load->view('perserta/footer');
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
            redirect('index.php/perserta/profile');
        }
	}
    public function absensi($id){
        $data['title'] = 'Absensi Webinar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dafWebinar'] = $this->perserta_m->getAbsensiById($id);
        

        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('bukti', 'Link Bukti Absensi', 'required|trim|valid_url');


        if ($this->form_validation->run() == false) {
            $this->load->view('perserta/header', $data);
            $this->load->view('perserta/absensi', $data);
            $this->load->view('perserta/footer');
        } else {
            $id_daftar_webinar = $this->input->post('id');
            $id_webinar = $data['dafWebinar']['webinar_id'];
            $userid = $data['user']['id'];
            $bukti = $this->input->post('bukti');

            $this->db->set('daftar_webinar_id', $id_daftar_webinar);
            $this->db->set('webinar_id', $id_webinar);
            $this->db->set('user_id', $userid);
            $this->db->set('waktu_absen', date('Y-m-d H:i:s'));
            $this->db->set('bukti', $bukti);
            $this->db->set('status', 'review');
            $this->db->insert('absensi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah terabsen di Webinar ini.</div>');
            redirect('index.php/perserta');
        }
    }
}
