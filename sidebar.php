<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <i class="fas fa-store-alt"></i>
    <div class="sidebar-brand-text mx-3">
        <?php
        session_start();
        if(!isset($_SESSION['username']) and $_SESSION['id_access']!= 2){
            header("location: login.php");
        }else{
            echo $_SESSION['nama_toko'];
        }
        ?>
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-archive"></i>
        <span>Produk</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="daftar produk.php">Daftar Produk</a>
            <a class="collapse-item" href="tambah produk.php">Tambah Produk</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-clipboard-list"></i>
        <span>Pesanan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="pesananmasuk.php">Pesanan Masuk</a>
            <a class="collapse-item" href="siap kirim.php">Dalam Pengemasan</a>
            <a class="collapse-item" href="dalam kirim.php">Pesanan Dalam Pengiriman</a>
            <a class="collapse-item" href="selesai.php">Pesanan Selesai</a>
            <a class="collapse-item" href="batal.php">Pesanan Dibatalkan</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


</ul>
<!-- End of Sidebar -->