<?php

namespace App\Models;
use CodeIgniter\Model;

class M_marketing extends Model {

	public function validasi($uname, $pwd) {

		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select count(*) as jlh from t_marketing where email='".$uname."' and pwd='".$pwd."'");
		$row = $query->getRow();
		if ($row->jlh==1)
		{
			$query2 = $db->query("select marketingid, nama from t_marketing where email='".$uname."' and pwd='".$pwd."'");
			$row2 = $query2->getRow();
			array_push($data, array("jlh"=>$row->jlh, "marketingid"=>$row2->marketingid, "nama"=>$row2->nama));
		}
		else
		{
			array_push($data, array("jlh"=>0));
		}
		return $data;
	}

	// nasabah
	public function nasabah() {
		$data = array();
		$db = \Config\Database::connect();

		$currMonth = date("m");
		$currYear = date("Y");
		$query = $db->query("select t_calonnasabah.calonnasabahid, t_calonnasabah.nama, t_calonnasabah.alamat, t_kendaraan.nama as nk, t_merk.merk, t_dealer.nama as nd from t_calonnasabah, t_kendaraan, t_merk, t_dealer where t_calonnasabah.kendaraanid=t_kendaraan.kendaraanid and t_kendaraan.merkid=t_merk.merkid and t_calonnasabah.dealerid=t_dealer.dealerid and month(t_calonnasabah.tglmasuk)=".$currMonth." and year(t_calonnasabah.tglmasuk)=".$currYear." and t_calonnasabah.statperm='diproses'");
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("calonnasabahid"=>$row->calonnasabahid, "nama"=>$row->nama, "alamat"=>$row->alamat, "nk"=>$row->nk, "merk"=>$row->merk, "nd"=>$row->nd));
		}
		return $data;

	}

	public function daftarkendaraan($merkid) {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select t_kendaraan.kendaraanid, t_kendaraan.nama from t_kendaraan where t_kendaraan.merkid=".$merkid);
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("kendaraanid"=>$row->kendaraanid, "nama"=>$row->nama));
		}
		return $data;

	}

	public function tambahnasabah($nama, $jk, $alamat, $status, $pekerjaan, $kendaraanid, $harga, $dp, $jbln, $kpbulan, $dealerid, $marketingid) {
		$db = \Config\Database::connect();
		$db->query("insert into t_calonnasabah (nama, jk, alamat, status, pekerjaan, kendaraanid, harga, dp, jbulan, kpbulan, dealerid, marketingid, tglmasuk, statperm) values ('".$nama."','".$jk."','".$alamat."','".$status."','".$pekerjaan."',".$kendaraanid.",".$harga.",".$dp.",".$jbln.",".$kpbulan.",".$dealerid.",".$marketingid.",now(), 'diproses')");
		$query = $db->query("select max(calonnasabahid) as cnid from t_calonnasabah where marketingid=".$marketingid);
		$row = $query->getRow();
		return $row->cnid;
	}

	public function setfilenasabah($nnKTP, $nnKTPpasangan, $nnfKK, $nnfRL, $cnid) {
		$db = \Config\Database::connect();
		$db->query("update t_calonnasabah set fktp='".$nnKTP."',fktpp='".$nnKTPpasangan."',fkk='".$nnfKK."',frl='".$nnfRL."' where calonnasabahid=".$cnid);
	}

	public function hapusnasabah($calonnasabahid) {
		$db = \Config\Database::connect();
		$db->query("delete from t_calonnasabah where calonnasabahid=".$calonnasabahid);
	}

	public function survey($P, $C1, $C2, $C3, $C4, $C5, $PA, $calonnasabahid) {
		$db = \Config\Database::connect();
		$db->query("insert into t_survey (calonnasabahid, 1p, c1, c2, c3, c4, c5, pa) values (".$calonnasabahid.",'".$P."','".$C1."','".$C2."','".$C3."','".$C4."','".$C5."','".$PA."')");
		$db->query("update t_calonnasabah set statperm='".$PA."' where calonnasabahid=".$calonnasabahid);

	}

	public function daftarnasabahkondisi($kondisi, $marketingid) {
		$data = array();
		$db = \Config\Database::connect();
		$query = $db->query("select t_calonnasabah.nama, t_calonnasabah.alamat, t_calonnasabah.pekerjaan, t_kendaraan.nama as nk, t_dealer.nama as nd from t_calonnasabah, t_kendaraan, t_dealer where t_calonnasabah.kendaraanid=t_kendaraan.kendaraanid and t_calonnasabah.dealerid=t_dealer.dealerid and t_calonnasabah.statperm='".$kondisi."' order by t_calonnasabah.nama");
		foreach ($query->getResult() as $row)
		{
		    array_push($data, array("nama"=>$row->nama, "alamat"=>$row->alamat, "pekerjaan"=>$row->pekerjaan, "kendaraan"=>$row->nk, "dealer"=>$row->nd));
		}
		return $data;

	}
}