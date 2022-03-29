<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Verifikasi</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_daftar'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_daftar = $_GET['id_daftar'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM approve_umkm WHERE id_daftar='$id_daftar'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
            $id_daftar			= $_POST['id_daftar'];
			$id_umkm			= $_POST['id_umkm'];
			$nama	    		= $_POST['nama'];
			$tanggal_bergabung	= $_POST['tanggal_bergabung'];

			$sql = mysqli_query($koneksi, "UPDATE approve_umkm SET id_daftar='$id_daftar', id_umkm='$id_umkm',nama='$nama',tanggal_bergabung='$tanggal_bergabung' WHERE id_daftar='$id_daftar'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=approve_umkm";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit.php?id_umkm=<?php echo $id_umkm; ?>" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Id Daftar </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_daftar" class="form-control"  value="<?php echo $data['id_daftar']; ?>"  required>
				</div>	
            </div>	
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Id Umkm </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_umkm" class="form-control"  value="<?php echo $data['id_umkm']; ?>"  required>
				</div>	
            </div>	
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tangggal Bergabung</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tanggal_bergabung" class="form-control" size="4" value="<?php echo $data['tanggal_bergabung']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=approve_umkm" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
