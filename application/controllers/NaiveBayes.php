<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NaiveBayes extends CI_Controller {

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

		if (!$this->session->userdata('status') == 'login_admin') {
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
			$value;
			$value['status'] = $this->M_NaiveBayes->calculate($value['is_pns'], $value['gaji']);
			$data['warga'][] = $value;

		}

		// print_r($data['warga']);
		$this->load->view('layouts/header');
		$this->load->view('naiveBayes/index', $data);
		$this->load->view('layouts/footer');
	}

	public function show() {
		$jumTrue = $this->M_NaiveBayes->sumTrue();
		$jumFalse = $this->M_NaiveBayes->sumFalse();
		$jumData = $this->M_NaiveBayes->sumData();

		$a1 = 0;
		$a2 = 2000000;

		//TRUE
		$isPns = $this->M_NaiveBayes->probIsPns($a1,1);
		$gaji = $this->M_NaiveBayes->probGaji($a2,1);

		//FALSE
		$isPns2 = $this->M_NaiveBayes->probIsPns($a1,0);
		$gaji2 = $this->M_NaiveBayes->probGaji($a2,0);
		// $bb2 = $this->M_NaiveBayes->probBeratB($a3,0);
		// $kesehatan2 = $this->M_NaiveBayes->probKesehatan($a4,0);
		// $pendidikan2 = $this->M_NaiveBayes->probPendidikan($a5,0);

		//result
		$paT = $this->M_NaiveBayes->hasilTrue($jumTrue,$jumData,$isPns,$gaji);
		$paF = $this->M_NaiveBayes->hasilFalse($jumTrue,$jumData,$isPns2,$gaji2);

		echo "
		======================================<br>
		PNS : $a1<br>
		Gaji : $a2<br>
		=======================================<br><br>
		";

		echo "
		======================================<br>
		kemungkinan true : <br>
		jumlah true : $jumTrue <br>
		jumlah data : $jumData <br>
		=======================================<br><br>
		";

		echo "
		======================================<br>
		kemungkinan false : <br>
		jumlah false : $jumFalse <br>
		jumlah data : $jumData <br>
		=======================================<br><br>
		";

		echo "
		======================================<br>
		pATrue : $jumTrue / $jumData<br>
		Is PNS true : $isPns / $jumTrue <br>
		Gaji true : $gaji / $jumTrue <br>
		=======================================<br><br>
		";

		echo "
		======================================<br>
		pAFalse : $jumFalse / $jumData<br>
		Is PNS false : $isPns2 / $jumFalse <br>
		Gaji false : $gaji2 / $jumFalse <br>
		=======================================<br><br>
		";

		echo "
		======================================<br>
		presentasi yes : $paT<br>
		presentasi no : $paF<br>
		=======================================<br><br>
		";

		if($paT > $paF){
		echo "
		======================================<br>
		PRESENTASI YES LEBIH BESAR DARI PADA PRESENTASI NO<br>
		=======================================
		<br><br>";
		}else if($paF > $paT){
		echo "
		======================================<br>
		PRESENTASI NO LEBIH BESAR DARI PADA PRESENTASI YES<br>
		=======================================
		<br><br>";
		}

		$result = $this->M_NaiveBayes->perbandingan($paT,$paF);
		echo " Status : $result[0] <br>Presentasi diterima sebanyak : ".round($result[1],2)." % <br>Presentasi diolak sebanyak : ".round($result[2],2)." % ";
	}
}
