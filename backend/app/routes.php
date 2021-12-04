<?php


// REST API untuk Akademik
$app->get("/profil/{npm}", function($request, $response, $args ) {

	$npm = $args["npm"];
	$sql = "select npm, nama, jk, alamat, nohp, email, tmplahir, tgllahir, angkatan, asalsekolah, photo from t_mahasiswa where npm='".$npm."'";

	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$mahasiswa = $stmt->fetchAll(PDO::FETCH_OBJ);

		$db = null;

		//return json_encode(["status" => "success", "data" => $mahasiswa], 200);
		return $response->withJson(["status" => "success", "data" => $mahasiswa], 200);

		
	} catch (PDOException $e) {
		//return json_encode(["status" => "failed", "data" => 0], 200);
		return $response->withJson(["status" => "success", "data" => 0], 200);
	}

});

$app->get("/nilai/{npm}", function($request, $response, $args ) {

	$npm = $args["npm"];
	$sql = "select t_mahasiswa.mahasiswaid, t_mahasiswa.npm, t_mahasiswa.nama, t_mahasiswa.photo from t_mahasiswa where npm='".$npm."'";

	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$mahasiswa = $stmt->fetch();
		$keterangan = array("npm"=>$mahasiswa[1], "nama"=>$mahasiswa[2], "photo"=>$mahasiswa[3] );

		$stmt = $db->query("select t_matakuliah.kode, t_matakuliah.nama, t_matakuliah.sks, t_matakuliah.sem, t_nilaimk.nh from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[0]);
		$nilai = $stmt->fetchAll(PDO::FETCH_OBJ);

		$temp=array();
		$subtotal=0;
		$totalsks=0;
		for ($j=0; $j<count($nilai); $j++)
		{
			if ($nilai[$j]->nh=='A')
				{
					$subtotal = $subtotal + $nilai[$j]->sks*4;
				}
				if ($nilai[$j]->nh=='B')
				{
					$subtotal = $subtotal + $nilai[$j]->sks*3;
				}
				if ($nilai[$j]->nh=='C')
				{
					$subtotal = $subtotal + $nilai[$j]->sks*2;
				}
				if ($nilai[$j]->nh=='D')
				{
					$subtotal = $subtotal + $nilai[$j]->sks*1;
				}
				if ($nilai[$j]->nh=='E')
				{
					$subtotal = $subtotal + $nilai[$j]->sks*0;
				}
				$totalsks = $totalsks + $nilai[$j]->sks;
				array_push($temp, array( "kode"=>$nilai[$j]->kode, "nama"=>htmlspecialchars($nilai[$j]->nama), "sks"=>$nilai[$j]->sks, "sem"=>$nilai[$j]->sem, "nilai"=>$nilai[$j]->nh ) );
		}


		$db = null;

		if ($totalsks >0)
		{
			return $response->withJson(["status" => "success", "data" => array("keterangan"=>$keterangan, "daftarnilai"=>$temp, "summary"=>array("totalsks"=>$totalsks, "ipk"=>$subtotal / $totalsks)) ], 200);
		}
		else
		{
			return $response->withJson(["status" => "success", "data" => array("keterangan"=>$keterangan, "daftarnilai"=>$temp, "summary"=>array("totalsks"=>$totalsks, "ipk"=>0)) ], 200);

		}
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "failed", "data" => 0], 200);

	}

});

$app->get("/biayakuliah/{npm}", function($request, $response, $args ) {

	$npm = $args["npm"];

	$sql = "select t_mahasiswa.mahasiswaid, t_mahasiswa.npm, t_mahasiswa.nama, t_mahasiswa.photo from t_mahasiswa where npm='".$npm."'";

	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$keterangan = $stmt->fetchAll(PDO::FETCH_OBJ);

		$sql = "select t_pembayaran.sem, t_pembayaran.ta, t_pembayaran.cicilanke, t_pembayaran.nilai, t_pembayaran.sisa, t_pembayaran.denda, t_pembayaran.tgl, t_pembayaran.bukti from t_pembayaran, t_mahasiswa where t_pembayaran.mahasiswaid=t_mahasiswa.mahasiswaid and t_mahasiswa.npm='".$npm."' order by t_pembayaran.ta";
		$stmt = $db->query($sql);
		$pembayaran = $stmt->fetchAll(PDO::FETCH_OBJ);

		$db = null;

		return $response->withJson(["status" => "success", "data" => array("keterangan"=>$keterangan, "history"=>$pembayaran)], 200);
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "failed", "data" => 0], 200);
	}

});

