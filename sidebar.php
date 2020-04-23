<?php if($_SESSION['level'] == 'Pegawai') {?> 
<li class="nav-item">
    <a href="index.php?page=obat" class="nav-link">
        <i class="nav-icon fa fa-medkit"></i>
        <p>
            Data Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=stok" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
            Stok Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=kategori" class="nav-link">
        <i class="nav-icon fa fa-bars"></i>
        <p>
            Kategori Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=transaksi" class="nav-link">
        <i class="nav-icon fa fa-shopping-cart"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=logout" class="nav-link">
        <i class="nav-icon fa fa-arrow-right"></i>
        <p>
            Logout
        </p>
    </a>
</li>
<?php }else{?>
    <li class="nav-item">
    <a href="index.php?page=obat" class="nav-link">
        <i class="nav-icon fa fa-medkit"></i>
        <p>
            Data Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=stok" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
            Stok Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=kategori" class="nav-link">
        <i class="nav-icon fa fa-bars"></i>
        <p>
            Kategori Obat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=transaksi" class="nav-link">
        <i class="nav-icon fa fa-shopping-cart"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=laporan" class="nav-link">
        <i class="nav-icon fa fa-file"></i>
        <p>
            Laporan
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=user" class="nav-link">
        <i class="nav-icon fa fa-user"></i>
        <p>
            Data User
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?page=logout" class="nav-link">
        <i class="nav-icon fa fa-arrow-right"></i>
        <p>
            Logout
        </p>
    </a>
</li>
<?php } ?>