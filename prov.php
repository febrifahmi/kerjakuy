<?php
/*
* Cari Loker Jooble ID
* Code by ~ @febrifahmi ~ fork from @xyussanx's code of RajaOngkir
* Update: 14/04/2018 
*/

class joobleLoker{
	
	public function __construct()
	{
		# code...
	}

	public function loadProvinsi(){
		# code...
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array("key:25caaf0a9311810faa917b15dce09087"),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}

	public function loadKabkot($province){
		# code...
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://rajaongkir.com/api/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array("key:25caaf0a9311810faa917b15dce09087"),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}

	// public function cariLoker($jobkeyword,$joblocation){
	// 	# code...
	// 	$curl = curl_init();
	// 	$key = "042a0845-99da-4b68-8239-02345a7b4250";
	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => "https://id.jooble.org/api/"+$key,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_ENCODING => "",
	// 		CURLOPT_MAXREDIRS => 10,
	// 		CURLOPT_TIMEOUT => 30,
	// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 		CURLOPT_CUSTOMREQUEST => "POST",
	// 		CURLOPT_POSTFIELDS => '{ "keywords": "manajer", "location": "jakarta selatan"}',
	// 		CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),
	// 		));
	// 	$response = curl_exec($curl);
	// 	$err = curl_error($curl);
	// 	curl_close($curl);
	// 	if ($err) {
	// 		$result = 'error';
	// 		return 'error';
	// 	} else {
	// 		return $response;
	// 	}
	// }

	public function cariLoker($jobkeyword,$joblocation){
		$url = "https://id.jooble.org/api/";
		$key = "042a0845-99da-4b68-8239-02345a7b4250";
		//The JSON data.
		$jsonData = json_encode(array(
		    'keywords' => $jobkeyword,
		    'location' => $joblocation
		));

		//create request object
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url."".$key);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec ($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		if ($err) {
			$result = 'error';
			return $result;
		} else {
			return $server_output;	
		}
		//print response
		//print_r($server_output);
		

	}
}