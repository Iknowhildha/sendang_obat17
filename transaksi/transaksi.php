<?php
//print_r($_SESSION);
$total_bayar = 0;
$qty = 0;
if(isset($_SESSION['keranjang'])){
  foreach ($_SESSION['keranjang'] as $key => $value){
        $total_bayar += $value['harga_jual']*$value['qty'];
        $qty += $value['qty'];
  }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-6">
        <a href="index.php?page=riwayattransaksi" class="btn btn-info"><i class="fa fa-history"></i> Riwayat
            Transaksi</a><br><br>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <!-- general form elements -->
        <div class="card card-primary">
            <!-- form start -->
            <form action="index.php?page=keranjang" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_obat">Kode Obat</label>
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#modal-default">Add</button>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" name="id_obat" id="id_obat" placeholder="kode barang"
                                class="form-control active" autofocus value="<?php echo $_GET['id_obat'] ?>" required>
                            <input type="hidden" name="idstok" value="<?php echo $_GET['id_stok'] ?>">
                            <input type="hidden" name="stok" id="stok" value="<?php echo $_GET['stok'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukan Qty"
                            value="1">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="simpan" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Tambah</button>
                    </div>
            </form>
            <div class="form-group row">
                <label for="tanggal">Tanggal</label>
                <?php $tanggal = date('Y-m-d') ?>
                <input type="date" class="form-control" id="tanggal" placeholder="Tanggal"
                    value="<?php echo $tanggal ?>" readonly>
            </div>
            <div class="form-group row">
                <label for="kasir">Kasir</label>
                <input type="text" class="form-control" id="kasir" name="kasir" placeholder="Kasir"
                    value="<?php echo $_SESSION['nama'] ?>" readonly>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $query = mysqli_query($koneksi, "SELECT obat.id_obat, obat.nama_obat, kategori.nama_kategori, stok.stok_sekarang, stok.harga_jual, stok.satuan, stok.id_stok
                                FROM stok, obat, kategori
                                WHERE stok.id_obat = obat.id_obat
                                AND obat.id_kategori = kategori.id_kategori");
                                $jumlah = mysqli_num_rows($query);
                                while ($data = mysqli_fetch_array($query)){
                            ?>
                        <tr>
                            <td><span class="badge badge-primary"><?php echo $data['id_obat'] ?></span></td>
                            <td><?php echo $data['nama_obat'] ?></td>
                            <td>Rp.<?php echo number_format($data['harga_jual']) ?>,-</td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                            <td><?php echo $data['stok_sekarang'] ?></td>
                            <td>
                                <a href="index.php?page=transaksi&id_obat=<?php echo $data['id_obat'];?>&id_stok=<?php echo $data['id_stok'] ?>&stok=<?php echo $data['stok_sekarang'] ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-check"></i> Pilih</a>
                            </td>
                        </tr>

                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<div class="col-md-9">
    <div class="card card-info">
        <div class="card-header with-border">
            <h3 class="card-title"><i class="fa fa-shopping-cart"></i> Keranjang</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <form action="index.php?page=updateqty" method="post">
            
                <table class="table table-bordered">
                    <tr>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($_SESSION['keranjang'] as $key => $value){?>
                    <tr>
                        <td><span class="badge badge-primary" style="font-size:13px"><?=$value['id_obat']?></span></td>
                        <td><?= substr($value['nama_obat'],0,13)?>..</td>
                        <td>Rp. <?=number_format($value['harga_jual']) ?></td>
                        <td><span class="badge badge-warning"><?=$value['satuan'] ?></span></td>
                        <td width="100px"><input type="number" class="form-control" name="qty[]"
                                value="<?=$value['qty']?>"></td>
                                <input type="hidden" name="idstok" id="idstok" value="<?= $value['idstok'] ?>">
                        <td>Rp. <?=number_format($value['qty']*$value['harga_jual'])?></td>
                        <td>
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i></button>
                            <a href="index.php?page=hapuskeranjang&id_obat=<?=$value['id_obat']?>"
                                class="btn btn-danger"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="row">

    <div class="col-lg-7">
    <!-- Horizontal Form -->
    <div class="card card-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form action="index.php?page=prosesbayar" method="post" class="form-horizontal">
            <div class="card-body">
                <div class="form-group">
                    <div class="col-sm-9">
                        <h4 style=" font-weight: bold;">Jumlah Item : <?php echo $qty ?> Obat</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label for="totalbayar" class="col-sm-3 control-label">Total Bayar</label>
                    <div class="col-sm-12">
                        <input type="text" readonly style="font-size:20px; font-weight: bold;" name="totalbayar"
                            value="Rp.<?php echo number_format($total_bayar) ?>" class="form-control">
                        <input type="hidden" readonly style="font-size:20px; font-weight: bold;" value=""
                            class="form-control" id="totalbayar">
                    </div>
                </div>

                <input type="hidden" name="idkasir" value="<?php echo $_SESSION['id'] ?>">

                <div class="form-group">
                    <label for="bayar" class="col-sm-3 control-label">Bayar</label>
                    <div class="col-sm-12">
                        <input type="text" name="bayar" id="rupiahbayar" style="font-size:20px; font-weight: bold;"
                            class="form-control" placeholder="Masukan Jumlah Bayar" required>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
    </div>
    <!-- /.box -->
    </div>

    <div class="col-md-5">
    <br><br>
    <button type="submit" class="btn btn-success"><i class="fa fa-calculator"></i> Proses Pembayaran</button>
    <br><br>
    </form>
    <a href="" class="btn btn-warning"><i class="fa fa-times"></i> Batal</a>
    </div>




    
    </div>


    <!-- /.box -->


</div>

<script type="text/javascript">
		var rupiah1 = document.getElementById('rupiahbayar');
		rupiah1.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah1     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah1 += separator + ribuan.join('.');
			}
 
			rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
			return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
		}

	</script>
