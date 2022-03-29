<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_reseller	    = $_POST['id_reseller'];
			$id_produk	    	= $_POST['id_produk'];
			$tanggal	        = $_POST['tanggal'];
			$isi				= $_POST['isi'];

			$cek = mysqli_query($koneksi, "SELECT * FROM comment WHERE id_comment='$id_comment'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO comment( id_reseller, id_produk, tanggal, isi) VALUES( '$id_reseller', '$id_produk',  '$tanggal', '$isi')")  or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=comment";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="komentarTbh.php?id_comment =<?php echo $id_comment ; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id reseller</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_reseller" class="form-control" value="<?php echo $data['id_reseller']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id produk</label>
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

