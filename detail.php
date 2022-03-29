<?php
//memasukkan file config.php
include('config.php');
?>



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
                                <th>NAMA PRODUK</th>
                                <th>FOTO</th>
                                <th>AKSI </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                            $sql = "SELECT * FROM transaksi JOIN pembayaran ON transaksi.id_transaksi=pembayaran.id_transaksi JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk=produk.id_produk WHERE status='dikonfirmasi'";
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
                                    <td><?php echo $data['nama_produk']; ?>  </td>
                                    <td><img src="assets/image/product/<?php  echo $data['image_source']; ?>" >  </td>
                                    <td>
                                        <a href="index.php?page=transaksi&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin ke halaman transaksi?');">kembali</a>
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
