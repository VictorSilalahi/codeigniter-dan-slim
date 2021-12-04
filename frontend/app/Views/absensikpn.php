<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Absensi KPN</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>

	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Absensi KPN</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		</nav>

		<br><br>
		<div class="row" id="tblCetak">
			<table class="table">
			  <tbody>
			  	<tr>
			  		<td rowspan='60'>
			  			<img src="<?php echo 'http://127.0.0.1:8090/'.$absensikpn->data->keterangan[0]->photo; ?>" class="img-fluid img-thumbnail">
			  		</td>
			  		<td>NPM</td><td colspan="3"><h5><?php echo $absensikpn->data->keterangan[0]->npm; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td>Nama</td><td colspan="3"><h5><?php echo $absensikpn->data->keterangan[0]->nama; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td><h4>Nama Mata Kuliah</h4></td><td colspan='2'><h4>Tanggal Kehadiran</h4></td>
			  	</tr>
			  	<?php
			  		$dn = $absensikpn->data->daftarhadir;
			  		for ($i=0; $i<count($dn); $i++)
			  		{
			  			echo "<tr><td><h3><div class='badge'>".$dn[$i]->matakuliah."</div></h3></td><td></td>";
			  			$ut = $dn[$i]->urutantanggal;
			  			$nk = 1;
			  			for ($j=0; $j<count($ut); $j++)
			  			{
			  				echo "<tr><td>(".$nk.")</td><td>".$ut[$j]->tgl."</td></tr>";
			  				$nk++;
			  			}

			  			//echo "<tr><td>".$dn[$i]->sem."</td><td>".$dn[$i]->kode."</td><td>".$dn[$i]->nama."</td><td>".$dn[$i]->sks."</td><td>".$dn[$i]->nh."</td><td>".$dn[$i]->tglujian."</td></tr>";
			  		}
			  	?>
			  </tbody>				
			</table>
		</div>
	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
</html>