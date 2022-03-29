<?php
//memasukkan file config.php
include('config.php');
if(isset($_POST['Konfirmasi'])){
    $idtransaksi  = $_GET["id"];
    $sql = mysqli_query($koneksi, "UPDATE transaksi SET  status= 'terkonfirmasi' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($koneksi));
}
// echo "<script>alert('pebelian sukses');</script>";
// echo "<script>location='transaksi.php';</script>";
echo $sql;
?>


