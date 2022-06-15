<?php
include('koneksi.php');
$produk = mysqli_query($koneksi,"select * from penderitacovid_19");
while($row = mysqli_fetch_array($produk)){
	$negara[] = $row['Country'];
	
	$query = mysqli_query($koneksi,"select sum(Total_Recovered) as Total_Recovered from penderitacovid_19 where id='".$row['id']."'");
	$row = $query->fetch_array();
	$jumlah_sembuh[] = $row['Total_Recovered'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($negara); ?>,
				datasets: [{
					label: 'Grafik Total Case Covid-19',
					data: <?php echo json_encode($jumlah_sembuh); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>