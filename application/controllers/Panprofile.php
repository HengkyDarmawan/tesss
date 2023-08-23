<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panprofile extends CI_Controller {
    
	public function index()
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
            redirect('index.php/panprofile');
        }
	}
    public function changePassword()
	{
		$data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password',  'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1',  'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2',  'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/header', $data);
            $this->load->view('panitia/change-password', $data);
            $this->load->view('panitia/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Tidak Sama Dengan Password Sekarang !!!</div>');
                redirect('index.php/panprofile/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> The New Password cannot be the same as the Old Password !!!</div>');
                    redirect('index.php/panprofile/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Has Been Changed !!!</div>');
                    redirect('index.php/panprofile/changepassword');
                }
            }
        }
	}
}