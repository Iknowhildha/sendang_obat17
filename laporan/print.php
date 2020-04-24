<?php ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
<?php
include '../koneksi.php';
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
            echo '<b>Tanggal Print : '.date('d-m-Y').'</b><br /><br />';

            $query = "SELECT transaksi.tgl_transaksi, stok.profit, detail_transaksi.id_obat, obat.nama_obat, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
            JOIN obat ON detail_transaksi.id_obat = obat.id_obat
            JOIN stok ON detail_transaksi.id_stok = stok.id_stok WHERE DATE(tgl_transaksi)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<b>Tanggal Print : '.date('d-m-Y').'</b><br /><br />';

            $query = "SELECT transaksi.tgl_transaksi, stok.profit, detail_transaksi.id_obat, obat.nama_obat, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
            JOIN obat ON detail_transaksi.id_obat = obat.id_obat
            JOIN stok ON detail_transaksi.id_stok = stok.id_stok WHERE MONTH(tgl_transaksi)='".$_GET['bulan']."' AND YEAR(tgl_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
            echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<b>Tanggal Print : '.date('d-m-Y').'</b><br /><br />';
            $query = "SELECT transaksi.tgl_transaksi, stok.profit, detail_transaksi.id_obat, obat.nama_obat, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
            JOIN obat ON detail_transaksi.id_obat = obat.id_obat
            JOIN stok ON detail_transaksi.id_stok = stok.id_stok WHERE YEAR(tgl_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }else if($filter == '4'){
            
            $tgl_awal = date('d-m-y', strtotime($_GET['tawal']));
            $tgl_akhir = date('d-m-y', strtotime($_GET['takhir']));
            echo '<b>Data Transaksi Tanggal '.$tgl_awal.' Sampai '.$tgl_akhir.'</b><br /><br />';
            echo '<b>Tanggal Print : '.date('d-m-Y').'</b><br /><br />';

            $query = "SELECT transaksi.tgl_transaksi, stok.profit, detail_transaksi.id_obat, obat.nama_obat, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
            JOIN obat ON detail_transaksi.id_obat = obat.id_obat
            JOIN stok ON detail_transaksi.id_stok = stok.id_stok WHERE DATE(tgl_transaksi) BETWEEN '".$_GET['tawal']."' AND '".$_GET['takhir']."'";
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Transaksi</b><br /><br />';
        echo '<b>Tanggal Print : '.date('d-m-Y').'</b><br /><br />';
        
        $query = "SELECT transaksi.tgl_transaksi, stok.profit, detail_transaksi.id_obat, obat.nama_obat, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
        FROM detail_transaksi
        JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
        JOIN obat ON detail_transaksi.id_obat = obat.id_obat
        JOIN stok ON detail_transaksi.id_stok = stok.id_stok"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }

    ?>
	<table border="1" cellpadding="8">
	<tr>
            <th align="center">Tanggal</th>
              <th align="center">Kode</th>
              <th align="center">Nama</th>
              <th align="center">Harga</th>
              <th align="center">QTY</th>
              <th align="center" class="bg-primary">Sub Total</th>
              <th align="center" class="bg-primary">Profit</th>
	</tr>
    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Ubah format tanggal jadi dd-mm-yyyy
            $totall = $totall+$data['total'];
            $profit = $data['profit']*$data['qty'];
            $profitt = $profitt+$profit;
            $untung = $totall-$profitt;
            echo "<tr>";
            echo "<td width='75'>".$tgl."</td>";
            echo "<td width='75'>".$data['id_obat']."</td>";
            echo "<td>".$data['nama_obat']."</td>";
            echo "<td>Rp. ".number_format($data['harga'])."</td>";
            echo "<td width='50'>".$data['qty']."</td>";
            echo "<td class='bg-primary'>Rp.".number_format($data['total'])."</td>";
            echo "<td class='bg-primary'>Rp.".number_format($profit)."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
    }
    ?>
       <tfoot>
       <tr  class="bg-primary">
            <th colspan="5">Total Kotor</th>
              <th>Rp. <?php echo number_format($totall) ?></th>
              <th>Rp. <?php echo number_format($profitt) ?></th>
            </tr>
            <tr  class="bg-success">
            <th colspan="5">Total Bersih (uang modal)</th>
              <th>Sub Total - Profit</th>
              <th>Rp. <?php echo number_format($untung) ?></th>
            </tr>
     </tfoot>
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('../dist/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Transaksi.pdf', 'D');
?>
