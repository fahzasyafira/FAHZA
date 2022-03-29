<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Edit Data</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_umkm'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_umkm = $_GET['id_umkm'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM data_umkm WHERE id_umkm='$id_umkm'") or die(mysqli_error($koneksi));
			
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
			$nama	    		= $_POST['nama'];
			$username	    	= $_POST['username'];
			$nama_toko		    = $_POST['nama_toko'];
			$address			= $_POST['address'];
			$telepon 			= $_POST['telepon'];
			$gender				= $_POST['gender'];
			$tanggal_bergabung	= $_POST['tanggal_bergabung'];

			$sql = mysqli_query($koneksi, "UPDATE data_umkm SET  nama='$nama',username='$username',nama_toko='$nama_toko',  address='$address' ,telepon='$telepon' , gender='$gender',tanggal_bergabung='$tanggal_bergabung' WHERE id_umkm='$id_umkm'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=data_umkm";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit.php?id_umkm=<?php echo $id_umkm; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_toko" class="form-control" value="<?php echo $data['nama_toko']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telepon" class="form-control" size="4" value="<?php echo $data['telepon']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Laki-Laki" <?php if($data['gender'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender"  value="Perempuan" <?php if($data['gender'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tangggal Bergabung</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_bergabung" class="form-control" size="4" value="<?php echo $data['tanggal_bergabung']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=data_umkm" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
