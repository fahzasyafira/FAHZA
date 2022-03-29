<?php
//memasukkan file config.php
include('config.php');

$iddaftar = $_GET["id"];
$status = $_GET["status"];
$sql = "UPDATE pending_umkm SET status='".$status."' WHERE id_daftar='".$iddaftar."'";
mysqli_query($koneksi,$sql);

?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">RIWAYAT</font></center>
		<hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                <th>NO.</th>
                <th>JUDUL </th>
                <th>DISKRIPSI </th>
                <th>KATA KUNCI </th>
                <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM blog WHERE status = 1  ORDER BY id_blog DESC") or die(mysqli_error($koneksi));
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
                        <td>'.$data['judul'].'</td>
                        <td>'.$data['deskripsi'].'</td>
                        <td>'.$data['katakunci'].'</td>
                            
							<td>
							<a href=index.php?page=Blogger&id='.$data['id_blog'].'&status=1" class="btn btn-info">Tampil</a>
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
