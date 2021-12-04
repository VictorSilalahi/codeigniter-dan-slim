<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>History Pembiayaan Kuliah Mahasiswa</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>


	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">History Pembiayaan Kuliah Mahasiswa</a>
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
			  			<img src="<?php echo 'http://127.0.0.1:8090/'.$biaya->data->keterangan[0]->photo; ?>" class="img-fluid img-thumbnail">
			  		</td>
			  		<td colspan="3">NPM</td><td colspan="5"><h5><?php echo $biaya->data->keterangan[0]->npm; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td colspan="3">Nama</td><td colspan="5"><h5><?php echo $biaya->data->keterangan[0]->nama; ?></h5></td>
			  	</tr>
			  	<tr>
			  		<td><h4>Tanggal</h4></td><td><h4>Semester</h4></td><td><h4>TA</h4></td><td><h4>Cicilan</h4></td><td><h4>Nilai</h4></td><td><h4>Sisa</h4></td><td><h4>Denda</h4></td><td><h4>Bukti</h4></td>
			  	</tr>
			  	<?php
			  		//print_r($biaya->data->keterangan[0]->photo);
			  		$hist = $biaya->data->history;
			  		for ($i=0; $i<count($hist); $i++)
			  		{
			  			echo "<tr><td>".$hist[$i]->tgl."</td><td>".$hist[$i]->sem."</td><td>".$hist[$i]->ta."</td><td>".$hist[$i]->cicilanke."</td><td>".$hist[$i]->nilai."</td><td>".$hist[$i]->sisa."</td><td>".$hist[$i]->denda."</td><td><img src='http://127.0.0.1:8090/images/".$hist[$i]->bukti."' width='100px' height='50px'></td></tr>";
			  		}
			  	?>
			  </tbody>				
			</table>
		</div>
	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
</html>