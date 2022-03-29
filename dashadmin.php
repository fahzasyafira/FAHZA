<!DOCTYPE html>
<html>
<head>
	<title>Grafik User</title>
	<script type="text/javascript" src="chartjs/chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<center>
		<h2>Grafik User</h2>
	</center>
 
 
	<?php 
	include 'koneksihp.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>No HP</th>
				<th>Jenis Kelamin</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($conn,"select * from pengguna");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['username']; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['email']; ?></td>
					<td><?php echo $d['nohp']; ?></td>
					<td align="center" bgcolor="green"><?php echo $d['jeniskelamin']; ?></td>
					<td><?php echo $d['jeniskelamin']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki-laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($conn,"select * from pengguna where jeniskelamin='L'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($koneksi,"select * from pengguna where jeniskelamin='P'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
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