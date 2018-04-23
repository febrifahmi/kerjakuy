<?php
/*
* Cari Loker Jooble ID
* Code by ~ @febrifahmi ~ fork from @xyussanx's code of RajaOngkir
* Update: 14/04/2018 
*/

require_once('prov.php');
$joobleLoker = new joobleLoker();
if(isset($_GET['q'])):
	switch ($_GET['q']) {
		case 'loadprovince':
			$province = $joobleLoker->loadProvinsi();
			echo $province;
		break;
		case 'loadcity':
			$idprovince = $_GET['province'];
			$city = $joobleLoker->loadKabkot($idprovince);
			echo $city;
		break;
		case 'getloker':
			# code...
			$joblocation = $_GET['namaprovinsi'].", ".$_GET['namakota'];
			$jobkeyword = $_GET['keyword'];
			$listlowongan = $joobleLoker->cariLoker($jobkeyword,$joblocation);
			// parse json
			$jobsarray = json_decode($listlowongan);
			$jobs = $jobsarray->jobs;
			if(!empty($jobs)){
				foreach($jobs as $lowongan):
					echo "<tr><td> $lowongan->title </td><td> $lowongan->location </td><td> $lowongan->snippet </td><td> $lowongan->salary </td><td> $lowongan->company </td><td> $lowongan->updated </td><td> <a class=\"button button-primary\" href=\"$lowongan->link\">Lihat Detil</a></td></tr>";
				endforeach;
			}
			else{
				echo "Posisi yang anda cari tidak ditemukan.";
			}
		break;

		default:
# code...
		break;
	}
	endif;
