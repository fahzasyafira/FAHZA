<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			/* $id_umkm			= $_POST['id_umkm']; */
			$nama	    		= $_POST['nama'];
			$username	    	= $_POST['username'];
			$address		    = $_POST['address'];
			$telepon 			= $_POST['telepon'];
			$nama_toko		    = $_POST['nama_toko'];
			$tanggal_bergabung	= $_POST['tanggal_bergabung'];
			$gender				= $_POST['gender'];

			$cek = mysqli_query($koneksi, "SELECT * FROM data_umkm WHERE id_umkm='$id_umkm'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data_umkm( nama, username, address, telepon, nama_toko, tanggal_bergabung, gender) VALUES( '$nama', '$username', '$address', '$telepon','$nama_toko', '$tanggal_bergabung', '$gender')")  or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=data_umkm";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambah.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $_POST['nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="username" class="form-control" value="<?php echo $_POST['username']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_toko" class="form-control" value="<?php echo $_POST['nama_toko']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" value="<?php echo $_POST['address']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telepon" class="form-control" size="4" value="<?php echo $_POST['telepon']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Laki-Laki" <?php if($_POST['gender'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender"  value="Perempuan" <?php if($_POST['gender'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Bergabung</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_bergabung" class="form-control" size="4" value="<?php echo $_POST['tanggal_bergabung']; ?>" required>
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
