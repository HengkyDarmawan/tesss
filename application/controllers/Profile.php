<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
	public function index()
	{
		$data['title'] = 'Profile admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer');
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
            $this->load->view('admin/header', $data);
            $this->load->view('admin/update', $data);
            $this->load->view('admin/footer');
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
            redirect('index.php/profile');
        }
	}
}