$app->get("/historymk/{npm}", function($request, $response, $args ) {

	$npm = $args["npm"];

	$sql = "select t_mahasiswa.mahasiswaid, t_mahasiswa.npm, t_mahasiswa.nama, t_mahasiswa.photo from t_mahasiswa where npm='".$npm."'";

	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$keterangan = $stmt->fetchAll(PDO::FETCH_OBJ);

		$sql = "select t_matakuliah.sem, t_matakuliah.kode, t_matakuliah.nama, t_matakuliah.sks, t_nilaimk.nh, t_historymk.tglujian from t_matakuliah, t_nilaimk, t_historymk, t_mahasiswa where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.matakuliahid=t_historymk.matakuliahid and t_nilaimk.mahasiswaid=t_mahasiswa.mahasiswaid and t_mahasiswa.npm='".$npm."' order by t_historymk.tglujian asc";
		$stmt = $db->query($sql);
		$history = $stmt->fetchAll(PDO::FETCH_OBJ);

		$db = null;

		return $response->withJson(["status" => "success", "data" => array("keterangan"=>$keterangan, "daftartanggal"=>$history)], 200);
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "failed", "data" => 0], 200);
	}

});

$app->get("/absensikpn/{npm}", function($request, $response, $args ) {

	$npm = $args["npm"];

	$sql = "select t_mahasiswa.mahasiswaid, t_mahasiswa.npm, t_mahasiswa.nama, t_mahasiswa.photo from t_mahasiswa where npm='".$npm."'";

	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$keterangan = $stmt->fetchAll(PDO::FETCH_OBJ);

		$sql = "select distinct(t_absensikpn.matakuliahid), t_matakuliah.kode, t_matakuliah.nama from t_absensikpn, t_mahasiswa, t_matakuliah where t_absensikpn.matakuliahid=t_matakuliah.matakuliahid and t_absensikpn.mahasiswaid=t_mahasiswa.mahasiswaid and t_mahasiswa.npm='".$npm."'";
		$stmt = $db->query($sql);
		$matakuliah = $stmt->fetchAll(PDO::FETCH_OBJ);

		$daftarhadir = array();
		for ($i=0; $i<count($matakuliah); $i++)
		{
			$sql = "select t_absensikpn.tgl from t_absensikpn where t_absensikpn.matakuliahid=".$matakuliah[$i]->matakuliahid;
			$stmt = $db->query($sql);
			$tanggalhadir = $stmt->fetchAll(PDO::FETCH_OBJ);
			array_push($daftarhadir, array( "matakuliah"=>$matakuliah[$i]->nama, "urutantanggal"=>$tanggalhadir ) );
		}
		$db = null;

		return $response->withJson(["status" => "success", "data" => array("keterangan"=>$keterangan, "daftarhadir"=>$daftarhadir)], 200);
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "failed", "data" => 0], 200);
	}

});

