<?php

namespace App\Controllers;

class App extends BaseController
{
	public function index()
	{
		//return view("menu");
	}

	public function profil($npm)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/profil/".$npm);
		$body = json_decode($temp->getBody());
		$data['profil'] = $body->data[0];
		return view("profil",$data);
	}

	public function nilai($npm)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/nilai/".$npm);
		$data['nilai'] = json_decode($temp->getBody());
		return view("daftarnilai",$data);
	}	

	public function biayakuliah($npm)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/biayakuliah/".$npm);
		$data['biaya'] = json_decode($temp->getBody());
		return view("biayakuliah",$data);
	}	

	public function historymk($npm)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/historymk/".$npm);
		$data['historymk'] = json_decode($temp->getBody());
		//print_r($data['historymk']);
		return view("historymk",$data);
	}	

	public function absensikpn($npm)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/absensikpn/".$npm);
		$data['absensikpn'] = json_decode($temp->getBody());
		return view("absensikpn",$data);
	}	

	public function daftarmahasiswa($angkatan)
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/daftarmahasiswa/".$angkatan);
		$data['daftarmahasiswa'] = json_decode($temp->getBody());
		return view("daftarmahasiswa",$data);
	}	

	public function statistik()
	{
		return view("statistik");
	}	

	public function getstat()
	{
		$client = \Config\Services::curlrequest();
		$temp = $client->get("http://127.0.0.1:8090/statistik");
		$data['stat'] = json_decode($temp->getBody());
		return json_encode($data);
	}			
}
