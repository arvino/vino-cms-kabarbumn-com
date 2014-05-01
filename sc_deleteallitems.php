<?php
session_name("CUST");
session_start();
include "sc_session.php";
include "kelas_function.php";

if($proses == 'delete'){
	
		array_splice($ID_PRODUK, 0);
		array_splice($JUDUL_PRODUK, 0);
		array_splice($PREVIEW_PRODUK, 0);
		array_splice($GAMBARBESAR_PRODUK, 0);
		array_splice($MATAUANG_PRODUK, 0);
		array_splice($HARGA_PRODUK, 0);
		array_splice($DIREKTORIGAMBAR_PRODUK, 0);
		array_splice($PESAN_PRODUK, 0);
		array_splice($QTY_PRODUK, 0);
		array_splice($JUMLAH_HARGA, 0);	
	
	
}

header("Location: public-users-bookingbasket" . $extention . "?pesan_error=Your reservation basket has been emptied");
?>                    