<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header.php';
    ?>
</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'sidebar.php'?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Dalam Pengiriman</h4>
                        <!-- form filter data berdasarkan range tanggal  -->
                        <form action="" method="GET">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">Periode</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="dari" required>
                                </div>
                                <div class="col-auto">
                                    -
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="ke" required>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                                </div>
                            </div>
                        </form>
                        
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" style = "table-layout: fixed" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Produk</th>
                                            <th>Gambar Produk</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Alamat Pengiriman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    //untuk tampil tanggal
                                    include 'configT.php'; 
                                    if(isset($_GET['dari']) && isset($_GET['ke'])){
                                        $dari = $_GET['dari'];
                                        $ke = $_GET['ke'];
                                        $sql = "SELECT transaksi.tanggal_pemesanan,transaksi.id_transaksi,transaksi.jumlah_produk,transaksi.alamat_pengiriman,transaksi.total,
                                        produk.nama_produk,produk.image_source 
                                        FROM transaksi
                                        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
                                        JOIN produk ON produk.id_produk = detail_transaksi.id_produk
                                        WHERE tanggal_pemesanan BETWEEN '$dari' and '$ke' and transaksi.status = 'dalam pengiriman' and produk.id_umkm='".$_SESSION['id_umkm']."'" ;

                                    }else{
                                        $sql = "SELECT transaksi.tanggal_pemesanan,transaksi.id_transaksi,transaksi.jumlah_produk,transaksi.alamat_pengiriman,transaksi.total,
                                        produk.nama_produk,produk.image_source 
                                        FROM transaksi
                                        JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
                                        JOIN produk ON produk.id_produk = detail_transaksi.id_produk
                                        WHERE transaksi.status = 'dalam pengiriman'  and produk.id_umkm='".$_SESSION['id_umkm']."'" ;}



                                    if(isset($_GET['id_transaksi'])){
                                    $update = mysqli_query ($conn, "UPDATE transaksi set status = 'dalam pengiriman' where id_transaksi='".$_GET['id_transaksi']."'") or die(mysqli_error($conn));}
                                   
                                   
                                    
                                   
                                    $no = "1";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){?>
                                        <tr>
                                            <td><?php echo $no; ?> </td>
                                            <td><?php echo $row['tanggal_pemesanan']; ?></td>
                                            <td><?php echo $row['id_transaksi']; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td align = "center"><img src="image/produk/<?php echo $row['image_source']; ?>"width="120px"></td>
                                            <td><?php echo $row['jumlah_produk']; ?></td>
                                            <td><?php echo $row['total']; ?></td>
                                            <td><?php echo $row['alamat_pengiriman']; ?></td>
                                            <td>
                                                 <a href="selesai.php?id_transaksi=<?php echo $row['id_transaksi']?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin sudah menyelesaikan pesanan?');">Selesai</a>
                                            </td>
                                            </tr>
                                        <?php $no++;}
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>

</html>