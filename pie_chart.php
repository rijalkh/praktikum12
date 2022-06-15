<?php
include('koneksi.php');
$covid = mysqli_query($koneksi,"select * from penderitacovid_19");
while($row = mysqli_fetch_array($covid)){
	$negara[] = $row['Country'];
	
	$query = mysqli_query($koneksi,"select New_cases as New_cases, sum(Total_death) as Total_death, New_death as New_death, sum(Total_Recovered) as Total_Recovered, New_recovered as New_recovered from penderitacovid_19 where id='".$row['id']."'");
	$row = $query->fetch_array();
    
    $kasus_baru[] = $row['New_cases'];
    $jumlah_mati[] = $row['Total_death'];
    $mati_baru[] = $row['New_death'];
    $jumlah_sembuh[] = $row['Total_Recovered'];
    $sembuh_baru[] = $row['New_recovered'];}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:80%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [
                    {
					data:<?php echo json_encode($kasus_baru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(35, 15, 214, 0.6)',
                    'rgba(154, 214, 15, 0.6)',
					'rgba(212, 66, 245, 0.6)',
					'rgba(222, 14, 7, 0.6)',
					'rgba(4, 158, 2, 0.6)',
                    'rgba(211, 214, 15, 0.6)',
                    'rgba(214, 91, 15, 0.6)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(35, 15, 214, 1)',
                    'rgba(154, 214, 15, 1)',
					'rgba(212, 66, 245, 1)',
					'rgba(222, 14, 7, 1)',
					'rgba(4, 158, 2, 1)',
                    'rgba(211, 214, 15, 1)',
					'rgba(214, 91, 15, 1)'
					],
					label: 'Kasus baru covid-19'
				},
                {
					data:<?php echo json_encode($jumlah_mati); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(35, 15, 214, 0.6)',
                    'rgba(154, 214, 15, 0.6)',
					'rgba(212, 66, 245, 0.6)',
					'rgba(222, 14, 7, 0.6)',
					'rgba(4, 158, 2, 0.6)',
                    'rgba(211, 214, 15, 0.6)',
                    'rgba(214, 91, 15, 0.6)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(35, 15, 214, 1)',
                    'rgba(154, 214, 15, 1)',
					'rgba(212, 66, 245, 1)',
					'rgba(222, 14, 7, 1)',
					'rgba(4, 158, 2, 1)',
                    'rgba(211, 214, 15, 1)',
					'rgba(214, 91, 15, 1)'
					],
					label: 'Total kasus kematian covid-19'
				},
                {
					data:<?php echo json_encode($mati_baru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(35, 15, 214, 0.6)',
                    'rgba(154, 214, 15, 0.6)',
					'rgba(212, 66, 245, 0.6)',
					'rgba(222, 14, 7, 0.6)',
					'rgba(4, 158, 2, 0.6)',
                    'rgba(211, 214, 15, 0.6)',
                    'rgba(214, 91, 15, 0.6)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(35, 15, 214, 1)',
                    'rgba(154, 214, 15, 1)',
					'rgba(212, 66, 245, 1)',
					'rgba(222, 14, 7, 1)',
					'rgba(4, 158, 2, 1)',
                    'rgba(211, 214, 15, 1)',
					'rgba(214, 91, 15, 1)'
					],
					label: 'Kasus kematian baru Covid-19'
				},
                {
					data:<?php echo json_encode($jumlah_sembuh); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(35, 15, 214, 0.6)',
                    'rgba(154, 214, 15, 0.6)',
					'rgba(212, 66, 245, 0.6)',
					'rgba(222, 14, 7, 0.6)',
					'rgba(4, 158, 2, 0.6)',
                    'rgba(211, 214, 15, 0.6)',
                    'rgba(214, 91, 15, 0.6)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(35, 15, 214, 1)',
                    'rgba(154, 214, 15, 1)',
					'rgba(212, 66, 245, 1)',
					'rgba(222, 14, 7, 1)',
					'rgba(4, 158, 2, 1)',
                    'rgba(211, 214, 15, 1)',
					'rgba(214, 91, 15, 1)'
					],
					label: 'Total pasien sembuh'
				},
                {
					data:<?php echo json_encode($sembuh_baru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(35, 15, 214, 0.6)',
                    'rgba(154, 214, 15, 0.6)',
					'rgba(212, 66, 245, 0.6)',
					'rgba(222, 14, 7, 0.6)',
					'rgba(4, 158, 2, 0.6)',
                    'rgba(211, 214, 15, 0.6)',
                    'rgba(214, 91, 15, 0.6)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(35, 15, 214, 1)',
                    'rgba(154, 214, 15, 1)',
					'rgba(212, 66, 245, 1)',
					'rgba(222, 14, 7, 1)',
					'rgba(4, 158, 2, 1)',
                    'rgba(211, 214, 15, 1)',
					'rgba(214, 91, 15, 1)'
					],
					label: 'Pasien baru sembuh'
				}
            ],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>