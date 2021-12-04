<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Statistik</title>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('public/js/plotly.js'); ?>"></script>
</head>
<body>


	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Statistik</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		</nav>
		<br><br>

		<div class="row" style="width:100%">
			<div id="JK"></div>
		</div>
		<br>
		<div class="row" style="width:100%">
			<div id="Lokasi"></div>
		</div>
		<br>
		<div class="row" style="width:100%">
			<div id="AsalSekolah"></div>
		</div>

	</div>
	<input type="hidden" id="vbaseurl" value="<?php echo base_url(); ?>">
</body>
<script type="text/javascript" src="<?php echo base_url('public/js/stat.js'); ?>"></script>
</html>