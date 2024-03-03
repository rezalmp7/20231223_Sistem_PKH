<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		if (!$this->session->userdata('status')) {
			redirect(base_url('login'));
		}

		$this->load->model("M_NaiveBayes");
	}
	public function index()
	{
		$wargas = $this->db->get('wargas')->result_array();
		$data['countSampleData'] = $this->db->get('sample_data')->num_rows();
		$data['countData'] = $this->db->get('wargas')->num_rows();
		$data['countDapatBantuan'] = 0;
		$data['countNonBantuan'] = 0;
		

		$data['warga'] = [];
		$data['dapatBantuan'] = [];
		$dataRt = [];
		$labelGrafik = [];
		$dataGrafik = [];
		// echo "<pre>";
		foreach ($wargas as $key => $value) {
			$value;
			$sekolah = 0;
			if($value['sekolah'] == "belumSekolah" || 
				$value['sekolah'] == 'sd' || 
				$value['sekolah'] == 'smp' ||
				$value['sekolah'] == 'sma'
			) {
				$sekolah = 1;
			} else {
				$sekolah = 0;
			}
			$value['status'] = $this->M_NaiveBayes->calculate(
				$value['is_pns'], 
				$value['gaji'],
				$value['hasBalita'],
				$value['umur'],
				$sekolah,
				1,
			);
			// if($value['hasBalita'] == 1) {
			// 	$value['status'] = "DITERIMA"
			// }
			$data['warga'][] = $value;

			if($value['status'][0] == "DITERIMA") {
				$data['countDapatBantuan'] = $data['countDapatBantuan']+1;
			} else {
				$data['countNonBantuan'] = $data['countNonBantuan']+1;
			}

			if(!isset($dataRt[$value['rw'].$value['rt']])) {
				$dataRt[$value['rw'].$value['rt']]['rt'] = $value['rt'];
				$dataRt[$value['rw'].$value['rt']]['rw'] = $value['rw'];
				$dataRt[$value['rw'].$value['rt']]['data'] = [];
				$dataRt[$value['rw'].$value['rt']]['ditolak'] = 0;
				$dataRt[$value['rw'].$value['rt']]['diterima'] = 0;

				$labelGrafik[] = $value['rw'].'/'.$value['rt'];

				$indexLabel = array_search($value['rw'].'/'.$value['rt'], $labelGrafik);
				$dataGrafik['ditolak'][$indexLabel] = 0;
				$dataGrafik['diterima'][$indexLabel] = 0;
			}


			$dataRt[$value['rw'].$value['rt']]['data'][] = $value;

			$indexLabel = array_search($value['rw'].'/'.$value['rt'], $labelGrafik);
			if($value['status'][0] == "DITOLAK") {
				$dataRt[$value['rw'].$value['rt']]['ditolak'] = $dataRt[$value['rw'].$value['rt']]['ditolak']+1;
				$dataGrafik['ditolak'][$indexLabel] = $dataGrafik['ditolak'][$indexLabel]+1;
				$data['countNonBantuan'] = $data['countNonBantuan']+1;
			} else {
				$dataRt[$value['rw'].$value['rt']]['diterima'] = $dataRt[$value['rw'].$value['rt']]['diterima']+1;
				$dataGrafik['diterima'][$indexLabel] = $dataGrafik['diterima'][$indexLabel]+1;
				$data['countDapatBantuan'] = $data['countDapatBantuan']+1;
				$data['dapatBantuan'][] = $value;
			}
			// $dataRt[]['data'][] = 
		}

		$data['dataPerRt'] = $dataRt;
		$data['warga'] = $data['warga'];
		$data['labelGrafik'] = $labelGrafik;
		$data['dataGrafik'] = $dataGrafik;

		// echo "<pre>";
		// print_r($data);
		// echo $this->session->userdata('level');

		$this->load->view('layouts/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('layouts/footer');
	}
}
