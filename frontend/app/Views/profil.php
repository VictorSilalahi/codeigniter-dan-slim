<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Profil Mahasiswa</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>


	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Profil Mahasiswa</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		</nav>

		<br><br>
		<div class="row" id="tblCetak">
			<table class="table">
			  <tbody>
			  	<tr>
			  		<td rowspan='10'>
			  			<img src="<?php echo 'http://127.0.0.1:8090/'.$profil->photo; ?>" class="img-fluid img-thumbnail">
			  		</td>
			  		<td>NPM</td><td><?php echo $profil->npm; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Nama</td><td><?php echo $profil->nama; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Jenis Kelamin</td><td><?php echo $profil->jk; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Alamat</td><td><?php echo $profil->alamat; ?></td>
			  	</tr>
			  	<tr>
			  		<td>No HP</td><td><?php echo $profil->nohp; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Email</td><td><?php echo $profil->email; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Tempat Lahir</td><td><?php echo $profil->tmplahir; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Tanggal Lahir</td><td><?php echo date('d F Y', strtotime($profil->tgllahir)); ?></td>
			  	</tr>
			  	<tr>
			  		<td>Angkatan</td><td><?php echo $profil->angkatan; ?></td>
			  	</tr>
			  	<tr>
			  		<td>Asal Sekolah</td><td><?php echo $profil->asalsekolah; ?></td>
			  	</tr>
			  </tbody>				
			</table>
		</div>
	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
</html>