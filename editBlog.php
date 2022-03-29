<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<h2>Edit Data</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_blog'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_blog = $_GET['id_blog'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM blog WHERE id_blog='$id_blog'") or die(mysqli_error($koneksi));
			
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
            $judul	    	   = $_POST['judul'];
            $deskripsi	    	= $_POST['deskripsi'];
            $katakunci	    	    = $_POST['katakunci'];
			$foto	    	    = $_POST['foto'];

			$sql = mysqli_query($koneksi, "UPDATE blog SET judul='$judul', deskripsi='$deskripsi', katakunci='$katakunci',  foto='$foto' WHERE id_blog='$id_blog'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=Blogger";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="editBlog.php?id_blog=<?php echo $id_blog; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">judul</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">deskripsi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">kata kunci</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="katakunci" class="form-control" value="<?php echo $data['katakunci']; ?>" required>
				</div>
			</div>
			<div class="mb-3">
				<label for="formFile" class="form-label">Upload Foto</label>
				<input class="form-control" type="file" name='foto'value="<?php echo $data['foto']; ?>" required>
            </div> name='foto'>
            </div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=Blogger" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
