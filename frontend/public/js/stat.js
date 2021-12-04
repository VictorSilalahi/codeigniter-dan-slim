$(document).ready(function () {
	
	$.ajax({
		method: "GET",
		url: $("#vbaseurl").val()+"/stat",
		dataType:"json",
		async:true,
		beforeSend:function() 
		{
			
		},
		success:function(data) 
		{
			var dataJK = [{
		  		values: [data['stat']['data'][0]['Jenis Kelamin']['Pria'], data['stat']['data'][0]['Jenis Kelamin']['Wanita'] ],
		  		labels: ['Pria', 'Wanita'],
		  		type: 'pie'
			}];

			var layout = {
				title: 'Grafik Jenis Kelamin',
		  		height: 400,
		  		width: 800
			};

			Plotly.newPlot('JK', dataJK, layout);

			var dataLokasi = [{
		  		values: [data['stat']['data'][1]['Lokasi']['Medan'], data['stat']['data'][1]['Lokasi']['Luar Medan'] ],
		  		labels: ['Medan', 'Luar Medan'],
		  		type: 'pie'
			}];

			var layout = {
				title: 'Grafik Lokasi',
		  		height: 400,
		  		width: 800
			};

			Plotly.newPlot('Lokasi', dataLokasi, layout);

			var dataAsalSekolah = [{
		  		values: [data['stat']['data'][2]['Asal Sekolah']['SMA'], data['stat']['data'][2]['Asal Sekolah']['SMK'] ],
		  		labels: ['SMA', 'SMK'],
		  		type: 'pie'
			}];

			var layout = {
				title: 'Grafik Asal Sekolah',
		  		height: 400,
		  		width: 800
			};

			Plotly.newPlot('AsalSekolah', dataAsalSekolah, layout);

		}
	});	

})