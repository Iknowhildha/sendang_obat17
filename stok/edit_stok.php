<?php
$id_stok = $_GET['id_stok'];
$ambil=$koneksi->query("SELECT stok.*, obat.*
FROM stok, obat
WHERE stok.id_obat = obat.id_obat
AND stok.id_stok ='$id_stok'");
//print_r($_GET);
$data=$ambil->fetch_array(MYSQLI_ASSOC);
//print_r($data);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Stok</li>
                    <li class="breadcrumb-item active">Edit Stok</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Edit Data Stok</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="index.php?page=updatestok">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
<input type="hidden" name="id_stok" value="<?php echo $id_stok ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="namaobat">Nama Obat</label>
                                        <select class="form-control" id="id_obat" name="id_obat">
                                            <option value="">-Pilih Obat-</option>
                                            <?php 
                                                $paket = mysqli_query($koneksi,"select * from obat");
                                                while($p = mysqli_fetch_array($paket)){
                                                    ?>
                                                    <option <?php if($data['id_obat'] == $p['id_obat']){echo "selected='selected'";} ?>value="<?php echo $p['id_obat']; ?>"><?php echo $p['nama_obat']; ?></option>
                                                     <?php 
                                                        } 
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="stok_masuk">Stok Masuk</label>
                                        <input type="number" class="form-control" id="stok_masuk" name="stok_masuk"
                                            value="<?php echo $data['stok_masuk'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="stok_sekarang">Stok Sekarang</label>
                                        <input type="number" class="form-control" id="stok_sekarang"
                                            name="stok_sekarang" value="<?php echo $data['stok_sekarang'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <select class="form-control select2" id="satuan" name="satuan"
                                            style="width: 100%;">
                                            <option value="strip"
                                                <?php $data['satuan'] == 'strip' ? print "selected" : ""; ?>>Strip
                                            </option>
                                            <option value="Botol"
                                                <?php $data['satuan'] == 'Botol' ? print "selected" : ""; ?>>Botol
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga_beli">Harga Beli</label>
                                        <input type="text" class="form-control inputanangka" id="harga_beli" name="harga_beli"
                                            value="<?php echo number_format($data['harga_beli']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga_jual">Harga Jual</label>
                                        <input type="text" class="form-control inputanangka" id="harga_jual" name="harga_jual"
                                            value="<?php echo number_format($data['harga_jual']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="profit">Profit</label>
                                        <input type="text" readonly class="form-control inputanangka" id="profit" name="profit"
                                            value="<?php echo number_format($data['profit']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tgl_masuk">Tanggal Masuk</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control float-right" id="tgl_masuk"
                                                name="tgl_masuk" value="<?php echo $data['tgl_masuk'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control float-right" id="tgl_kadaluarsa"
                                                name="tgl_kadaluarsa" value="<?php echo $data['tgl_kadaluarsa'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-success pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
// memformat angka ribuan
function formatRibuan(angka) {
    if (typeof(angka) != 'string') angka = angka.toString();
    var reg = new RegExp('([0-9]+)([0-9]{3})');
    while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
    return angka;
}
$('.inputanangka').on('keypress', function (e) {
            var c = e.keyCode || e.charCode;
            switch (c) {
                case 8:
                case 9:
                case 27:
                case 13:
                    return;
                case 65:
                    if (e.ctrlKey === true) return;
            }
            if (c < 48 || c > 57) e.preventDefault();
        }).on('keyup', function () {
            //alert('disini');
            var inp = $(this).val().replace(/\./g, '');
            $(this).val(formatRibuan(inp));

        });

        function intVal(i) {
    return typeof i === 'string' ?
    i.replace(/[\$,.]/g, '') * 1 :
        typeof i === 'number' ?
            i : 0;
};

        $(document).ready(function () {
        $("#harga_beli,#harga_jual").keyup(function () {
            var bl = intVal($("#harga_beli").val());
            var jl = intVal($("#harga_jual").val());
            var total = jl - bl;
            $("#profit").val(formatRibuan(total));
        });
    });
</script>