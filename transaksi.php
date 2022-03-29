<?php
//memasukkan file config.php
include('config.php');
?>


<?php

//mengenalkan variabel teks
$SqlPeriode = "";
$awaltgl = "";
$akhirtgl = "";
$tglawal = "";
$tglakhir = "";

if(isset($_POST['btnTampil'])) {
    $tglawal = isset($_POST['txtTglAwal']) ? $_POST ['txtTglAwal'] :  date ('Y-m-d');
    $tglakhir = isset($_POST['txtTglAkhir']) ? $_POST ['txtTglAkhir'] : date ('Y-m-d');
    //$tglawal = date_create($tglawal); //
    //$tglakhir = date_create($tgl); //
    $SqlPeriod = " where tanggal_pemesanan BETWEEN '".$tglawal."' AND '".$tglakhir."'";
    
}
?>

    <div class="container-fluid">
            <h3 class="text-dark mb-4">DATA PEMESANAN</h3>
            <h4>Periode Tanggal <b><?php echo ($tglawal); ?></b> s/d <b><?php echo ($tglakhir); ?></b></h4>
            <div class="card shadow">
                <div class= "card-header py-3">

                </div>
                <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self">
                
                        <div class="row">
                        <div class ="col-lg-3">
                                <input name="txttglawal" type="date" class="form-control" min = "2021-01-01" max="2025-12-31" value="" <?php echo $awaltgl; ?>" size="10" />
                            </div>
                            <div class="col-log-3">
                                <input name="txttglakhir" type="date" class="form-control" value=""<?php echo $akhirtgl; ?>" size="10" />
                            </div>

                            <div class="col-lg-3">
                                <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
                            </div>
                        </div>
            
                </form>

                            <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>ID RESELLER</th>
                                        <th>NAMA JASPIN</th>
                                        <th>ID TRANSAKSI</th>
                                        <th>TANGGAL PEMBAYARAN</th>
                                        <th>TANGGAL PEMESANAN</th>
                                        <th>ALAMAT PENGIRIMAN</th>
                                        <th>JUMLAH PRODUK </th>
                                        <th>TOTAL </th>
                                        <th>BUKTI PEMBAYARAN</th>
                                        <th>AKSI </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                    $sql = "SELECT * FROM transaksi JOIN pembayaran ON transaksi.id_transaksi=pembayaran.id_transaksi WHERE status='dikonfirmasi'";
                                    $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                    //membuat variabel $no untuk menyimpan nomor urut
                                    $no = 1;
                                    //melakukan perulangan while dengan dari dari query $sql
                                    while ($data = mysqli_fetch_assoc($hasil)) : ?>

                                        <tr>
                                            <td><?php echo $no; ?> </td>
                                            <td><?php echo $data['id_reseller']; ?> </td>
                                            <td><?php echo $data['perusahaan']; ?>  </td>
                                            <td><?php echo $data['id_transaksi']; ?>  </td>
                                            <td><?php echo $data['tanggal']; ?>  </td>
                                            <td><?php echo $data['tanggal_pemesanan']; ?>  </td>
                                            <td><?php echo $data['alamat_pengiriman']; ?>  </td>
                                            <td><?php echo $data['jumlah']; ?>  </td>
                                            <td><?php echo $data['total']; ?>  </td>
                                            <td><img src="image/reseller/bukti/<?php  echo $data['bukti']; ?>" >  </td>
                                            
                                            <td>
                                                <a href="index.php?page=transterim&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin untuk konfirmasi?');">konfirmasi</a>
                                                <a href="index.php?page=transkirim&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin untuk menolak?');">ditolak</a>
                                                <a href="index.php?page=detail&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('melihat detail barang?');">detail</a>
                                            </td>
                                                
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endwhile;   
                                    
                                    ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