$app->get("/daftarmahasiswa/{angkatan}", function($request, $response, $args ) {

	$angkatan = $args["angkatan"];
	$sql = "select mahasiswaid, npm, nama, jk, alamat, nohp, email, tmplahir, tgllahir, asalsekolah, photo from t_mahasiswa where angkatan='".$angkatan."'";
	try {
		
		$db = new db();
		$db = $db->connect();

		$stmt = $db->query($sql);
		$mahasiswa = $stmt->fetchAll(PDO::FETCH_OBJ);

		$totalsks = 0;
		$totalip = 0;
		$temp = array();
		for ($j=0; $j<count($mahasiswa); $j++)
		{
			$stmt = $db->query("select sum(t_matakuliah.sks) as totalsks from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[$j]->mahasiswaid." and t_nilaimk.nh='A'");
			$nilaiA = $stmt->fetch();
			$totalsks = $totalsks + $nilaiA[0];
			$totalip = $totalip + $nilaiA[0]*4;

			$stmt = $db->query("select sum(t_matakuliah.sks) as totalsks from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[$j]->mahasiswaid." and t_nilaimk.nh='B'");
			$nilaiB = $stmt->fetch();
			$totalsks = $totalsks + $nilaiB[0];
			$totalip = $totalip + $nilaiB[0]*3;

			$stmt = $db->query("select sum(t_matakuliah.sks) as totalsks from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[$j]->mahasiswaid." and t_nilaimk.nh='C'");
			$nilaiC = $stmt->fetch();
			$totalsks = $totalsks + $nilaiC[0];
			$totalip = $totalip + $nilaiC[0]*2;

			$stmt = $db->query("select sum(t_matakuliah.sks) as totalsks from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[$j]->mahasiswaid." and t_nilaimk.nh='D'");
			$nilaiD = $stmt->fetch();
			$totalsks = $totalsks + $nilaiD[0];
			$totalip = $totalip + $nilaiD[0]*1;

			$stmt = $db->query("select sum(t_matakuliah.sks) as totalsks from t_matakuliah, t_nilaimk where t_matakuliah.matakuliahid=t_nilaimk.matakuliahid and t_nilaimk.mahasiswaid=".$mahasiswa[$j]->mahasiswaid." and t_nilaimk.nh='E'");
			$nilaiE = $stmt->fetch();
			$totalsks = $totalsks + $nilaiE[0];
			$totalip = $totalip + $nilaiE[0]*0;

			if ($totalsks != 0)
			{
				array_push($temp, array( "npm"=>$mahasiswa[$j]->npm, "nama"=>$mahasiswa[$j]->nama, "jk"=>$mahasiswa[$j]->jk, "alamat"=>$mahasiswa[$j]->alamat, "email"=>$mahasiswa[$j]->email,  "tmplahir"=>$mahasiswa[$j]->tmplahir, "tgllahir"=>$mahasiswa[$j]->tgllahir, "asalsekolah"=>$mahasiswa[$j]->asalsekolah, "photo"=>$mahasiswa[$j]->photo, "ipk"=>$totalip / $totalsks ));
			}
			else
			{
				array_push($temp, array( "npm"=>$mahasiswa[$j]->npm, "nama"=>$mahasiswa[$j]->nama, "jk"=>$mahasiswa[$j]->jk, "alamat"=>$mahasiswa[$j]->alamat, "email"=>$mahasiswa[$j]->email,  "tmplahir"=>$mahasiswa[$j]->tmplahir, "tgllahir"=>$mahasiswa[$j]->tgllahir, "asalsekolah"=>$mahasiswa[$j]->asalsekolah, "photo"=>$mahasiswa[$j]->photo, "ipk"=>0 ));
			}
			$totalsks = 0;
			$totalip = 0;
		}

		$db = null;

		return $response->withJson(["status" => "success", "data" => $temp], 200);
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "success", "data" => 0], 200);
	}

});

$app->get("/statistik", function($request, $response, $args ) {


	header('Access-Control-Allow-Origin: *'); 
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

	$temp = array();

	try {
		
		$db = new db();
		$db = $db->connect();

		$sql = "select count(*) as jlh from t_mahasiswa where jk='Pria'";
		$stmt = $db->query($sql);
		$jk = $stmt->fetch();
		$pria = $jk[0];

		$sql = "select count(*) as jlh from t_mahasiswa where jk='Wanita'";
		$stmt = $db->query($sql);
		$jk = $stmt->fetch();
		$wanita = $jk[0];

		array_push($temp, array("Jenis Kelamin"=>array("Pria"=>$pria, "Wanita"=>$wanita)));

		$sql = "select count(*) as jlh from t_mahasiswa where tmplahir='Medan'";
		$stmt = $db->query($sql);
		$lokasi = $stmt->fetch();
		$Medan = $lokasi[0];

		$sql = "select count(*) as jlh from t_mahasiswa where NOT (tmplahir='Medan')";
		$stmt = $db->query($sql);
		$lokasi = $stmt->fetch();
		$LuarMedan = $lokasi[0];

		array_push($temp, array("Lokasi"=>array("Medan"=>$Medan, "Luar Medan"=>$LuarMedan)));


		$sql = "select count(*) as jlh from t_mahasiswa where asalsekolah='SMA'";
		$stmt = $db->query($sql);
		$asalsekolah = $stmt->fetch();
		$SMA = $asalsekolah[0];

		$sql = "select count(*) as jlh from t_mahasiswa where asalsekolah='SMK'";
		$stmt = $db->query($sql);
		$asalsekolah = $stmt->fetch();
		$SMK = $asalsekolah[0];

		array_push($temp, array("Asal Sekolah"=>array("SMA"=>$SMA, "SMK"=>$SMK)));
		$db = null;

		return $response->withJson(["status" => "success", "data" => $temp], 200);
		
	} catch (PDOException $e) {
		return $response->withJson(["status" => "failed", "data" => 0], 200);
	}

});

