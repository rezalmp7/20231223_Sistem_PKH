<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function aksi_login() {
		$post = $this->input->post();
		$username = $post['username'];
		$password = $post['password'];
		// $level = $post['level'];

		$user = $this->db->get_where('users', ['username' => $username])->row();
		
		if ($user) {
			if (md5($password) == $user->password) {
				$data = [
					'status' => 'login_'.$user->level,
					'id_user' => $user->id,
					'nama' => $user->nama,
					'username' => $user->username,
					'level' => $user->level
				];

				$this->session->set_userdata($data);
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('message', 'Password salah!');
				redirect(base_url('login'));
			}
		} else {
			$this->session->set_flashdata('message', 'User tidak terdaftar!');
			redirect(base_url('login'));
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', "Berhasil Logout dari akun");
		redirect(base_url('login'));
	}
}
