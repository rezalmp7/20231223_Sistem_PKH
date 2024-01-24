<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

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
		$data['wargas'] = $this->db->get('wargas')->result();
		$this->load->view('layouts/header');
		$this->load->view('warga/index', $data);
		$this->load->view('layouts/footer');
	}
	public function create() {
		$this->load->view('layouts/header');
		$this->load->view('warga/create');
		$this->load->view('layouts/footer');
	}
	public function store() {
		$post = $this->input->post();

		if(isset($post['pns']) && $post['pns'] == 'on') {
			$is_pns = true;
		} else {
			$is_pns = false;
		}

		$data = array(
			'nama' => $post['nama'],
			'tempat_lahir' => $post['tempat_lahir'],
			'tanggal_lahir' => $post['tanggal_lahir'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'is_pns' => $post['isPNS'],
			'hasBalita' => $post['hasBalita'],
			'umur' => $post['umur'],
			'sekolah' => $post['sekolah'],
			'pekerjaan' => $post['pekerjaan'],
			'gaji' => $post['gaji'],
		);

		$this->db->insert('wargas', $data);

		redirect(base_url('/warga'));
	}
	public function edit($id) {
		$data['warga'] = $this->db->get_where("wargas", ['id' => $id])->row();

		$this->load->view('layouts/header');
		$this->load->view('warga/edit', $data);
		$this->load->view('layouts/footer');
	}
	public function update($id) {
		$post = $this->input->post();
		$warga = $this->db->get_where('wargas', ['id' => $id])->row();

		$set = array(
			'nama' => $post['nama'],
			'tempat_lahir' => $post['tempat_lahir'],
			'tanggal_lahir' => $post['tanggal_lahir'],
			'alamat' => $post['alamat'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'is_pns' => $post['isPNS'],
			'hasBalita' => $post['hasBalita'],
			'umur' => $post['umur'],
			'sekolah' => $post['sekolah'],
			'pekerjaan' => $post['pekerjaan'],
			'gaji' => $post['gaji'],
		);

		$this->db->set($set);
		$this->db->where('id', $id);
		$this->db->update('wargas'); 

		redirect(base_url('/warga'));
	}
	public function destroy($id) {
		$this->db->delete('wargas', array('id' => $id));
	
		redirect(base_url('/warga'));
	}
}
