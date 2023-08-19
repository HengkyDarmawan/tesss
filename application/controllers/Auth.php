<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false){
			$data['title'] = 'Webinar Login';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
		}else{
			$this->_login();
		}
	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if($user){
			if($user['is_active'] == 1){
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('index.php/admin');
					}elseif ($user['role_id'] == 2) {
						redirect('index.php/panitia');
					}elseif ($user['role_id'] == 3) {
						redirect('index.php/perserta');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak bisa akses !!!</div>');
						redirect('index.php/auth');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!!!</div>');
					redirect('index.php/auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been Actived!!!</div>');
				redirect('index.php/auth');	
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!!!</div>');
			redirect('index.php/auth');
		}
	}
	public function registration()
	{
		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim[user.alamat]');
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim[user.hp]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim[user.pekerjaan]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if($this->form_validation->run() == false){
			$data['title'] = 'Webinar Resgister';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/register');
			$this->load->view('auth/footer');
		} else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'hp' => htmlspecialchars($this->input->post('hp', true)),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 1,
				'date_created' => time(),
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation!!! Your account has been created. Please Login</div>');
			redirect('index.php/auth');
		}
	}
	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!!!</div>');
		redirect('index.php/auth');
	}
}
