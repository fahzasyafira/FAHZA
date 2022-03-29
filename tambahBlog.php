<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			/* $id_blog		= $_POST['id_blog']; */
            $judul	    		= $_POST['judul'];
			$deskripsi	    	= $_POST['deskripsi'];
			$katakunci	    	= $_POST['katakunci'];
			$foto	    	    = $_POST['foto'];
			$status_blog 		= $_POST['status_blog'];

			$cek = mysqli_query($koneksi, "SELECT * FROM blog WHERE id_blog='$id_blog'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO blog( judul,deskripsi,katakunci,foto,status_blog) VALUES( '$judul','$deskripsi', '$katakunci', '$foto', '$status_blog')")  or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=Blogger";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambahBlog.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" value="<?php echo $_POST['judul']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi </label>
				<div class="col-md-6 col-sm-6">
					<textarea name="deskripsi" class="form-control" value="<?php echo $_POST['deskripsi']; ?>" ></textarea>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kata Kunci </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="katakunci" class="form-control" value="<?php echo $_POST['katakunci']; ?>" >
				</div>
			</div>
			<div class="mb-3">
				<label for="formFile" class="form-label">Upload Foto</label>
				<input class="form-control" type="file" name='foto'>
            </div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<textarea name="status_blog" class="form-control" value="<?php echo $_POST['status_blog']; ?>" ></textarea>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=Blogger" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
