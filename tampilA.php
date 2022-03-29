<?php
//memasukkan file config.php
include('config.php');

$iddaftar = $_GET["id"];
$status = $_GET["status"];
$sql = "UPDATE pending_umkm SET status='".$status."' WHERE id_daftar='".$iddaftar."'";
mysqli_query($koneksi,$sql);
?>




	<div class="container" style="margin-top:20px">
		<center><font size="6">DITERIMA</font></center>
		<hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                    <th>NO.</th>
                    <th>DAFTAR ID</th>
					<th>UMKM ID</th>
					<th>NAMA </th>
                    <th>TANGGAL BERGABUNG</th>
                    <th>STATUS</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM pending_umkm WHERE status = 2 ORDER BY id_daftar DESC") or die(mysqli_error($koneksi));
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
                            <td>'.$data['id_daftar'].'</td>
							<td>'.$data['id_umkm'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['tanggal_bergabung'].'</td>
                            
							<td>
								<a href="index.php?page=approve_umkm'.$data['id_daftar'].'" class="btn btn-success">Terima</a>
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
