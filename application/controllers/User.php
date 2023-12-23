<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function __construct() {
		parent::__construct();

		if (!$this->session->userdata('status') == 'login_admin') {
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		$data['users'] = $this->db->get('users')->result();
		$this->load->view('layouts/header');
		$this->load->view('user/index', $data);
		$this->load->view('layouts/footer');
	}
	public function create() {
		$this->load->view('layouts/header');
		$this->load->view('user/create');
		$this->load->view('layouts/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			'nama' => $post['nama'],
			'username' => $post['username'],
			'password' => md5($post['password']),
		);

		$this->db->insert('users', $data);

		redirect(base_url('/user'));
	}
	public function edit($id) {
		$data['user'] = $this->db->get_where("users", ['id' => $id])->row();

		$this->load->view('layouts/header');
		$this->load->view('user/edit', $data);
		$this->load->view('layouts/footer');
	}
	public function update($id) {
		$post = $this->input->post();
		$user = $this->db->get_where('users', ['id' => $id])->row();

		if($post['password'] != '' || $post['password'] != null) {
			$password = md5($post['password']);
		} else {
			$password = $user->password;
		}

		$set = array(
			'nama' => $post['nama'],
			'username' => $post['username'],
			'password' => $password,
			'level' => $post['level']
		);

		$this->db->set($set);
		$this->db->where('id', $id);
		$this->db->update('users'); 

		redirect(base_url('/user'));
	}
	public function destroy($id) {
		$this->db->delete('users', array('id' => $id));
	
		redirect(base_url('/user'));
	}
}
