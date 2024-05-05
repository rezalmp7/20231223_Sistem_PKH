<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$data['bantuan'] = $this->db->select([
            "bantuan.*",
            "wargas.nama",
            "wargas.alamat",
            "wargas.is_pns",
            "wargas.gaji",
            "wargas.hasBalita",
            "wargas.umur",
            "wargas.sekolah",
            "wargas.pekerjaan",
        ])->from("bantuan")
        ->join("wargas", "bantuan.wargas_id = wargas.id", "left")
        ->get()->result();

		$this->load->view('layouts/header');
		$this->load->view('laporan/index', $data);
		$this->load->view('layouts/footer');
	}
	public function konfirmasi_one($id) {
		$post = $this->input->post();

		$data = array(
			'status_konfirmasi' => 1,
			'tgl_konfirmasi' => date("YmdHis")
		);

		$this->db->update('bantuan', $data, array('id' => $id));

		redirect(base_url('/laporan'));
	}
    public function konfirmasi_all() {
		$post = $this->input->post();

		$data = array(
			'status_konfirmasi' => 1,
			'tgl_konfirmasi' => date("YmdHis")
		);

		$this->db->update('bantuan', $data);

		redirect(base_url('/laporan'));
    }
    public function print() {
        $data['bantuan'] = $this->db->select([
            "bantuan.*",
            "wargas.nama",
            "wargas.alamat",
            "wargas.is_pns",
            "wargas.gaji",
            "wargas.hasBalita",
            "wargas.umur",
            "wargas.sekolah",
            "wargas.pekerjaan",
        ])->from("bantuan")
        ->join("wargas", "bantuan.wargas_id = wargas.id", "left")
        ->get()->result();

		// $this->load->view('layouts/header');
		$this->load->view('laporan/print', $data);
		// $this->load->view('layouts/footer');
    }
}
