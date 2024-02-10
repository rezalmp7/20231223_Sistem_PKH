<?php

class M_NaiveBayes extends CI_Model {
	// private $jumTrue = 0;
	// private $jumFalse = 0;
	// private $jumData = 0;
	private $warga = [];

	function __construct()
	{
		$this->warga = $this->db->get('sample_data')->result_array();
	}

	function calculate(
		$a1, // isPns
		$a2, // Gaji
		$a3, // hasBalita
		$a4, // Umur
		$a5, // Sekolah
		$a6 // Perjaan
	) {
		// echo "<pre>";
		$jumTrue = $this->sumTrue();
		$jumFalse = $this->sumFalse();
		$jumData = $this->sumData();

		//TRUE
		$isPns = $this->probIsPns($a1,1);
		$gaji = $this->probGaji($a2,1);
		$hasBalita = $this->probHasBalita($a3,1);
		$umur = $this->probUmur($a4,1);
		$sekolah = $this->probSekolah($a5,1);
		$pekerjaan = $this->probPekerjaan($a6,1);

		//FALSE
		$isPns2 = $this->probIsPns($a1,0);
		$gaji2 = $this->probGaji($a2,0);
		$hasBalita2 = $this->probHasBalita($a3,0);
		$umur2 = $this->probUmur($a4,0);
		$sekolah2 = $this->probSekolah($a5,0);
		$pekerjaan2 = $this->probPekerjaan($a6,0);

		//result
		$paT = $this->hasilTrue(
			$jumTrue,
			$jumData,
			$isPns,
			$gaji,
			$hasBalita,
			$umur,
			$sekolah,
			$pekerjaan,
		);
		$paF = $this->hasilFalse(
			$jumTrue,
			$jumData,
			$isPns2,
			$gaji2,
			$hasBalita2,
			$umur2,
			$sekolah2,
			$pekerjaan2,
		);

		$result = $this->perbandingan($paT,$paF);

		return $result;
	}
	/*================================================================
	FUNCTION SUM TRUE DAN FALSE
	=================================================================*/
	function sumTrue()
	{
		$hasil = $this->warga;

		$t = 0;
		foreach($hasil as $hasil)
		{
			if($hasil['status'] == 1){
				$t += 1;
			}
		}

		return $t;
	}

	function sumFalse()
	{
		$hasil = $this->warga;

		$t = 0;
		foreach($hasil as $hasil)
		{
			if($hasil['status'] == 0){
				$t += 1;
			}
		}
		return $t;
	}

	function sumData()
	{
		$hasil = $this->warga;
		return count($hasil);
	}

	//=================================================================

	/*================================================================
	FUNCTION PROBABILITAS
	=================================================================*/
	function probIsPns($is_pns,$status)
	{
		$hasil = $this->warga;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['is_pns'] == $is_pns && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['is_pns'] == $is_pns && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probGaji($gaji,$status) //type = 0 kurang dari; 1 lebih dari
	{
		$hasil = $this->warga;
		$t = 0;
		if($gaji >= 500000) {
			$type_gaji = 1;
		} else {
			$type_gaji = 0;
		}
		foreach ($hasil as $hasil) {
			if($hasil['type_gaji'] == 1) {
				if($hasil['gaji'] <= $type_gaji && $hasil['status'] == $status){
					$t += 1;
				}else if($hasil['gaji'] <= $type_gaji && $hasil['status'] == $status){
					$t +=1;
				}
			} else {
				if($hasil['gaji'] > $type_gaji && $hasil['status'] == $status){
					$t += 1;
				}else if($hasil['gaji'] > $type_gaji && $hasil['status'] == $status){
					$t +=1;
				}
			}
		}
		return $t;
	}

	function probHasBalita($hasBalita,$status)
	{
		$hasil = $this->warga;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['hasBalita'] == $hasBalita && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['hasBalita'] == $hasBalita && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probUmur($umur,$status)
	{
		$hasil = $this->warga;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['umur'] == $umur && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['umur'] == $umur && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probSekolah($sekolah,$status)
	{
		$hasil = $this->warga;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['sekolah'] == $sekolah && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['sekolah'] == $sekolah && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probPekerjaan($pekerjaan,$status)
	{
		$hasil = $this->warga;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['pekerjaan'] == $pekerjaan && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['pekerjaan'] == $pekerjaan && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}
	//=================================================================

	/*=================================================================
	MARI BERHITUNG
	keterangan parameter :
	$sT   : jumlah data yang bernilai true ( sumTrue )
	$sF   : jumlah data yang bernilai false ( sumFalse )
	$sD   : jumlah data pada data latih ( sumData )
	$pP   : jumlah probabilitas PNS ( probIsPns )
	$pG   : jumlah probabilitas Gaji ( probGaji )
	$pB  : jumlah probabilitas Has Balita ( probHasBalita )
	$pU   : jumlah probabilitas umur ( probUmur )
	$pS  : jumlah probabilitas Sekolah ( probSekolah )
	$pK   : jumlah probabilitas Kerja (probPekerjaan )
	==================================================================*/

	function hasilTrue($sT = 0 , $sD = 0 , $pP = 0 ,$pG = 0, $pB = 0, $pU = 0, $pS = 0, $pK = 0)
	{
		$paTrue = $sT / $sD;
		$p1 = $pP / $sT;
		$p2 = $pG / $sT;
		$p3 = $pB / $sT;
		$p4 = $pU / $sT;
		$p5 = $pS / $sT;
		$p6 = $pK / $sT;
		$hsl = $paTrue * $p1 * $p2 * $p3 * $p4 * $p5 * $p6;
		return $hsl;
	}

	function hasilFalse($sF = 0 , $sD = 0 , $pP = 0 ,$pG = 0, $pB = 0, $pU = 0, $pS = 0, $pK = 0)
	{
		$paFalse = $sF / $sD;
		$p1 = $pP / $sF;
		$p2 = $pG / $sF;
		$p3 = $pB / $sF;
		$p4 = $pU / $sF;
		$p5 = $pS / $sF;
		$p6 = $pK / $sF;
		$hsl = $paFalse * $p1 * $p2 * $p3 * $p4 * $p5 * $p6;
		return $hsl;
	}

	function perbandingan($pATrue,$pAFalse)
	{
		if($pATrue > $pAFalse){
			$stt = "DITERIMA";
			$hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
			$diterima = 100 - $hitung;
			$persentase_diterima = $hitung;
			$persentase_ditolak = $diterima;
		}
		elseif($pAFalse > $pATrue) {
			$stt = "DITOLAK";
			$hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
			$diterima = 100 - $hitung;
			$persentase_diterima = $diterima;
			$persentase_ditolak = $hitung;
		} else {
			$stt = "DITERIMA";
			$hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
			$diterima = 100 - $hitung;
			$persentase_diterima = $hitung;
			$persentase_ditolak = $diterima;
		}

		$hsl = array($stt,$persentase_diterima,$persentase_ditolak);
		return $hsl;
	}
	//=================================================================
}
?>
