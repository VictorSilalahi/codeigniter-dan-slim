<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Daftar Mahasiswa</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>


	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Daftar Mahasiswa</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		</nav>

		<br><br>
		<div class="row" id="tblCetak">
			<table class="table">
			  <tbody>
			  	<tr>
			  		<td><h4>NPM</h4></td><td><h4>Nama</h4></td><td><h4>Jenis Kelamin</h4></td><td><h4>Alamat</h4></td><td><h4>Email</h4></td><td><h4>Tempat Lahir</h4></td><td><h4>Tanggal Lahir</h4></td><td><h4>Asal Sekolah</h4></td><td><h4>Foto Diri</h4></td>
			  	</tr>
			  	<?php
			  		//print_r($biaya->data->keterangan[0]->photo);
			  		$dm = $daftarmahasiswa->data;
			  		for ($i=0; $i<count($dm); $i++)
			  		{
			  			echo "<tr><td>".$dm[$i]->npm."</td><td>".$dm[$i]->nama."</td><td>".$dm[$i]->jk."</td><td>".$dm[$i]->alamat."</td><td>".$dm[$i]->email."</td><td>".$dm[$i]->tmplahir."</td><td>".$dm[$i]->tgllahir."</td><td>".$dm[$i]->asalsekolah."</td><td><img src='http://127.0.0.1:8090/".$dm[$i]->photo."' width='100px' height='150px'></td></tr>";
			  		}
			  	?>
			  </tbody>				
			</table>
		</div>
	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
</html>