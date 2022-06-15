<?php
    include('koneksi.php');
    $sql = mysqli_query($koneksi,"select * from penderitacovid_19");
    while($row = mysqli_fetch_array($sql)){
        $negara[] = $row['Country'];
        
        $query = mysqli_query($koneksi,"select New_cases as New_cases, sum(Total_death) as Total_death, New_death as New_death, sum(Total_Recovered) as Total_Recovered, New_recovered as New_recovered from penderitacovid_19 where id='".$row['id']."'");
        $row = $query->fetch_array();

        $kasus_baru[] = $row['New_cases'];
        $jumlah_mati[] = $row['Total_death'];
        $mati_baru[] = $row['New_death'];
        $jumlah_sembuh[] = $row['Total_Recovered'];
        $sembuh_baru[] = $row['New_recovered'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 1000px;height: 1000px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($negara); ?>,
				datasets: [
					{
					label: 'Kasus baru covid-19',
					data: <?php echo json_encode($kasus_baru); ?>,
					backgroundColor: 'rgba(240, 252, 3, 0.2)',
					borderColor:'rgba(240, 252, 3,1)',
					borderWidth: 1
				},
				{
					label: 'Total kasus kematian covid-19',
					data: <?php echo json_encode($jumlah_mati); ?>,
					backgroundColor: 'rgba(252, 3, 3, 0.2)',
					borderColor:'rgba(252, 3, 3,1)',
					borderWidth: 1
				},
				{
					label: 'Kasus kematian baru Covid-19',
					data: <?php echo json_encode($mati_baru); ?>,
					backgroundColor: 'rgba(245, 49, 209, 0.2)',
					borderColor:'rgba(245, 49, 209,1)',
					borderWidth: 1
				},
				{
					label: 'Total pasien sembuh',
					data: <?php echo json_encode($jumlah_sembuh); ?>,
					backgroundColor: 'rgba(7, 252, 3, 0.2)',
					borderColor:'rgba(7, 252, 3,1)',
					borderWidth: 1
				},
				{
					label: 'Pasien baru sembuh',
					data: <?php echo json_encode($sembuh_baru); ?>,
					backgroundColor: 'rgba(3, 7, 252, 0.2)',
					borderColor:'rgba(3, 7, 252,1)',
					borderWidth: 1
				}
			]
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