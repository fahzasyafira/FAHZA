<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA RESELLER</font></center>
		<hr>
		<a href="indexr.php?page=tambah_reseller"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NAMA </th>
					<th>USERNAME </th>
					<th>EMAIL</th>
					<th>PASSWORD</th>
					<th>ADDRESS</th>
                    <th>PHONE</th>
                    <th>GENDER</th>
					<th>TANGGAL LAHIR</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM data_reseller ORDER BY id_reseller DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['username'].'</td>
							<td>'.$data['email'].'</td>
							<td>'.$data['password'].'</td>
							<td>'.$data['address'].'</td>
							<td>'.$data['phone'].'</td>
							<td>'.$data['gender'].'</td>
							<td>'.$data['tanggal_lahir'].'</td>
							<td>
								<a href="index.php?page=edit_reseller&id_reseller='.$data['id_reseller'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deleter.php?id_reseller='.$data['id_reseller'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>
