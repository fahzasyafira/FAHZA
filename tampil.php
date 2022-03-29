<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA UMKM</font></center>
		<hr>
		<a href="index.php?page=tambah_umkm"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                    <th>NO.</th>
					<th>NAMA </th>
					<th>USERNAME </th>
					<th>NAMA TOKO</th>
					<th>ALAMAT</th>
					<th>NOMOR TELEPON</th>
					<th>GENDER </th>
                    <th>TANGGAL BERGABUNG</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM data_umkm ORDER BY id_umkm DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['nama_toko'].'</td>
                            <td>'.$data['address'].'</td>
                            <td>'.$data['telepon'].'</td>
							<td>'.$data['gender'].'</td>
							<td>'.$data['tanggal_bergabung'].'</td>
                            
							<td>
								<a href="index.php?page=edit_umkm&id_umkm='.$data['id_umkm'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id_umkm='.$data['id_umkm'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
