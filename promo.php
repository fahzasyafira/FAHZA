<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA PROMO</font></center>
		<hr>
		<a href="index.php?page=TambahPromo"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                    <th>NO.</th>
                    <th>ID PRODUK </th>
					<th>NAMA  PRODUK </th>
					<th>DISKON</th>
                    <th>ACARA</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM promo ORDER BY id_promo DESC") or die(mysqli_error($koneksi));
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
                            <td>'.$data['id_produk'].'</td>
							<td>'.$data['nama_produk'].'</td>
							<td>'.$data['diskon'].'</td>
                            <td>'.$data['acara'].'</td>

                            <td>
								<a href=index.php?page=editPromo&id_promo='.$data['id_promo'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href=index.php?page=deletePromo&id_promo='.$data['id_promo'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
