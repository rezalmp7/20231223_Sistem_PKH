<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenerimaPKH extends CI_Controller {

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
	function __construct() {
		parent::__construct();

		if (!$this->session->userdata('status') == 'login_user') {
			redirect(base_url('login'));
		}

		$this->load->model("M_NaiveBayes");
	}
	public function index()
	{
		$warga = $this->db->get('wargas')->result_array();

		$data['warga'] = [];
		// echo "<pre>";
		foreach ($warga as $key => $value) {
			$value['status'] = $this->M_NaiveBayes->calculate($value['is_pns'], $value['gaji']);

			if($value['status'][0] == 'DITERIMA') {
				$data['warga'][] = $value;
			}

		}

		// print_r($data['warga']);
		$this->load->view('layouts/header');
		$this->load->view('penerimaPKH/index', $data);
		$this->load->view('layouts/footer');
	}

}
