<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change extends CI_Controller {

    public function changePassword()
	{
		$data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password',  'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1',  'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2',  'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('Admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Tidak Sama Dengan Password Sekarang !!!</div>');
                redirect('index.php/change/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> The New Password cannot be the same as the Old Password !!!</div>');
                    redirect('index.php/change/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Has Been Changed !!!</div>');
                    redirect('index.php/change/changepassword');
                }
            }
        }
	}
}