<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Edit Data</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_reseller'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_reseller = $_GET['id_reseller'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM data_reseller WHERE id_reseller='$id_reseller'") or die(mysqli_error($koneksi));

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
			$nama		    	= $_POST['nama'];
			$username	    	= $_POST['username'];
			$email 			    = $_POST['email'];
			$password			= $_POST['password'];
			$address 			= $_POST['address'];
			$phone				= $_POST['phone'];
			$gender				= $_POST['gender'];
			$tanggal_lahir		= $_POST['tanggal_lahir'];
			
			$sql = mysqli_query($koneksi, "UPDATE data_reseller SET nama='$nama',username='$username',email='$email',password='$password', address='$address',  phone='$phone' ,gender='$gender' , tanggal_lahir='$tanggal_lahir' WHERE id_reseller='$id_reseller'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=data_reseller";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="editr.php?id_reseller=<?php echo $id_reseller; ?>" method="post">
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" size="4" value="<?php echo $data['address']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telepon</label>
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
