<?php

class M_NaiveBayes extends CI_Model {
	// private $jumTrue = 0;
	// private $jumFalse = 0;
	// private $jumData = 0;

	function __construct()
	{
		$this->pegawai = $this->db->get('sample_data')->result_array();
	}

	function calculate($a1, $a2) {

		$jumTrue = $this->sumTrue();
		$jumFalse = $this->sumFalse();
		$jumData = $this->sumData();

		//TRUE
		$isPns = $this->probIsPns($a1,1);
		$gaji = $this->probGaji($a2,1);

		//FALSE
		$isPns2 = $this->probIsPns($a1,0);
		$gaji2 = $this->probGaji($a2,0);

		//result
		$paT = $this->hasilTrue($jumTrue,$jumData,$isPns,$gaji);
		$paF = $this->hasilFalse($jumTrue,$jumData,$isPns2,$gaji2);

		$result = $this->perbandingan($paT,$paF);

		return $result;
	}
	/*================================================================
	FUNCTION SUM TRUE DAN FALSE
	=================================================================*/
	function sumTrue()
	{
		$hasil = $this->pegawai;

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
		$hasil = $this->pegawai;

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
		$hasil = $this->pegawai;
		return count($hasil);
	}

	//=================================================================

	/*================================================================
	FUNCTION PROBABILITAS
	=================================================================*/
	function probIsPns($is_pns,$status)
	{
		$hasil = $this->pegawai;

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
		$hasil = $this->pegawai;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['type_gaji'] == 1) {
				if($hasil['gaji'] <= $gaji && $hasil['status'] == $status){
					$t += 1;
				}else if($hasil['gaji'] <= $gaji && $hasil['status'] == $status){
					$t +=1;
				}
			} else {
				if($hasil['gaji'] > $gaji && $hasil['status'] == $status){
					$t += 1;
				}else if($hasil['gaji'] > $gaji && $hasil['status'] == $status){
					$t +=1;
				}
			}
		}
		return $t;
	}

	function probBeratB($bb,$status)
	{
		$hasil = $this->pegawai;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['berat_badan'] == $bb && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['berat_badan'] == $bb && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probPendidikan($pendidikan,$status)
	{
		$hasil = $this->pegawai;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['pendidikan'] == $pendidikan && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['pendidikan'] == $pendidikan && $hasil['status'] == $status){
				$t +=1;
			}
		}
		return $t;
	}

	function probKesehatan($kesehatan,$status)
	{
		$hasil = $this->pegawai;

		$t = 0;
		foreach ($hasil as $hasil) {
			if($hasil['kesehatan'] == $kesehatan && $hasil['status'] == $status){
				$t += 1;
			}else if($hasil['kesehatan'] == $kesehatan && $hasil['status'] == $status){
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
	$pU   : jumlah probabilitas umur ( probUmur )
	$pT   : jumlah probabilitas tinggi ( probTinggi )
	$pBB  : jumlah probabilitas berat badan ( probBB )
	$pK   : jumlah probabilitas kesehatan ( probKesehatan )
	$pP   : jumlah probabilitas pendidikan (probPendidikan )
	==================================================================*/

	function hasilTrue($sT = 0 , $sD = 0 , $pP = 0 ,$pG = 0)
	{
		$paTrue = $sT / $sD;
		$p1 = $pP / $sT;
		$p2 = $pG / $sT;
		$hsl = $paTrue * $p1 * $p2;
		return $hsl;
	}

	function hasilFalse($sF = 0 , $sD = 0 , $pP = 0 ,$pG = 0)
	{
		$paFalse = $sF / $sD;
		$p1 = $pP / $sF;
		$p2 = $pG / $sF;
		$hsl = $paFalse * $p1 * $p2;
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
