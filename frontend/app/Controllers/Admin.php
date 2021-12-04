<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view("admin/login");
	}

	public function validasi()
	{

		// periksa login dan password
		if ( isset($_POST['txtUsername']) && isset($_POST['txtPassword']) )
		{
			$request = \Config\Services::request();
			$uname = $request->getPost('txtUsername');
			$pwd = $request->getPost('txtPassword');
			// periksa username dan password
			$mAdmin = new \App\Models\M_admin;
			$res = $mAdmin->validasi($uname,$pwd);
			if ($res[0]["jlh"]!=1)
			{
				return redirect()->to(base_url("/admin"));

			}
			else
			{
				$sess = \Config\Services::session();
				$userdata = array(
					"nama"=>"administrator",
				);
				$sess->set($userdata);
				return redirect()->to(base_url("/admin/merk"));
			}
		}
		
	}

	// merk
	public function merk()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		$data['merk'] = $mAdmin->merk();		
		return view("admin/merk",$data);
	}	

	public function tambahmerk()
	{
		$request = \Config\Services::request();
		$merk = $request->getPost('txtMerk');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->tambahmerk($merk);
		return redirect()->to(base_url("/admin/merk"));

	}	

	public function editmerk()
	{
		$request = \Config\Services::request();
		$merk = $request->getPost('txtMerk');
		$merkid = $request->getPost('idmerk');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->editmerk($merkid, $merk);
		return redirect()->to(base_url("/admin/merk"));

	}	

	public function hapusmerk()
	{
        $uri = $this->request->uri;
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->hapusmerk($uri->getSegment(3));
		return redirect()->to(base_url("/admin/merk"));

	}	

	// kendaraan
	public function kendaraan()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		$data['kendaraan'] = $mAdmin->kendaraan();
		$data['merk'] = $mAdmin->merk();		
		return view("admin/kendaraan",$data);
	}	

	public function tambahkendaraan()
	{
		$request = \Config\Services::request();
		$tipe = $request->getPost('txtTipe');
		$merk = $request->getPost('slcMerk');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->tambahkendaraan($tipe, $merk);
		return redirect()->to(base_url("/admin/kendaraan"));

	}	

	public function hapuskendaraan()
	{
        $uri = $this->request->uri;
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->hapuskendaraan($uri->getSegment(3));
		return redirect()->to(base_url("/admin/kendaraan"));

	}	

	public function editkendaraan()
	{
		$request = \Config\Services::request();
		$tipe = $request->getPost('txtTipe');
		$merkid = $request->getPost('slcMerk');
		$idkendaraan = $request->getPost('idkendaraan');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->editkendaraan($tipe, $merkid, $idkendaraan);
		return redirect()->to(base_url("/admin/kendaraan"));

	}	

	// marketing
	public function tenagamarketing()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		$data['marketing'] = $mAdmin->marketing();
		return view("admin/tenagamarketing",$data);
	}	

	public function tambahmarketing()
	{
		$request = \Config\Services::request();
		$nama = $request->getPost('txtNamaLengkap');
		$email = $request->getPost('txtEmail');
		$pwd = $request->getPost('txtPassword1');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->tambahmarketing($nama, $email, $pwd);
		return redirect()->to(base_url("/admin/tenagamarketing"));

	}	

	public function hapusmarketing()
	{
        $uri = $this->request->uri;
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->hapusmarketing($uri->getSegment(3));
		return redirect()->to(base_url("/admin/tenagamarketing"));

	}	

	public function setstatus()
	{
		$request = \Config\Services::request();
		$marketingid = $request->getPost('idmarketing');
		$status = $request->getPost('slcStatus');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->setstatus($marketingid, $status);
		return redirect()->to(base_url("/admin/tenagamarketing"));

	}	

	public function setpassword()
	{
		$request = \Config\Services::request();
		$marketingid = $request->getPost('idmarketing');
		$pwd = $request->getPost('txtPassword1');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->setpassword($marketingid, $pwd);
		return redirect()->to(base_url("/admin/tenagamarketing"));

	}	

	// report
	public function reportmarketing()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		$data['marketing'] = $mAdmin->marketing();
		return view("admin/reportmarketing",$data);
	}	

	public function reportkinerja()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		return view("admin/reportkinerja",$data);
	}	

	public function reportkinerjatahun()
	{
		$data=array();
		$request = \Config\Services::request();
		$thn = $request->getPost('thn');
		$mAdmin = new \App\Models\M_admin;
		$data['kinerja']=$mAdmin->reportkinerjatahun($thn);
		echo json_encode($data['kinerja']);

	}	

	public function reportpermarketing()
	{
		$data=array();
		$request = \Config\Services::request();
		$marketingid = $request->getPost('marketingid');
		$blnthn = $request->getPost('blnthn');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->reportpermarketing($marketingid, $blnthn);
		$data['nasabah']=$mAdmin->reportpermarketing($marketingid, $blnthn);
		echo json_encode($data['nasabah']);

	}	

	// dealer
	public function dealer()
	{
		$data = array();
		$mAdmin = new \App\Models\M_admin;
		$data['dealer'] = $mAdmin->dealer();		
		return view("admin/dealer",$data);

	}	
	public function tambahdealer()
	{
		$request = \Config\Services::request();
		$nama = $request->getPost('txtNama');
		$alamat = $request->getPost('txtAlamat');
		$email = $request->getPost('txtEmail');
		$nomobile = $request->getPost('txtNoMobile');
		$contact = $request->getPost('txtContactPerson');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->tambahdealer($nama, $alamat, $email, $nomobile, $contact);
		return redirect()->to(base_url("/admin/dealer"));

	}	

	public function editdealer()
	{
		$request = \Config\Services::request();
		$nama = $request->getPost('txtNama');
		$alamat = $request->getPost('txtAlamat');
		$email = $request->getPost('txtEmail');
		$nomobile = $request->getPost('txtNoMobile');
		$contact = $request->getPost('txtContactPerson');
		$dealerid = $request->getPost('iddealer');
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->editdealer($nama, $alamat, $email, $nomobile, $contact, $dealerid);
		return redirect()->to(base_url("/admin/dealer"));

	}	

	public function hapusdealer()
	{
        $uri = $this->request->uri;
		$mAdmin = new \App\Models\M_admin;
		$mAdmin->hapusdealer($uri->getSegment(3));
		return redirect()->to(base_url("/admin/dealer"));

	}	


	public function logout()
	{
		return redirect()->to(base_url());
	}
}
