<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			/*$id_reseller		= $_POST['id_reseller'];*/
			$nama		    	= $_POST['nama'];
			$username	    	= $_POST['username'];
			$email 			    = $_POST['email'];
			$password			= $_POST['password'];
			$address 			= $_POST['address'];
			$phone				= $_POST['phone'];
			$gender				= $_POST['gender'];
			$tanggal_lahir		= $_POST['tanggal_lahir'];

			$cek = mysqli_query($koneksi, "SELECT * FROM data_reseller WHERE id_reseller='$id_reseller'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data_reseller(nama, username, email, password, address, phone, gender,tanggal_lahir) VALUES('$nama', '$username', '$email', '$password', '$address','$phone','$gender','$tanggal_lahir')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=data_reseller";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambahr.php" method="post">
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" size="4" value="<?php echo $data['address']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="phone" class="form-control" size="4" value="<?php echo $data['phone']; ?>" required>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_lahir" class="form-control" size="4" value="<?php echo $data['tanggal_lahir']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=data_reseller" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
