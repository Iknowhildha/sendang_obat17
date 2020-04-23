<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		 //halaman home
		 switch ($page) {
			case 'dashboard':
				include "dashboard.php";
				break;
			}
		//mengelola obat
		switch ($page) {
			case 'obat':
				include "obat/list_obat.php";
				break;
			case 'tambahobat':
				include "obat/tambah_obat.php";
                break;
            case 'prosesobat':
				include "obat/proses_obat.php";
                break;
            case 'editobat':
				include "obat/edit_obat.php";
                break;
            case 'updateobat':
				include "obat/update_obat.php";
                break;
            case 'hapusobat':
				include "obat/hapus_obat.php";
                break;
                
        }
        //mengelola stok
        switch ($page) {
			case 'stok':
				include "stok/list_stok.php";
				break;
			case 'tambahstok':
				include "stok/tambah_stok.php";
				break;
			case 'prosesstok':
				include "stok/proses_stok.php";
				break;
            case 'editstok':
				include "stok/edit_stok.php";
                break;
            case 'updatestok':
				include "stok/update_stok.php";
                break;
                
        }  
        //mengelola kategori
        switch ($page) {
			case 'kategori':
				include "kategori/list_kategori.php";
				break;
			case 'tambahkategori':
				include "kategori/tambah_kategori.php";
                break;
            case 'proseskategori':
				include "kategori/proses_kategori.php";
                break;
            case 'editkategori':
				include "kategori/edit_kategori.php";
                break;
            case 'updatekategori':
				include "kategori/update_kategori.php";
                break;
            case 'hapuskategori':
				include "kategori/hapus_kategori.php";
				break;
        }
        //mengelola user
        switch ($page) {
			case 'user':
				include "user/list_user.php";
				break;
			case 'tambahuser':
				include "user/tambah_user.php";
                break;
            case 'prosesuser':
				include "user/proses_user.php";
                break;
            case 'edituser':
				include "user/edit_user.php";
                break;
            case 'updateuser':
				include "user/update_user.php";
                break;
            case 'hapususer':
				include "user/hapus_user.php";
				break;
        }
         //mengelola transaksi
         switch ($page) {
			case 'transaksi':
				include "transaksi/transaksi.php";
				break;
			case 'detailtransaksi':
				include "transaksi/detail_transaksi.php";
                break;
            case 'riwayattransaksi':
				include "transaksi/riwayat_transaksi.php";
				break;
			case 'keranjang':
				include "transaksi/keranjang.php";
				break;
			case 'hapuskeranjang':
				include "transaksi/hapus_keranjang.php";
				break;
			case 'updateqty':
				include "transaksi/update_qty.php";
				break;
			case 'uangkembali':
				include "transaksi/uang_kembali.php";
				break;
			case 'prosesbayar':
				include "transaksi/proses_bayar.php";
				break;
        }
        
        switch ($page) {
			case 'laporan':
				include "laporan/laporan.php";
                break;
            case 'tampil':
				include "laporan/tampil_laporan.php";
				break;
		}

		switch ($page) {
			case 'logout':
				include "logout.php";
                break;
		}

	}else{
		include "dashboard.php";
	}
 
?>