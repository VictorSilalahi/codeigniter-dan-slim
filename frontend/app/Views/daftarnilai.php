<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Data Nilai Mahasiswa</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>


	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Data Nilai Mahasiswa</a>
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
			  			<img src="<?php echo 'http://127.0.0.1:8090/'.$nilai->data->keterangan->photo; ?>" class="img-fluid img-thumbnail">
			  		</td>
			  		<td colspan="2">NPM</td><td colspan="3"><h5><?php echo $nilai->data->keterangan->npm; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td colspan="2">Nama</td><td colspan="3"><h5><?php echo $nilai->data->keterangan->nama; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td><h4>Kode</h4></td><td><h4>Nama Mata Kuliah</h4></td><td><h4>SKS</h4></td><td><h4>Semester</h4></td><td><h4>Nilai</h4></td>
			  	</tr>
			  	<?php
			  		$dn = $nilai->data->daftarnilai;
			  		//print_r($dn);
			  		for ($i=0; $i<count($dn); $i++)
			  		{
			  			//echo $dn[$i]->kode;
			  			echo "<tr><td>".$dn[$i]->kode."</td><td>".$dn[$i]->nama."</td><td>".$dn[$i]->sks."</td><td>".$dn[$i]->sem."</td><td>".$dn[$i]->nilai."</td></tr>";
			  		}
			  	?>
			  	<tr>
			  		<td colspan="2">Total SKS</td><td colspan="3"><h5><?php echo $nilai->data->summary->totalsks; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td colspan="2">Index Prestasi Kumulatif</td><td colspan="3"><h5><?php echo round($nilai->data->summary->ipk,2); ?></h5></td>
			  	</tr>
			  </tbody>				
			</table>
		</div>
	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
</html>