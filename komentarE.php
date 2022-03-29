<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Edit Data</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_comment'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_comment = $_GET['id_comment'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM comment WHERE id_comment='$id_comment'") or die(mysqli_error($koneksi));
			
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
			$id_reseller	    = $_POST['id_reseller'];
			$id_produk	    	= $_POST['id_produk'];
			$tanggal		    = $_POST['tanggal'];
			$isi	            = $_POST['isi'];

			$sql = mysqli_query($koneksi, "UPDATE comment SET  id_reseller='$id_reseller', id_produk='$id_produk', tanggal='$tanggal' , isi='$isi' WHERE id_comment='$id_comment'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=comment";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="komentarE.php?id_comment=<?php echo $id_comment ; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id reseller</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_reseller" class="form-control" value="<?php echo $data['id_reseller']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> ID PRODUK</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_produk" class="form-control" value="<?php echo $data['id_produk']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tangggal </label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal" class="form-control" size="4" value="<?php echo $data['tanggal']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">isi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="isi" class="form-control" value="<?php echo $data['isi']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=comment" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
