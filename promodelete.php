<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id_promo'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_promo = $_GET['id_promo'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=Promo";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=Promo";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=Promo";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=Promo";</script>';
}

?>