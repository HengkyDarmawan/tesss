<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();
        
        $this->load->view('Admin/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('Admin/footer');
	}
    public function Tambah(){
        $data['title'] = 'Tambah Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('Admin/footer');
        } else {
            $this->users_m->Tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">user Di Tambahkan !!!</div>');
            redirect('index.php/users');
        }

    }
    public function hapus($id)
    {
        $this->users_m->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user di Delete !!!</div>');
        redirect('index.php/users');
    }
    public function update($id)
    {
        $data['title'] = "Update users";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['useri'] = $this->users_m->getuserId($id);
		$data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/header', $data);
            $this->load->view('user/update', $data);
            $this->load->view('Admin/footer');
        } else {
            $new_password = $this->input->post('new_password'); // Add a new password field in your form
            if (!empty($new_password)) {
                // If a new password is provided, hash and update the password
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
            }
            $this->users_m->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">user Di Update !!!</div>');
            redirect('index.php/users');
        }
    }
}
