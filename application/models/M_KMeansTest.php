<?php
class M_KMeansTest extends CI_Model {

	function __construct() {
		parent::__construct();

		$dataWarga = $this->db->get('sebaran_guru')->result_array();
		$this->data=[];
		$this->provinsi=[];
		foreach ($dataWarga as $key => $value) {
			$this->data[]=$value;
			$this->provinsi[]=$value['provinsi'];
		}

		//start program
		$dataForProcessing=[];
		//masukan data jumlah guru dan siswa ke array data
		foreach ($dataWarga as $key => $value) {
			$dataForProcessing[]=[$value['jumlah_guru'],$value['jumlah_siswa']];
		}
		// jumlah cluster
		$cluster = 3;
		$variable_x = 'Jumlah Guru';
		$variable_y = 'Jumlah Siswa';

		$rand=[];
		//centroid awal ambil random dari data
		for($i=0;$i<$cluster;$i++){
			$temp=rand(0,(count($dataForProcessing)-1));
			// while(in_array($rand, $temp)){
			// 	$temp=rand(0,(count($dataForProcessing)-1));
			// }
			$rand[]=$temp;
			$centroid[0][]=[
				$dataForProcessing[$rand[$i]][0],
				$dataForProcessing[$rand[$i]][1]
			];
		}

		$this->centroid = $centroid;
		$this->dataForProcessing = $dataForProcessing;
		
	}

	//hitung Euclidean Distance Space
	function jarakEuclidean($data=array(),$centroid=array()){
		return sqrt(pow(($data[0]-$centroid[0]),2) + pow(($data[1]-$centroid[1]),2));
	}

	function jarakTerdekat($jarak_ke_centroid=array(),$centroid){
		foreach ($jarak_ke_centroid as $key => $value) {
			if(!isset($minimum)){
				$minimum=$value;
				$cluster=($key+1);
				continue;
			}
			else if($value<$minimum){
				$minimum=$value;
				$cluster=($key+1);
			}
		}
		return array(
			'cluster'=>$cluster,
			'value'=>$minimum,
		);
	}

	function perbaruiCentroid($table_iterasi,&$hasil_cluster){
		$hasil_cluster=[];
		//looping untuk mengelompokan x dan y sesuai cluster
		foreach ($table_iterasi as $key => $value) {
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][0][]= $value['data'][0];//data x
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][1][]= $value['data'][1];//data y
		}
		$new_centroid=[];
		//looping untuk mencari nilai centroid baru dengan cara mencari rata2 dari masing2 data(0=x dan 1=y) 
		foreach ($hasil_cluster as $key => $value) {
			$new_centroid[$key]= [
				array_sum($value[0])/count($value[0]),
				array_sum($value[1])/count($value[1])
			]; 
		}
		//sorting berdasarkan cluster
		ksort($new_centroid);
		return $new_centroid;
	}

	function centroidBerubah($centroid,$iterasi){
		$centroid_lama = $this->flatten_array($centroid[($iterasi-1)]); //flattern array
		$centroid_baru = $this->flatten_array($centroid[$iterasi]); //flatten array
		//hitbandingkan centroid yang lama dan baru jika berubah return true, jika tidak berubah/jumlah sama=0 return false
		$jumlah_sama=0;
		for($i=0;$i<count($centroid_lama);$i++){
			if($centroid_lama[$i]===$centroid_baru[$i]){
				$jumlah_sama++;
			}
		}
		return $jumlah_sama===count($centroid_lama) ? false : true; 
	}

	function flatten_array($arg) {
	  return is_array($arg) ? array_reduce($arg, function ($c, $a) { return array_merge($c, $this->flatten_array($a)); },[]) : [$arg];
	}

	function pointingHasilCluster($hasil_cluster){
		$result=[];
		foreach ($hasil_cluster as $key => $value) {
			for ($i=0; $i<count($value[0]);$i++) { 
				$result[$key][]=[$hasil_cluster[$key][0][$i],$hasil_cluster[$key][1][$i]];
			}
		}
		return ksort($result);
	}

	function process() {

		
		$hasil_iterasi=[];
		$hasil_cluster=[];

		//iterasi
		$iterasi=0;
		while(true){
			$table_iterasi=array();
			//untuk setiap data ke i (x dan y)
			foreach ($this->dataForProcessing as $key => $value) {
				//untuk setiap table centroid pada iterasi ke i
				$table_iterasi[$key]['data']=$value;
				foreach ($this->centroid[$iterasi] as $key_c => $value_c) {
					//hitung jarak euclidean 
					$table_iterasi[$key]['jarak_ke_centroid'][]=$this->jarakEuclidean($value,$value_c);	
				}
				//hitung jarak terdekat dan tentukan cluster nya
				$table_iterasi[$key]['jarak_terdekat']=$this->jarakTerdekat($table_iterasi[$key]['jarak_ke_centroid'],$this->centroid);
			}
			array_push($hasil_iterasi, $table_iterasi);
			$this->centroid[++$iterasi]=$this->perbaruiCentroid($table_iterasi,$hasil_cluster);
			$lanjutkan=$this->centroidBerubah($this->centroid,$iterasi);
			$boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
			// echo 'proses iterasi ke-'.$iterasi.' : lanjutkan iterasi ? '.$boolval.'<br>';
			if(!$lanjutkan)
				break;
			//loop sampai setiap nilai centroid sama dengan nilai centroid sebelumnya
		} 

		return array('hasil iterasi' => $hasil_iterasi, 'hasil_cluster' => $hasil_cluster);
	}
}
?>
