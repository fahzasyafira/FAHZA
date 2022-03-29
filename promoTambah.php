<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			/* $id_promo		= $_POST['id_promo']; */
            $id_produk	    	= $_POST['id_produk'];
            $nm_produk	    	= $_POST['nama_produk'];
            $diskon	    	    = $_POST['diskon'];
            $acara	    	    = $_POST['acara'];

			$cek = mysqli_query($koneksi, "SELECT * FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO promo(id_produk, nama_produk, diskon, acara ) VALUES( '$id_produk','$nm_produk', '$diskon', '$acara')")  or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Promo";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="promoTambah.php" method="post">
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> ID PRODUK</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_produk" class="form-control" value="<?php echo $data['id_produk']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> NAMA PRODUK</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DISKON</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="diskon" class="form-control" value="<?php echo $data['diskon']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ACARA</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="acara" class="form-control" value="<?php echo $data['acara']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=Promo" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
