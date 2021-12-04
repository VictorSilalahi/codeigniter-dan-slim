<?php

namespace App\Models;
use CodeIgniter\Model;

class M_admin extends Model {

	public function validasi($uname, $pwd) {

		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select count(*) as jlh from t_users where username='".$uname."' and pwd='".$pwd."' and jenis='administrator'");
		$row = $query->getRow();
		array_push($data, array("jlh"=>$row->jlh));
		return $data;
	}

	// merk
	public function merk() {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select * from t_merk");
		foreach ($query->getResult() as $row)
		{
			$query2 = $db->query("select count(*) as jlh from t_kendaraan where merkid=".$row->merkid);
			$row2 = $query2->getRow();
		    array_push($data, array("merkid"=>$row->merkid, "merk"=>$row->merk, "jumlah"=>$row2->jlh));
		}
		return $data;

	}

	public function tambahmerk($merk) {
		$db = \Config\Database::connect();
		$db->query("insert into t_merk (merk) values ('".$merk."')");
	}

	public function hapusmerk($merkid) {
		$db = \Config\Database::connect();
		$db->query("delete from t_merk where merkid=".$merkid);	
	}

	public function editmerk($merkid,$merk) {
		$db = \Config\Database::connect();
		$db->query("update t_merk set merk='".$merk."' where merkid=".$merkid);	
	}

	// kendaraan
	public function kendaraan() {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select t_kendaraan.kendaraanid, t_kendaraan.nama, t_merk.merk from t_kendaraan, t_merk where t_kendaraan.merkid=t_merk.merkid order by t_merk.merk");
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("kendaraanid"=>$row->kendaraanid, "nama"=>$row->nama, "merk"=>$row->merk));
		}
		return $data;

	}

	public function tambahkendaraan($tipe, $merkid) {
		$db = \Config\Database::connect();
		$db->query("insert into t_kendaraan (nama, merkid) values ('".$tipe."',".$merkid.")");
	}

	public function hapuskendaraan($kendaraanid) {
		$db = \Config\Database::connect();
		$db->query("delete from t_kendaraan where kendaraanid=".$kendaraanid);	
	}

	public function editkendaraan($tipe, $merkid, $idkendaraan) {
		$db = \Config\Database::connect();
		$db->query("update t_kendaraan set nama='".$tipe."', merkid=".$merkid." where kendaraanid=".$idkendaraan);	
	}

	// dealer
	public function dealer() {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select * from t_dealer order by nama asc");
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("dealerid"=>$row->dealerid, "nama"=>$row->nama, "alamat"=>$row->alamat, "email"=>$row->email, "nohp"=>$row->nohp, "contactperson"=>$row->contactperson));
		}
		return $data;

	}

	public function tambahdealer($nama, $alamat, $email, $nomobile, $contact) {
		$db = \Config\Database::connect();
		$db->query("insert into t_dealer (nama, alamat, email, nohp, contactperson) values ('".$nama."','".$alamat."','".$email."','".$nomobile."','".$contact."')");
	}

	public function hapusdealer($dealerid) {
		$db = \Config\Database::connect();
		$db->query("delete from t_dealer where dealerid=".$dealerid);	
	}

	public function editdealer($nama, $alamat, $email, $nomobile, $contact, $dealerid) {
		$db = \Config\Database::connect();
		$db->query("update t_dealer set nama='".$nama."', alamat='".$alamat."', email='".$email."', nohp='".$nomobile."', contactperson='".$contact."' where dealerid=".$dealerid);	
	}

	// marketing
	public function marketing() {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select marketingid, nama, email, status from t_marketing");
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("marketingid"=>$row->marketingid, "nama"=>$row->nama, "email"=>$row->email, "status"=>$row->status));
		}
		return $data;

	}

	public function tambahmarketing($nama, $email, $pwd) {
		$db = \Config\Database::connect();
		$db->query("insert into t_marketing (nama, email, pwd, status) values ('".$nama."','".$email."','".$pwd."','aktif')");
	}

	public function hapusmarketing($marketingid) {
		$db = \Config\Database::connect();
		$db->query("delete from t_marketing where marketingid=".$marketingid);	
	}

	public function setstatus($marketingid, $status) {
		$db = \Config\Database::connect();
		$db->query("update t_marketing set status='".$status."' where marketingid=".$marketingid);	
	}

	public function setpassword($marketingid, $pwd) {
		$db = \Config\Database::connect();
		$db->query("update t_marketing set pwd='".$pwd."' where marketingid=".$marketingid);	
	}	

	// report
	public function reportpermarketing($marketingid, $blnthn) {
		$data = array();
		$db = \Config\Database::connect();
		list($thn, $bln)=explode("-", $blnthn);
		$query = $db->query("select t_calonnasabah.nama, t_calonnasabah.alamat, t_calonnasabah.pekerjaan, t_kendaraan.nama as nk, t_calonnasabah.harga, t_dealer.nama as nd, t_calonnasabah.statperm from t_calonnasabah, t_kendaraan, t_dealer where t_calonnasabah.kendaraanid=t_kendaraan.kendaraanid and t_calonnasabah.dealerid=t_dealer.dealerid and t_calonnasabah.marketingid=".$marketingid." and year(t_calonnasabah.tglmasuk)=".intval($thn)." and month(t_calonnasabah.tglmasuk)=".intval($bln));
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("nama"=>$row->nama, "alamat"=>$row->alamat, "pekerjaan"=>$row->pekerjaan, "kendaraan"=>$row->nk, "harga"=>$row->harga, "dealer"=>$row->nd, "status"=>$row->statperm));
		}
		return $data;
	}	

	public function reportkinerjatahun($thn) {
		$data = array();
		$db = \Config\Database::connect();
		for ($i=1; $i<=12; $i++)
		{
			$deskripsi = array();
			$queryTotal = $db->query("select count(*) as jlh from t_calonnasabah where year(t_calonnasabah.tglmasuk)=".intval($thn)." and month(t_calonnasabah.tglmasuk)=".intval($i));
			$rowTotal = $queryTotal->getRow();
			$queryLayak = $db->query("select count(*) as jlh from t_calonnasabah where t_calonnasabah.statperm='layak' and year(t_calonnasabah.tglmasuk)=".intval($thn)." and month(t_calonnasabah.tglmasuk)=".intval($i));
			$rowLayak = $queryLayak->getRow();
			$queryTidakLayak = $db->query("select count(*) as jlh from t_calonnasabah where t_calonnasabah.statperm='tidak layak' and year(t_calonnasabah.tglmasuk)=".intval($thn)." and month(t_calonnasabah.tglmasuk)=".intval($i));
			$rowTidakLayak = $queryTidakLayak->getRow();
			array_push($deskripsi, array("total"=>$rowTotal->jlh, "Layak"=>$rowLayak->jlh, "Tidak Layak"=>$rowTidakLayak->jlh) );

			array_push($data, array("bulan"=>$i, "deskripsi"=>$deskripsi));
		}
		return $data;
	}		

}