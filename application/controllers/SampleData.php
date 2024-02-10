<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SampleData extends CI_Controller {

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
		$data['sample_data'] = $this->db->select("*")
			->from('sample_data')
			->order_by('id DESC')
			->get()
			->result();
		$this->load->view('layouts/header');
		$this->load->view('sample_data/index', $data);
		$this->load->view('layouts/footer');
	}
	public function create() {
		$this->load->view('layouts/header');
		$this->load->view('sample_data/create');
		$this->load->view('layouts/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			'is_pns' => $post['isPNS'],
			'gaji' => 5000000,
			'type_gaji' => $post['type_gaji'],
			'hasBalita' => $post['hasBalita'],
			'umur' => $post['umur'],
			'sekolah' => $post['sekolah'],
			'pekerjaan' => $post['pekerjaan'],
			'status' => $post['status']
		);

		$this->db->insert('sample_data', $data);

		redirect(base_url('/sampleData'));
	}
	public function edit($id) {
		$data['sample_data'] = $this->db->get_where("sample_data", ['id' => $id])->row();

		$this->load->view('layouts/header');
		$this->load->view('sample_data/edit', $data);
		$this->load->view('layouts/footer');
	}
	public function update($id) {
		$post = $this->input->post();
		$user = $this->db->get_where('sample_data', ['id' => $id])->row();

		$set = array(
			'is_pns' => $post['isPNS'],
			'gaji' => 5000000,
			'type_gaji' => $post['type_gaji'],
			'hasBalita' => $post['hasBalita'],
			'umur' => $post['umur'],
			'sekolah' => $post['sekolah'],
			'pekerjaan' => $post['pekerjaan'],
			'status' => $post['status']
		);

		$this->db->set($set);
		$this->db->where('id', $id);
		$this->db->update('sample_data'); 

		redirect(base_url('/sampleData'));
	}
	public function destroy($id) {
		$this->db->delete('sample_data', array('id' => $id));
	
		redirect(base_url('/sampleData'));
	}
}
