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
                          <li class="breadcrumb-item active">Tambah Stok</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Stok</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="index.php?page=prosesstok">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Obat</label>
                                <select class="form-control select2" id="nama_obat" name="id_obat" style="width: 100%;">
                            <option value="">-- Pilih Obat --</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC");?>
                            <?php while($data = $ambil->fetch_assoc()){?>
                            <option value="<?php echo $data['id_obat']; ?>"><?php echo $data['nama_obat']; ?></option>
                            <?php } ?>             
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="stok_masuk">Stok Masuk</label>
                                        <input type="number" class="form-control" id="stok_masuk" name="stok_masuk" placeholder="Stok Masuk">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="stok_sekarang">Stok Sekarang</label>
                                        <input type="number" class="form-control" id="stok_sekarang" name="stok_sekarang" placeholder="Stok Sekarang">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <select class="form-control select2" id="satuan" name="satuan" style="width: 100%;">
                                            <option selected="selected">Strip</option>
                                            <option>Botol</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga_beli">Harga Beli</label>
                                        <input type="text" class="form-control inputanangka" id="harga_beli" name="harga_beli" placeholder="Rp.">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga_jual">Harga Jual</label>
                                        <input type="text" class="form-control inputanangka" id="harga_jual" name="harga_jual" placeholder="Rp.">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="profit">Profit</label>
                                        <input type="text" readonly class="form-control inputanangka" id="profit" name="profit" placeholder="Rp." 
                                        >
                                            
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
                                    <input type="date" class="form-control float-right" id="tgl_masuk" name="tgl_masuk" value="<?=date('Y-m-d')?>">
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
                                    <input type="date" class="form-control float-right" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary float-sm-right"><i class="fa fa-save"></i> Submit</button>
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