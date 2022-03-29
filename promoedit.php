<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Edit Data</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_promo'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_promo = $_GET['id_promo'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($koneksi));
			
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
            $id_produk	    	= $_POST['id_produk'];
            $nm_produk	    	= $_POST['nama_produk'];
            $diskon	    	    = $_POST['diskon'];
            $acara	    	    = $_POST['acara'];

			$sql = mysqli_query($koneksi, "UPDATE promo SET id_produk='$id_produk', nama_produk='$nm_produk', diskon='$diskon', acara='$acara' WHERE id_promo='$id_promo'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=Promo";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="promoedit.php?id_promo=<?php echo $id_promo; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> ID PRODUK</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_produk" class="form-control" value="<?php echo $data['id_produk']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA PRODUK</label>
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
